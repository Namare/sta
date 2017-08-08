<?php
defined('BASEPATH') OR exit('');

class Search extends CI_Controller {

    private $breadcrumbs;

    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = 'Logistics';
        $this->breadcrumbs[] = 'Find users';
    }

    function index(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['add_css'][] = 'search';
        $this->load->view('header',$header);

        if($this->input->get('s')!=null)
        $this->db->like('username',$this->input->get('s'));

        $data['users'] = $this->db->get('users')->result();
        $this->load->view('search',$data);
        $this->load->view('footer');
    }
}