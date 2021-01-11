<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('Main_model', 'mainmodel');
		$this->load->model('Main_query', 'mainquery');
    }

	public function index()
	{
		$this->load->view('page/auth/login');
    }

    public function login()
	{
		$this->load->view('page/auth/login');
    }
    
    public function ActionLogin(){
        $Username = htmlspecialchars($this->input->post('username'));
        $Password = htmlspecialchars($this->input->post('password'));
        $PasswordHash = hash('sha512',substr(md5($Password.CONTANT_APP), 0, 30));
        // echo $PasswordHash;exit;
        $MyData =  $this->mainmodel->view_where('tb_user', array('username' => $Username) );
        if($MyData->num_rows()>0){
            $MyDataObj = $MyData->row();
            if($MyDataObj->password==$PasswordHash){
                $generateToken = bin2hex(random_bytes(64));
                $dataToken = array(
                    'id_user'        => $MyDataObj->id_user,
                    'token'          => $generateToken,
                    'ip_address'     => $this->input->ip_address(),
                    'created_at'     => date("Y-m-d h:i:s")
                );
                $insertToken = $this->mainmodel->insert($dataToken, 'tb_user_log');
                
                $userDetail = $this->mainquery->getUserDetail($MyDataObj->id_user)->row();
                if($insertToken==true){
                    $SessionData = [
                        'id_user'   => $MyDataObj->id_user,
                        'username'  => $MyDataObj->username,
                        'nama'      => $MyDataObj->nama,
                        'position'  => $userDetail->position_name,
                        'foto'      => $userDetail->foto,
                        'token'     => $generateToken
                    ];
                    $this->session->set_userdata($SessionData);

                    $data = array(
                        'status_code'       => 200,
                        'message'           => "Success Login!!"
                    );
                    echo  json_encode($data);

                }else{
                    $data = array(
                        'status_code'       => 500,
                        'message'           => "can't create token!!"
                    );
                    echo  json_encode($data);
                }

            }else{
                $data = array(
                    'status_code'       => 404,
                    'message'           => 'Password is incorect!!'
                );
                echo  json_encode($data);
            }
        }else{
            $data = array(
                'status_code'       => 404,
                'message'           => 'Username is incorect!!'
            );
            echo  json_encode($data);
        }
    }

    function Logout(){
		$this->session->sess_destroy();
		redirect('../auth/login');
    }
}
