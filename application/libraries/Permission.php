<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission
{
    private $CI ;
    public function __construct(){
        $this->CI =& get_instance();
        header('Access-Control-Allow-Origin: *');
        $this->CI->session->set_userdata('main_url', current_url());



    }

    function get_user_by_key($key){
        $data =  $this->CI->db->get_where('permission_app',array('rand_key'=>$key));
        if($data->result()){
                return $data->result()[0]->user_id;

        }else{
                return false;}

    }


}
	