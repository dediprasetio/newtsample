<?php

class Auth_model extends CI_model
{

    public function getUser($Username)
    {
        return $this->db->query("SELECT tu.username, 
                                        tu.nama,
                                        tul.level_name,
                                        tu.password
                                FROM tb_user tu
                                JOIN tb_user_level tul ON tul.id = tu.id_level
                                WHERE tu.status_user = 1
                                    AND tu.username = $Username");
    }
}