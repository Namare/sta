<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private $breadcrumbs;

    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = 'Dashboard';

        if(!$this->ion_auth->logged_in())
            redirect('login');
    }
    function index(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $this->load->view('header',$header);
        $sql = "select * from notifications left join notification_type
            on notification_type.type_id =notifications.type
            ";

        if($this->ion_auth->in_group(4)){
            $sql .= 'where user_id = "'.$this->ion_auth->get_user_id().'"';
        }else{
            $sql .= 'where owner_id = "'.$this->ion_auth->get_user_id().'"';
        }
        $sql .= ' order by id desc';
        $this->db->join('notification_type','notification_type.type_id = notifications.type');
        $data['news']= $this->db->query($sql)->result();
        $this->load->view('dh/dh',$data);
    }

}