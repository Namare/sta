<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    private $breadcrumbs;

    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs[] = 'STA';
    }

    // redirect if needed, otherwise display the user list
    public function index(){
        if ($this->uri->segment(2) == FALSE)
            return show_404();

        $data['pages'] =$this->db->get_where('pages',array('page_id'=>$this->uri->segment(2)))->result()[0];

        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Статьи";
        $header['breadcrumbs'][] =$data['pages']->title;
        $script['adm'][] = "";



        $data['content']['header']= "Редактирование статьи";

        $this->load->view('header',$header);
        $this->load->view('content',$data);


    }


}
