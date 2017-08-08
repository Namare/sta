<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Werecommend extends CI_Controller {
    private $breadcrumbs;
    public function __construct()
    {
        parent::__construct();
        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = 'Professional Service';
    }

    function index(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['add_css'][] = 'werec';
        $this->load->view('header',$header);
        $data['states'] = $this->db->get('states')->result();
        $data['profession'] = $this->db->get('sta_profession')->result();

        $this->load->view('werecommend/content', $data);




    }

    function list_city(){
        if($this->uri->segment(3)==null)die();

        $cities = $this->db->get_where('cities',array('state_code'=>$this->uri->segment(3)))->result();
        echo '<option value="" selected disabled>Select city</option>';
        echo '<option value="0">All cities</option>';
        foreach($cities as $city){
            echo '<option value="'.$city->id.'">'.$city->city.'</option>';

        }

    }

    function rec_lock() {
        if($this->input->post('i')==null)die();
        if(!$this->ion_auth->is_admin())die();

        $this->db->query('UPDATE werecommend set is_sort = IF(is_sort = 0, 1, 0 ) where id_we ='.$this->input->post('i'));



    }

    function list_user(){
        $this->db->join('cities','city_id=cities.id');
        $this->db->join('states','states.state_code=state_id');
        $this->db->join('sta_profession','sta_profession.id=prof_id');

        if($this->input->get('state')!=null){
            $this->db->where('werecommend.state_id',$this->input->get('state'));

        }

        if($this->input->get('profs')!=null){
            $this->db->where('werecommend.prof_id',$this->input->get('profs'));

        }

        if($this->input->get('city')!=null and $this->input->get('city')!=0){
            $this->db->where('werecommend.city_id',$this->input->get('city'));

        }
        $this->db->order_by('is_sort', 'desc');
        $this->db->order_by('id_we', 'asc');

        $data['users'] = $this->db->get('werecommend');

        $data['users'] =  $data['users']->result();
        $this->load->view('werecommend/list', $data);

    }

    function add_user(){
        if($this->input->post('user_name')==null)die('err');

        $data['user_name'] = $this->input->post('user_name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['details'] = $this->input->post('details');
        $data['city_id'] = $this->input->post('city');
        $data['state_id'] = $this->input->post('state');
        $data['prof_id'] = $this->input->post('prof');


        $name = time();
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/file/avatars/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']             = $name;
        $config['max_size']             = 15000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);
        $this->upload->do_upload('cover');
        $upl =  $this->upload->data();
        $data['avatar'] = $name.$upl['file_ext'];

        $this->db->insert('werecommend',$data);


        redirect(base_url().'werecommend');


    }


    function del_user(){
        if($this->input->post('i')==null)die();
        if(!$this->ion_auth->is_admin())die();

        $this->db->where('id_we',$this->input->post('i'));
        $this->db->delete('werecommend');


    }

}