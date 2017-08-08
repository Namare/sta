<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $breadcrumbs;

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->is_admin())
            return show_error('You must be an administrator to view this page.');
        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = 'Админ панель';
    }

    // redirect if needed, otherwise display the user list
    public function index(){


    }

    public function users(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Управление пользователями";

        $script['adm'][] = "contol_user";
        $data['content']['header']= "Управление пользователями";
        $data['list_users'] =  $this->ion_auth->users()->result();
        $this->load->view('header',$header);
        $this->load->view('admin/users',$data);
        $this->load->view('admin/footer_content', $script);
    }

    public function new_user(){
        if(!$this->input->post())return show_error('Нет данных.');
        $identity_column = $this->config->item('identity','ion_auth');
        $email    = strtolower($this->input->post('email'));
        $identity = ($identity_column==='email') ? $email : $this->input->post('username');
        $password = $this->input->post('password');

        $additional_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'company'    => $this->input->post('company'),
            'phone'      => $this->input->post('phone'),
        );

        $this->ion_auth->register($identity, $password, $email, $additional_data);


    }

    public function del_user(){
        if(!$this->input->post())return show_error('Нет данных.');
        if($this->input->post('user_id') == 1)die();

        $this->ion_auth->delete_user($this->input->post('user_id'));
    }

    function change_premium(){
       $prim =( $this->ion_auth->user($this->input->post('i'))->row()->is_prim==0)?1:0;

       $this->db->where('id',$this->input->post('i'));
       $this->db->update('users',array(
           'is_prim'=>$prim
       ));


    }

