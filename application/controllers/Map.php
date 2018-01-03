<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = 'Карта';
        header('Access-Control-Allow-Origin: *');

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
        $this->db->where(array('date_add >'=> time() - 86400 ));
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
        if($this->input->post('i')==null)die();

        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();

        if($this->input->post('i')==null)die();
        $points = $this->db->get_where('map_markers',array('marker_id'=>$this->input->post('i')))->result()[0]->points;
        echo $points;
        $points++;
        $data['points'] = $points;
        $this->db->where('marker_id', $this->input->post('i'));
        $this->db->update('map_markers',$data);

        $this->db->delete('map_markers',array('marker_id'=>$this->input->post('i')));


    }

    function update_coords(){
        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();
        $data['lat'] = $this->input->post('lat');
        $data['lng'] = $this->input->post('lng');
        $this->db->where('id', $user_id);
        $this->db->update('users',$data);
    }

    function ctrl_marker(){
        if(!$this->ion_auth->logged_in())
            redirect('login');

        if($this->input->post('id')==null)die();
        $this->db->delete('map_markers',array('marker_id'=>$this->input->post('id')));
    }

    function app_markers(){
        $user_id =
            ($this->permission->get_user_by_key($this->input->get('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->get('k'))
                :$this->ion_auth->get_user_id();
        if($this->input->get('k')!=''){
            $lat1 = $this->ion_auth->user($user_id)->row()->lat + 1;
            $lat2 = $this->ion_auth->user($user_id)->row()->lat - 1;
            $lng1 = $this->ion_auth->user($user_id)->row()->lng + 1;
            $lng2 = $this->ion_auth->user($user_id)->row()->lng - 1;

            $array = array('lat <' => $lat1, 'lat >' => $lat2, 'lng <' => $lng1, 'lng >' => $lng2);
            $this->db->where($array);
        }


        $this->db->join('map_markers_types','type_id=marker_type');
        $this->db->where(array('date_add >'=> time() - 86400 ));
        $data['markers'] = $this->db->get('map_markers')->result();
        $this->load->view('map/app_markers',$data);
    }

    function app_notification_auto(){
        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();
        if($this->input->post('k')!=''){
            echo $this->ion_auth->user($user_id)->row()->notification_auto;
            $this->db->query('update users set notification_auto = 0 where id ='.$user_id);
        }

    }


    function app_markers_dist(){
        $user_id =
            ($this->permission->get_user_by_key($this->input->get('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->get('k'))
                :$this->ion_auth->get_user_id();
        if($this->input->get('k')!=''){
            $lat1 = $this->ion_auth->user($user_id)->row()->lat + 1;
            $lat2 = $this->ion_auth->user($user_id)->row()->lat - 1;
            $lng1 = $this->ion_auth->user($user_id)->row()->lng + 1;
            $lng2 = $this->ion_auth->user($user_id)->row()->lng - 1;
            $array = array('lat <' => $lat1, 'lat >' => $lat2, 'lng <' => $lng1, 'lng >' => $lng2);
            $this->db->where($array);
        }
        $this->db->join('map_markers_types','type_id=marker_type');
        $data['markers'] = $this->db->get('map_markers')->result();
        $this->load->view('map/app_markers_dist',$data);
    }




}