<?php

class Main_query extends CI_model
{
    public function getUserDetail($id)
    {
        return $this->db->query("SELECT 
                                    tu.nama,
                                    tu.foto,
                                    tup.position_name
                                FROM tb_user tu
                                JOIN tb_user_position tup ON tup.id = tu.position
                                WHERE tu.id_user =$id");
    }

    public function getSite()
    {
        return $this->db->query("SELECT * FROM tb_site limit 19");
    }
}
