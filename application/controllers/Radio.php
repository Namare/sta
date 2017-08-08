<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Radio extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        header('Access-Control-Allow-Origin: *');
        $data['radios'] = $this->db->get('sta_radio')->result();
        $this->load->view('radio',$data);

    }

    function is_play(){


        if(!isset($_SESSION['radio_play'])){
            $_SESSION['radio_play'] = 0;
        }
        echo $_SESSION['radio_play'];

        if( $_SESSION['radio_play'] ==0){
            $_SESSION['radio_play'] = 1;
            echo $_SESSION['radio_play'];
        }
        else{
            $_SESSION['radio_play'] = 0;
            echo $_SESSION['radio_play'].'a';
        }


    }

    function chanel(){
        if($this->input->post('r')==null)die();
        $this->session->unset_userdata('radio_ch');
        $this->session->set_userdata('radio_ch',$this->input->post('r'));

    }
}