<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_load_data extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('get_data', 'm_Ldata');
		$this->load->library('Checklogin', 'checklogin');
    }
    
    public function index()
	{
        echo json_encode("Index file of Load Data");
    }

	public function sensor()
	{
		$check = $this->checklogin->check();
		if($check == true){
            $_phase = ['R', 'S', 'T'];

            foreach ($_phase as $_sensor) {
                
                //Get Data Listrik
                $mySensor = $this->m_Ldata->getDataListrikBySensor($_sensor);
                if($mySensor->num_rows()>0){
                    $row = $mySensor->row();
                    $phase  = "PHASE_".$row->sensor;//initialize phase
                    $data["listrik"][$phase]["id"]          = $row->id;
                    $data["listrik"][$phase]["Voltage"]     = $row->Voltage;
                    $data["listrik"][$phase]["Current"]     = $row->Current;
                    $data["listrik"][$phase]["Power"]       = $row->Power;
                    $data["listrik"][$phase]["Energy"]      = $row->Energy;
                    $data["listrik"][$phase]["Frequency"]   = $row->Frequency;
                    $data["listrik"][$phase]["PF"]          = $row->PF;
                }

                //Get Data Listrik rows
                $mySensorRows = $this->m_Ldata->getDataListrikBySensorRows($_sensor);
                foreach ($mySensorRows->result_array() as $rows) {
                    $data["datarow"][$phase]["voltage"][] = number_format($rows['Voltage'], 2, '.', ',');
                    $data["datarow"][$phase]["Current"][] = number_format($rows['Current'], 2, '.', ',');
                    $data["datarow"][$phase]["labels"][] = $rows['labels'];
                }
                $data["datarow"][$phase]["voltage"] = array_reverse($data["datarow"][$phase]["voltage"]);
                $data["datarow"][$phase]["Current"] = array_reverse($data["datarow"][$phase]["Current"]);
                $data["datarow"][$phase]["labels"] = array_reverse($data["datarow"][$phase]["labels"]);
            }

            $myData = array(
                'status_code'   => 200,
                'status'        => 'Success',
                'data'          => $data
            );

            echo json_encode($myData);
		}else{
			redirect('../auth/login', 'refresh');
		}
    }
    
    public function summary()
	{
		$check = $this->checklogin->check();
		if($check == true){
            $mySummary = $this->m_Ldata->getDataPowerStatusSummary();
            echo json_encode($mySummary);
		}else{
			redirect('../auth/login', 'refresh');
		}
	}

}
