<?php defined('BASEPATH') OR exit('No direct script access allowed');

class St extends CI_Controller {




    public function __construct()
    {        parent::__construct();
    }


    function index(){



        $data2['css'] = '
                        <link rel="stylesheet" type="text/css" href="'.base_url().'style/submenu.css">
                        <link rel="stylesheet" type="text/css" href="'.base_url().'style/font-awesome.min.css" >
                        ';
        $data['statmenu'] = $this->load->view('static_menu',$data2,true);

        if($this->uri->segment(2)==null)
            $this->load->view('static_page/main',$data);
            else
        $this->load->view('static_page/'.$this->uri->segment(2),$data);
    }



}