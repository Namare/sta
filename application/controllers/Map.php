<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = 'Карта';

    }

    function index(){
        if(!$this->ion_auth->logged_in())
            redirect('login');

        $header['breadcrumbs'] = $this->breadcrumbs;
        $this->load->view('header',$header);

        $data['users'] = $this->ion_auth->users(4)->result();
        $this->db->order_by('order','asc');
        $data['map_markers'] = $this->db->get('map_markers_types')->result();
        $this->db->order_by('date_add','desc');
        $this->db->join('map_markers_types', 'map_markers.marker_type = map_markers_types.type_id');
        $data['info_markers'] = $this->db->get('map_markers')->result();
        $this->load->view('map/map',$data);

        if($this->ion_auth->is_admin()){
            $admin_data['markers']= $data['info_markers'];
            $this->load->view('map/map_admin',$admin_data);
        }
        $this->load->view('footer');
    }

    function add_marker(){
        if(!$this->ion_auth->logged_in())
            redirect('login');

        if($this->input->post('id')==null)die();

            $data['marker_type'] =$this->input->post('id');
            $data['lat'] =$this->input->post('lat');
            $data['lng'] =$this->input->post('lng');
            $data['user_id'] =$this->ion_auth->get_user_id();
            $data['date_add'] =time();
            $this->db->insert('map_markers',$data);

    }


    function add_marker_app(){

        if($this->input->post('id')==null)die();
        if($this->input->post('k')==null)die();
        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();

            $data['marker_type'] =$this->input->post('id');
            $data['lat'] =$this->input->post('lat');
            $data['lng'] =$this->input->post('lng');

            $data['user_id'] =$user_id;
            $data['date_add'] =time();
            $this->db->insert('map_markers',$data);

    }

    function del_info_marker(){
        if(!$this->ion_auth->logged_in())
            redirect('login');

        if($this->input->post('i')==null)die();
        $points = $this->db->get_where('map_markers',array('marker_id'=>$this->input->post('i')))->result()[0]->points;
        echo $points;
        $points++;
        $data['points'] = $points;
        $this->db->where('marker_id', $this->input->post('i'));
        $this->db->update('map_markers',$data);
        if($points >2 or $this->ion_auth->is_admin()){
            $this->db->delete('map_markers',array('marker_id'=>$this->input->post('i')));
        }


    }

    function ctrl_marker(){
        if(!$this->ion_auth->logged_in())
            redirect('login');

        if($this->input->post('id')==null)die();
        $this->db->delete('map_markers',array('marker_id'=>$this->input->post('id')));
    }

    function app_markers(){
        $this->db->join('map_markers_types','type_id=marker_type');
        $data['markers'] = $this->db->get('map_markers')->result();
        $this->load->view('map/app_markers',$data);
    }




}