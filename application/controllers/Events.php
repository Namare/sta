<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
    private $breadcrumbs;
    public function __construct()
    {
        parent::__construct();
        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = 'Events';




    }

    function index(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['add_css'][] = 'fullcalendar.min';
        $header['add_css'][] = 'events';
        $data['events'] = $this->db->get('sta_events')->result();
        $this->load->view('header',$header);
        $this->load->view('events/calendar',$data);

    }

    function page(){
        if($this->uri->segment(3)==null)redirect(base_url().'events');
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['add_css'][] = 'events';
        $this->load->view('header',$header);
        $data['event']= $this->db->get_where('sta_events',array('id'=>$this->uri->segment(3)))->result();
        $data['events'] = $this->db->get('sta_events')->result();
        $this->load->view('events/event',$data);
        $this->load->view('events/allevents',$data);


    }


}