//Компаниии
    function company(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Управление компаниями";
        $script['adm'][] = "control_company";

        $data['content']['header']= "Управление компаниями";

        $data['company_list'] = $this->db->get('company')->result();
        $this->load->view('header',$header);
        $this->load->view('admin/company', $data);
        $this->load->view('admin/footer_content', $script);

    }

    function new_company(){
        if(!$this->input->post())return show_error('Нет данных.');
        if($this->input->post('company_name')=='')die();

        $data['company_name'] = $this->input->post('company_name');
        $data['company_type'] = $this->input->post('company_type');
        $data['company_description'] = $this->input->post('company_description');
        $this->db->insert('company',$data);

    }

    public function del_company(){
        if(!$this->input->post())return show_error('Нет данных.');
        if($this->input->post('company_id') == '')die();

        $this->db->delete('company',array('id'=>$this->input->post('company_id')));
    }


    //forum

    public function forum(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Управление форумом";
        $script['adm'][] = "control_forum";

        $data['content']['header']= "Управление форумом";

        $data['list_forums']= $this->db->get('forums')->result();
        $data['list_subforum']= $this->db->get('forums_post')->result();
        $data['list_thread']= $this->db->get('forum_thead')->result();
        $this->load->view('header',$header);
        $this->load->view('admin/forum', $data);
        $this->load->view('admin/footer_content',$script);

    }

    function forum_load(){

       $content['list'] = $this->db->get_where('forum_thead',array('main_post_id'=>'1'))->result();
        $this->load->view('admin/forum_load',$content);

    }

    function forum_add(){
        if(!$this->input->post())return show_error('Нет данных.');

        $data['post_name'] = $this->input->post('title');
        $data['post_description'] = $this->input->post('desc');
        $data['main_forum_id'] = $this->input->post('parent');
        $this->db->insert('forums_post',$data);

    }

    function subforum_add(){
        if(!$this->input->post())return show_error('Нет данных.');

        $data['title'] = $this->input->post('title');
        $data['main_post_id'] = $this->input->post('parent');
        $this->db->insert('forum_thead',$data);

    }

    function forum_update(){
        if(!$this->input->post())return show_error('Нет данных.');
        $data['forum_name'] = $this->input->post('title');
        $this->db->where('forum_id',$this->input->post('id'));
        $this->db->update('forums',$data);

    }
    function subforum_update(){
        if(!$this->input->post())return show_error('Нет данных.');
        $data['post_name'] = $this->input->post('title');
        $this->db->where('post_id',$this->input->post('id'));
        $this->db->update('forums_post',$data);

    }

    // pages

    function pages(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Управление форумом";
        $header['breadcrumbs'][] ="Статьи";
        $script['adm'][] = "control_pages";

        $data['content']['header']= "Управление статьями";
        if($this->input->post('title')!=null){
            $this->db->insert('pages',array('title'=>$this->input->post('title')));
        }

        if($this->input->post('del_id')!=null){
            $this->db->delete('pages',array('page_id'=>$this->input->post('del_id')));
        }

        $data['pages']= $this->db->get('pages')->result();
        $this->load->view('header',$header);
        $this->load->view('admin/pages', $data);
        $this->load->view('admin/footer_content',$script);
    }

    function edit_page(){
        if ($this->uri->segment(3) == FALSE)
            return show_404();

        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Управление форумом";
        $header['breadcrumbs'][] ="Редактирование статьи";
        $script['adm'][] = "control_pages";

        $data['content']['header']= "Редактирование статьи";

        $data['page'] = $this->db->get_where('pages',array('page_id' => $this->uri->segment(3)))->result();

        if($this->input->post() and $this->input->post('title')!=null){

            $update['title'] = $this->input->post('title');
            $update['content'] = htmlspecialchars($this->input->post('content'));
            $this->db->where('page_id',$this->uri->segment(3));
            $this->db->update('pages',$update);
        }

        $this->load->view('header',$header);
        $this->load->view('admin/edit_page', $data);
        $this->load->view('admin/footer_content',$script);
    }

   function edit_menu(){
       $header['breadcrumbs'] = $this->breadcrumbs;
       $header['breadcrumbs'][] ="Управление форумом";
       $header['breadcrumbs'][] ="Редактирование меню";
       $script['adm'][] = "menu_edit";

       $data['content']['header']= "Редактирование меню";

       $data['menu'] = $this->db->get('menu')->result();

       $this->load->view('header',$header);
       $this->load->view('admin/edit_menu', $data);
       $this->load->view('admin/footer_content',$script);
   }

   function add_menu(){
       if(!$this->input->post())return show_error('Нет данных.');
       $data['menu_name'] = $this->input->post('name');
       $data['menu_url'] = $this->input->post('url');
       $this->db->insert('menu',$data);

   }

   function delete_menu(){
       if(!$this->input->post())return show_error('Нет данных.');

       $this->db->where('menu_id',$this->input->post('id'));
       $this->db->delete('menu');

   }

    function update_menu(){
        if(!$this->input->post())return show_error('Нет данных.');

        $data['menu_name'] = $this->input->post('name');
        $data['menu_url'] = $this->input->post('url');
        $this->db->where('menu_id',$this->input->post('id'));
        $this->db->update('menu',$data);

    }

    function add_submenu(){
        if(!$this->input->post())return show_error('Нет данных.');
        $data['submenu_name'] = $this->input->post('name');
        $data['submenu_url'] = $this->input->post('url');
        $data['parent_id'] = $this->input->post('id');
        $this->db->insert('submenu',$data);
    }


    function update_submenu(){
        if(!$this->input->post())return show_error('Нет данных.');
        $data['submenu_name'] = $this->input->post('name');
        $data['submenu_url'] = $this->input->post('url');
        $this->db->where('submenu_id',$this->input->post('id'));
        $this->db->update('submenu',$data);
    }


    function delete_submenu(){
        if(!$this->input->post())return show_error('Нет данных.');

        $this->db->where('submenu_id',$this->input->post('id'));
        $this->db->delete('submenu');
    }


    function events(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Управление Событиями";
        $data['events'] = $this->db->get('sta_events')->result();
        $this->load->view('header',$header);
        $this->load->view('admin/events',$data);
    }

    function add_event (){
        if($this->input->post('event_title')==null)die($_SERVER['DOCUMENT_ROOT'].'/file/events/');

        $data['event_title'] = $this->input->post('event_title');
        $data['event_description'] = $this->input->post('event_description');

        $data['event_start_date'] = $this->input->post('date_start');
        $data['event_end_date'] = $this->input->post('date_end');

        $data['event_start_time'] = $this->input->post('time_start');
        $data['event_end_time'] = $this->input->post('time_end');
        $name = time();
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/file/events/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']             = $name;
        $config['max_size']             = 15000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);
        $this->upload->do_upload('cover');
        $upl =  $this->upload->data();
        $data['cover'] = $name.$upl['file_ext'];


        $this->db->insert('sta_events',$data);


        redirect(base_url().'admin/events');

    }

    function edit_event(){
        $data['event']= $this->db->get_where('sta_events',array('id'=>$this->uri->segment(3)))->result();
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Управление Событиями";
        $data['events'] = $this->db->get('sta_events')->result();
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/file/events/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']             = $data['events'][0]->cover;
        $config['max_size']             = 15000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']           = true;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('cover')){
        $upl =  $this->upload->data();
        }

        if($this->input->post('event_title')!=null){

            $data_u['event_title'] = $this->input->post('event_title');
            $data_u['event_description'] = $this->input->post('event_description');

            $data_u['event_start_date'] = $this->input->post('date_start');
            $data_u['event_end_date'] = $this->input->post('date_end');

            $data_u['event_start_time'] = $this->input->post('time_start');
            $data_u['event_end_time'] = $this->input->post('time_end');
            $data_u['event_link'] = $this->input->post('event_link');

            $this->db->where('id',$this->uri->segment(3));
            $this->db->update('sta_events',$data_u);

            redirect(base_url().'admin/events');

        }

        $this->load->view('header',$header);
        $this->load->view('admin/events_edit',$data);


    }

    function del_event(){
        if($this->input->post('i')==null)die('err');
        $this->db->where('id',$this->input->post('i'));
        $this->db->delete('sta_events');
    }



    function stanews(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Управление Новостями";
        $this->load->view('header',$header);
        $data['news']=$this->db->get('sta_news')->result();
        $this->load->view('admin/news', $data);

    }

    function editnews(){
        if($this->uri->segment(3)==null){
            redirect(base_url().'admin/stanews');
        }
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['breadcrumbs'][] ="Редактировать  Новость";
        $this->load->view('header',$header);
        $data['news']=$this->db->get_where('sta_news',array('id'=>$this->uri->segment(3)))->result();
        $this->load->view('news/editnews', $data);
    }

    function add_news(){
        if($this->input->post('news_title')==null)die('error');

        $data['title'] = $this->input->post('news_title');
        $data['description'] = $this->input->post('news_description');
        $data['category_id'] = $this->input->post('news_category');


        $name = time();
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/file/news/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']             = $name;
        $config['max_size']             = 15000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);
        $this->upload->do_upload('cover');
        $upl =  $this->upload->data();
        $data['cover'] = $name.$upl['file_ext'];


        $this->db->insert('sta_news',$data);


        redirect(base_url().'admin/stanews');

    }

    function edit_news(){
        if($this->input->post('edit_id')==null)die('error');
        $data['title'] = $this->input->post('edit_title');
        $data['description'] = $this->input->post('edit_description');
        $data['category_id'] =$this->input->post('edit_category');


        $this->db->where('id',$this->input->post('edit_id'));
        $this->db->update('sta_news',$data);
        redirect(base_url().'admin/stanews');
    }

    function del_news(){
        if($this->input->post('i')==null)die('err');
        $this->db->where('id',$this->input->post('i'));
        $this->db->delete('sta_news');
    }
}