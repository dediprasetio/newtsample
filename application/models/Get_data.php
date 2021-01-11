<?php

class Get_data extends CI_model
{
    public function getDataListrikBySensor($sensor)
    {
        return $this->db->query("SELECT * FROM data_listrik where sensor = '".$sensor."'  order by id DESC limit 1");
    }

    public function getDataListrikBySensorRows($sensor)
    {
        return $this->db->query("SELECT
                                    `sensor`,
                                    DATE_FORMAT(`date`, \"%s\") as labels,
                                    voltage as `Voltage`,
                                    Current as `Current`
                                FROM `data_listrik`
                                where `sensor` = '".$sensor."'
                                order by id DESC
                                limit 30");
    }

    public function getDataPowerStatusSummary(){
        $data["month"] = date("F Y");
		$_par_trip_site = 10;
		$_par_trip_hours = 2;

		/*----------------- AREA -----------------*/
		$tripcheck = $this->db->query("select
							sum(`total_trip`) as 'total_trip',
							sum(`UN10`) as 'UN10', sum(`UP10`) as 'UP10',
							`kd_province`
					from (
						SELECT
							COUNT(*) as 'total_trip', IF( COUNT(*) < ".$_par_trip_site." ,1, 0) as 'UN10',
							IF( COUNT(*) >= ".$_par_trip_site." ,1, 0) as 'UP10',
							`tb_site`.`kd_site`,
							`tb_site`.`kd_province`
						FROM
							`data_powerstatus`,
							`tb_site`
						WHERE `data_powerstatus`.`kd_site` = `tb_site`.`kd_site`
							and `data_powerstatus`.`phase` = 'A'
							and `data_powerstatus`.`power_status` = 'T'
							and DATE_FORMAT(`data_powerstatus`.`start_date`, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m')
						group by `tb_site`.`kd_site`, `tb_site`.`kd_province`
					) as tab1
					group by `kd_province`");

		foreach($tripcheck->result_array() as $row1) {
			$kdprovince = $row1["kd_province"];
			if (isset($row1["UN10"]) || isset($row1["UP10"])) {
				$data["summary"][$kdprovince]["area"]["UN10"] = $row1["UN10"];
				$data["summary"][$kdprovince]["area"]["UP10"] = $row1["UP10"];
			}
		}

		
		$tripcheck = $this->db->query("SELECT
						sum(`UN2H`) as 'UN2H',
						sum(`UP2H`) as 'UP2H',
						kd_province
						
					from (
						select
							IF(SUM(TIMESTAMPDIFF(SECOND, start_date, end_date)) /3600 < ".$_par_trip_hours.", 1, 0) as 'UN2H', 
							IF(SUM(TIMESTAMPDIFF(SECOND, start_date, end_date)) /3600 >= ".$_par_trip_hours.", 1, 0) as 'UP2H', 
							tb_site.`kd_site`,
							tb_site.kd_province
						from data_powerstatus, tb_site
						WHERE data_powerstatus.`kd_site` = tb_site.kd_site
							and `phase` = 'A'
							and `power_status` = 'T'
							and DATE_FORMAT(`start_date`, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m')
						group by tb_site.`kd_site`, tb_site.kd_province
					) as tab1
					group by kd_province");
        foreach($tripcheck->result_array() as $row1) {
			$kdprovince = $row1["kd_province"];
			if (isset($row1["UN2H"]) || isset($row1["UP2H"])) {
				$data["summary"][$kdprovince]["area"]["UN2H"] = $row1["UN2H"];
				$data["summary"][$kdprovince]["area"]["UP2H"] = $row1["UP2H"];
			}
		}
		
		$energy = $this->db->query("SELECT
					sum(usageEnergy) as usageEnergy,
					kd_province
				from (
					SELECT
						max(`Energy`) as `Energy`, 
						max(`LastEnergy`) as `LastEnergy`, 
						max(`Energy`) - max(`LastEnergy`) as usageEnergy,
						`sensor`,
						tb_site.kd_site,
						tb_site.kd_province
					FROM
						`data_listrik`, tb_site
					WHERE
						DATE_FORMAT(`date`, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m')
						and `data_listrik`.`kd_site` = tb_site.kd_site
					GROUP by `sensor`,
						tb_site.kd_site,
						tb_site.kd_province
				) tab1
				group by  kd_province");
		foreach($energy->result_array() as $row1) {
			$kdprovince = $row1["kd_province"];
			$data["summary"][$kdprovince]["area"]["energy"] = number_format($row1['usageEnergy'], 2, ".", ",");
			$data["summary"][$kdprovince]["area"]["cost"] = number_format($row1['usageEnergy'] * 1000, 2, ".", ",");
		}

		$energy = $this->db->query("SELECT
					sum(usageEnergy) as usageEnergy,
					kd_province
				from (
					SELECT
						max(`Energy`) as `Energy`, 
						max(`LastEnergy`) as `LastEnergy`, 
						max(`Energy`) - max(`LastEnergy`) as usageEnergy,
						`sensor`,
						tb_site.kd_site,
						tb_site.kd_province
					FROM
						`data_listrik`, tb_site
					WHERE
						DATE_FORMAT(`date`, '%Y%m') = DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y%m')
						and `data_listrik`.`kd_site` = tb_site.kd_site
					GROUP by `sensor`,
						tb_site.kd_site,
						tb_site.kd_province
				) tab1
				group by  kd_province");
		foreach($energy->result_array() as $row1) {
			$kdprovince = $row1["kd_province"];
			$data["summary"][$kdprovince]["area"]["energy_fc"] = number_format($row1['usageEnergy'], 2, ".", ",");
			$data["summary"][$kdprovince]["area"]["cost_fc"] = number_format($row1['usageEnergy'] * 1000, 2, ".", ",");
		}

		/*----------------- KOTA -----------------*/
		// $tripcheck = $this->db->query("select
		// 					sum(`total_trip`) as 'total_trip',
		// 					sum(`UN10`) as 'UN10', sum(`UP10`) as 'UP10',
		// 					count(*) as total,
		// 					kd_province,
        //                     kd_kota
		// 			from (
		// 				SELECT
		// 					COUNT(*) as 'total_trip', IF( COUNT(*) < ".$_par_trip_site." ,1, 0) as 'UN10',
		// 					IF( COUNT(*) >= ".$_par_trip_site." ,1, 0) as 'UP10',
		// 					`tb_site`.`kd_site`,
		// 					`tb_site`.`kd_province`,
		// 					`tb_site`.`kd_kota`
		// 				FROM
		// 					`data_powerstatus`,
		// 					`tb_site`
		// 				WHERE `data_powerstatus`.`kd_site` = `tb_site`.`kd_site`
		// 					and `data_powerstatus`.`phase` = 'A'
		// 					and `data_powerstatus`.`power_status` = 'T'
		// 					and DATE_FORMAT(`data_powerstatus`.`start_date`, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m')
		// 				group by
        //                 	`tb_site`.`kd_site`,
		// 					`tb_site`.`kd_province`,
		// 					`tb_site`.`kd_kota`) as tab1
		// 			group by kd_province,kd_kota");

        // foreach($tripcheck->result_array() as $row1) {
		// 	$kdprovince = $row1["kd_province"];
		// 	$kdkota = $row1["kd_kota"];
		// 	if (isset($row1["UN10"]) || isset($row1["UP10"])) {
		// 		$data["summary"][$kdprovince]["kota"][$kdkota]["UN10"] = $row1["UN10"];
		// 		$data["summary"][$kdprovince]["kota"][$kdkota]["UP10"] = $row1["UP10"];
		// 	}
		// }

		
		// $tripcheck = $this->db->query("SELECT
		// 				sum(`UN2H`) as 'UN2H',
		// 				sum(`UP2H`) as 'UP2H',
		// 				count(*) as total,
		// 				kd_province,
        //                 kd_kota
		// 			from (
		// 				select
		// 					IF(SUM(TIMESTAMPDIFF(SECOND, start_date, end_date)) /3600 < ".$_par_trip_hours.", 1, 0) as 'UN2H', 
		// 					IF(SUM(TIMESTAMPDIFF(SECOND, start_date, end_date)) /3600 >= ".$_par_trip_hours.", 1, 0) as 'UP2H', 
		// 					tb_site.`kd_site`,
		// 					tb_site.kd_province,
		// 					tb_site.kd_kota
		// 				from data_powerstatus, tb_site
		// 				WHERE data_powerstatus.`kd_site` = tb_site.kd_site
		// 					and `phase` = 'A'
		// 					and `power_status` = 'T'
		// 					and DATE_FORMAT(`start_date`, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m')
		// 				group by tb_site.`kd_site`, tb_site.kd_province
		// 			) as tab1
		// 			group by kd_province, kd_kota");
        // foreach($tripcheck->result_array() as $row1) {
		// 	$kdprovince = $row1["kd_province"];
		// 	$kdkota = $row1["kd_kota"];
		// 	if (isset($row1["UN2H"]) || isset($row1["UP2H"])) {
		// 		$data["summary"][$kdprovince]["kota"][$kdkota]["UN2H"] = $row1["UN2H"];
		// 		$data["summary"][$kdprovince]["kota"][$kdkota]["UP2H"] = $row1["UP2H"];
		// 	}
		// }
		
		// $energy = $this->db->query("SELECT
		// 			sum(usageEnergy) as usageEnergy,
		// 			kd_province,
		// 			kd_kota
		// 		from (
		// 			SELECT
		// 				max(`Energy`) as `Energy`, 
		// 				max(`LastEnergy`) as `LastEnergy`, 
		// 				max(`Energy`) - max(`LastEnergy`) as usageEnergy,
		// 				`sensor`,
		// 				tb_site.kd_site,
		// 				tb_site.kd_province,
		// 				tb_site.kd_kota

		// 			FROM
		// 				`data_listrik`, tb_site
		// 			WHERE
		// 				DATE_FORMAT(`date`, '%Y%m') = DATE_FORMAT(NOW(), '%Y%m')
		// 				and `data_listrik`.`kd_site` = tb_site.kd_site
		// 			GROUP by `sensor`,
		// 				tb_site.kd_site,
		// 				tb_site.kd_province,
		// 				tb_site.kd_kota
		// 		) tab1
		// 		group by kd_province, kd_kota");
		// foreach($energy->result_array() as $row1) {
		// 	$kdprovince = $row1["kd_province"];
		// 	$kdkota = $row1["kd_kota"];
		// 	$data["summary"][$kdprovince]["kota"][$kdkota]["energy"] = number_format($row1['usageEnergy'], 2, ".", ",");
		// 	$data["summary"][$kdprovince]["kota"][$kdkota]["cost"] = number_format($row1['usageEnergy'] * 1000, 2, ".", ",");
		// }

		// $energy = $this->db->query("SELECT
		// 			sum(usageEnergy) as usageEnergy,
		// 			kd_province,
		// 			kd_kota
		// 		from (
		// 			SELECT
		// 				max(`Energy`) as `Energy`, 
		// 				max(`LastEnergy`) as `LastEnergy`, 
		// 				max(`Energy`) - max(`LastEnergy`) as usageEnergy,
		// 				`sensor`,
		// 				tb_site.kd_site,
		// 				tb_site.kd_province,
		// 				tb_site.kd_kota

		// 			FROM
		// 				`data_listrik`, tb_site
		// 			WHERE
		// 				DATE_FORMAT(`date`, '%Y%m') = DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y%m')
		// 				and `data_listrik`.`kd_site` = tb_site.kd_site
		// 			GROUP by `sensor`,
		// 				tb_site.kd_site,
		// 				tb_site.kd_province,
		// 				tb_site.kd_kota
		// 		) tab1
		// 		group by  kd_province,
		// 			kd_kota");
		// foreach($energy->result_array() as $row1) {
		// 	$kdprovince = $row1["kd_province"];
		// 	$kdkota = $row1["kd_kota"];
		// 	$data["summary"][$kdprovince]["kota"][$kdkota]["energy_fc"] = number_format($row1['usageEnergy'], 2, ".", ",");
		// 	$data["summary"][$kdprovince]["kota"][$kdkota]["cost_fc"] = number_format($row1['usageEnergy'] * 1000, 2, ".", ",");
        // }
        
        return $data;
    }
}
