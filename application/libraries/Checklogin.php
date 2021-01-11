<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Checklogin
{
    protected $CI;

    public function __construct()
    {
            $this->CI =& get_instance(); //CodeIgniter super-object
    }

    function check()
    {
        $status_login = false;
        $sess_id = $this->CI->session->userdata('id_user');
        $sess_token = $this->CI->session->userdata('token');
        $ip = $this->CI->input->ip_address();
        
        $result = $this->CI->db->query("SELECT tul.token FROM tb_user_log tul WHERE tul.token = '$sess_token' AND tul.id_user = '$sess_id' AND tul.created_at > DATE_SUB(NOW(), INTERVAL 24 HOUR) AND tul.ip_address = '$ip'");

        if($result->num_rows()>0){
            $status_login = true;
        }
        return $status_login;
    }
}
