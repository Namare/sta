<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stano
{
private $CI ;
    public function __construct(){
        $this->CI =& get_instance();

    }

    function set_nf($user_id,$owner_id,$type_id,$data_array =null){
        $th = $this->CI->db;
        $this->CI->ion_auth->get_user_id();

        $data['type'] =$type_id;
        $data['user_id'] =$user_id;
        $data['owner_id'] =$owner_id;
        $data['date'] =time();
        $data['data'] =serialize($data_array);
        $th->insert('notifications',$data);





    }
}
	