<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {


    private  $breadcrumbs;
    private  $right_content;

    public function __construct()
    {
        parent::__construct();
//        if (!$this->ion_auth->logged_in())
//            return show_error('Войдите в систему чтобы увидеть форум.');

        $this->load->model('forum_model');
        $this->load->helper('smiley');
        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = array('name'=>'Forum','link'=>base_url().'forum');
        header('Access-Control-Allow-Origin: *');
        $this->right_content['posts'] = $this->forum_model->forum_cats();
        $this->right_content['thread'] = $this->forum_model->forum_thread();
    }


    function index(){

        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['add_css'][] = 'forum';


        $content['forums'] =$this->db->get('forums')->result();

        $this->load->view('header',$data);
        $this->load->view('forum/forum_menu');
        $this->load->view('forum/content',$content);
        $this->load->view('forum/content_right', $this->right_content);
        $this->load->view('forum/footer');

    }

    function profile(){

        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['add_css'][] = 'forum';

        $this->db->order_by('comment_id','desc');
        $data['comments']  = $this->db->get_where('forum_comments',array('autor_id'=>$this->ion_auth->get_user_id()));


        $data['last_thread']  =$this->db->get_where('forum_thead',array('id_thead'=> $data['comments']->result()[0]->thread_id))->result();
        $this->load->view('header',$data);
        $this->load->view('forum/forum_menu');
        $this->load->view('forum/profile',$data);
        $this->load->view('forum/content_right', $this->right_content);
        $this->load->view('forum/footer');
    }

    function send_image(){
        $name = time().'.jpg';
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/images/forum/'.$this->ion_auth->get_user_id();
        if (!file_exists($config['upload_path'] )) {
            mkdir( $config['upload_path'] , 0700, true);
        }
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']             = $name;
        $config['max_size']             = 15000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']           = true;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('send_image')){
            echo $name;
        }else{
            var_dump( $this->upload->display_errors());
            var_dump( $_POST);
            var_dump( $_FILES);
        }


    }

    function change_avatar(){
        $name = $this->ion_auth->get_user_id().'.jpg';
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/images/forum/avatar';

        $config['allowed_types']        = 'jpg|png';
        $config['file_name']             = $name;
        $config['max_size']             = 15000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']           = true;
        $this->load->library('upload', $config);
        $this->upload->do_upload('avatar');
        $upload_data = $this->upload->data();

        $this->load->library('image_lib');
        $config1['image_library'] = 'gd2';
        $config1['source_image'] = $_SERVER['DOCUMENT_ROOT'].'/images/forum/avatar/'. $upload_data['file_name'];
        $config1['create_thumb'] = false;
        $config1['maintain_ratio'] = false;
        $config1['width'] = 100;
        $config1['height'] = 100;
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        $this->image_lib->clear();

        redirect(base_url().'forum/profile');
    }

    function new_forum(){
        if(!$this->input->post())return show_error('Нет данных.');
        if(!is_string($this->input->post('forum_title')))return show_error('ошибка.');


        $data['post_name'] = $this->input->post('forum_title');
        $data['post_description'] = $this->input->post('forum_desc');
        $data['main_forum_id'] = $this->input->post('main_forum');
        $this->db->insert('forums_post',$data);
    }

    function view_forum(){
        if ($this->uri->segment(3) == FALSE)
            return show_404();

        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['breadcrumbs'][] = 'Выбрать подфорум';
        $data['add_css'][] = 'forum';

        $content['forums_head'] =$this->db->get_where('forum_thead', array('main_post_id' => $this->uri->segment(3)))->result();
        $content['forum_meta'] = $this->db->get_where('forums_post',array('post_id'=>$this->uri->segment(3)))->result();

        $this->load->view('header',$data);
        $this->load->view('forum/forum_menu');
        $this->load->view('forum/view_forum', $content);
        $this->load->view('forum/content_right', $this->right_content);
        $this->load->view('forum/footer');
    }


    function view_thread(){
        if ($this->uri->segment(3) == FALSE)
            return show_404();

        $this->db->query('UPDATE forum_thead SET views = views + 1 WHERE id_thead = '.$this->uri->segment(3));

        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['breadcrumbs'][] = 'Выбрать подфорум';
        $data['add_css'][] = 'forum';
        $this->db->order_by('comment_id','asc');
        $this->db->join('users', 'forum_comments.autor_id =  users.id');
        $this->db->limit(20,$this->uri->segment(4));
        $get_comment = $this->db->get_where('forum_comments', array('thread_id'=>$this->uri->segment(3)));

        $content['comments'] = $get_comment->result();

        $content['th_id'] =$this->uri->segment(3);

        $this->load->library('pagination');
        $config['base_url'] = base_url().'forum/view_thread/'.$this->uri->segment(3);
        $config['total_rows'] = $this->db->get_where('forum_comments', array('thread_id'=>$this->uri->segment(3)))->num_rows();
        $config['per_page'] = 20;
        $config['num_links'] = 1;
        $config['attributes'] = array('class' => 'forum_page sub_forum_href');
        $config['prev_link'] = '<i class="fa fa-arrow-circle-left"></i>';
        $config['next_link'] = '<i class="fa fa-arrow-circle-right"></i>';
        $config['cur_tag_open'] = '<strong class="forum_current_page">';

        $this->pagination->initialize($config);
        $content['pagination'] = $this->pagination->create_links();


        $this->load->library('table');

        $image_array = get_clickable_smileys(base_url().'smileys/', 'new_comment');
        $col_array = $this->table->make_columns($image_array, 8);

        $content['smiley_table'] = $this->table->generate($col_array);


        $this->load->view('header',$data);
        $this->load->view('forum/forum_menu');
        $this->load->view('forum/forum_trhead',$content);
        $this->load->view('forum/content_right', $this->right_content);
        $this->load->view('forum/footer');
    }


    function search(){
        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['breadcrumbs'][] = 'Выбрать подфорум';
        $data['add_css'][] = 'forum';


        $this->db->join('users', 'forum_comments.autor_id =  users.id');

        $this->db->limit(100);
        $this->db->like('comment', $this->input->get('s'));
        if(strlen($this->input->get('s')) < 3){redirect(base_url().'forum');}
        $data['comments'] =  $this->db->get_where('forum_comments')->result();

        $this->load->view('header',$data);
        $this->load->view('forum/forum_menu');
        $this->load->view('forum/forum_search',$data);
        $this->load->view('forum/content_right', $this->right_content);
        $this->load->view('forum/footer');
    }

    function audio(){
        if($this->permission->get_user_by_key($this->input->post('key'))==false)die();
        $user_id = $this->permission->get_user_by_key($this->input->post('key'));


        $config['allowed_types']        = '*';
        $config['file_name']            = time();
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/audio';
        $config['max_size']             = 50000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']           = true;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('micro_forum')){

            $data['comment'] =  strip_tags('<audio controls="controls"><source src="'.base_url().'audio/'.$this->upload->data()['file_name'].'"></audio>','<audio><source>');
            $data['thread_id'] = $this->input->post('post_id');
            $data['autor_id'] = $user_id;
            $data['add_time'] = time();
            $this->db->insert('forum_comments',$data);

        }


        var_dump( $this->upload->display_errors());
        var_dump($this->upload->data());
        echo $this->input->post('th_id');
        echo $this->upload->data()['file_name'];



    }

    function photo(){
        if($this->permission->get_user_by_key($this->input->post('key'))==false)die();
        $user_id = $this->permission->get_user_by_key($this->input->post('key'));


        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']            = time();
        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/photo';
        $config['max_size']             = 50000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('photo_forum')){

            $data['comment'] =  strip_tags($this->input->post('msg').' <img src="'.base_url().'photo/'.$this->upload->data()['file_name'].'"></img>','<img>');
            $data['thread_id'] = $this->input->post('post_id');
            $data['autor_id'] = $user_id;
            $data['add_time'] = time();
            $this->db->insert('forum_comments',$data);

        }


        var_dump( $this->upload->display_errors());
        var_dump($this->upload->data());
        echo $this->input->post('th_id');
        echo $this->upload->data()['file_name'];



    }

    function new_comment(){

        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();

        if(!$this->input->post())return show_error('Нет данных.');
        if($this->input->post('cm')=='')return show_error('Нет данных.');
        if(!is_numeric($this->input->post('id')))return show_error('ошибка.');
        $audio = null;
        if($this->input->post('aud')!=null){
            $audio ='<audio controls="" src="'. $this->input->post('aud').'"></audio>';
        }
        $rpl= ($this->input->post('new_comment_reply')==  'undefined')?'':$this->input->post('new_comment_reply');

        $data['comment'] =  strip_tags($rpl.$this->input->post('cm'),'<iframe><p><footer><blockquote><img>');
        $data['thread_id'] = $this->input->post('id');
        $data['autor_id'] = $user_id;
        $data['add_time'] = time();
        $this->db->insert('forum_comments',$data);

    }


    function add_thread(){
        if($this->permission->get_user_by_key($this->input->post('key')) !=true){
            if(!$this->ion_auth->logged_in())redirect(base_url().'forum');
        }

        $data['breadcrumbs'] = $this->breadcrumbs;
        $data['breadcrumbs'][] = 'Создать тему';
        $data['add_css'][] = 'forum';

        $this->load->library('table');

        $image_array = get_clickable_smileys(base_url().'smileys/', 'new_comment');
        $col_array = $this->table->make_columns($image_array, 8);

        $data['smiley_table'] = $this->table->generate($col_array);

        $data['subcats'] = $this->db->get('forums_post')->result();

        $this->load->view('header',$data);
        $this->load->view('forum/forum_menu');
        $this->load->view('forum/new_thread',$data);
        $this->load->view('forum/content_right', $this->right_content);
        $this->load->view('forum/footer');

    }

    function new_thread(){
        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();
        if(!$this->input->post())return show_error('Нет данных.');
        if(!is_numeric($this->input->post('id')))return show_error('ошибка.');


        $data['main_post_id'] = $this->input->post('id');
        $data['title'] = $this->input->post('title');
        $data['autor_id'] = $user_id;
        $this->db->insert('forum_thead',$data);
        $thread_new_id = $this->db->insert_id();

        $data2['comment'] = $this->input->post('cm');
        $data2['autor_id'] = $user_id;
        $data2['thread_id'] = $this->db->insert_id();
        $this->db->insert('forum_comments',$data2);

        redirect(base_url().'forum/view_thread/'.$thread_new_id);

    }

    function delete_thread(){
        if(!$this->ion_auth->is_admin())die('No admin');
        if(!$this->input->post())return show_error('Нет данных.');
        if(!is_numeric($this->input->post('id')))return show_error('ошибка.');

        $this->db->delete('forum_thead',array('id_thead'=>$this->input->post('id')));
        $this->db->delete('forum_comments',array('thread_id'=>$this->input->post('id')));

    }

    function feed(){
        $this->db->join('users','users.id = autor_id','left');
        $this->db->join('forum_thead','forum_thead.id_thead = thread_id','left');
        $this->db->limit(30);
        $this->db->order_by('comment_id','desc');
        $data['comments'] = $this->db->get('forum_comments')->result();

        $this->load->view('forum/feed', $data);
    }
    function add_like(){
        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();

        if($this->input->post('i')==null)die();
        if($this->db->get_where('sta_likes',array(
                'user_id'=>$user_id,
                'comment_id'=>$this->input->post('i')
            ))
                ->num_rows() == 0){
            $this->db->insert('sta_likes',array(
                'user_id'=>$user_id,
                'comment_id'=>$this->input->post('i')
            ));
            echo 1;
        }else{
            $this->db->delete('sta_likes',array(
                'user_id'=>$user_id,
                'comment_id'=>$this->input->post('i')
            ));
            echo 2;
        }


    }
    function nologin(){
        echo  $this->ion_auth->logged_in()?true:false;
    }
    function login(){
        echo $this->ion_auth->login($this->input->post('e'), $this->input->post('p'));
    }
    function add_dislike(){
        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();
        if($this->input->post('i')==null)die();

        if($this->db->get_where('sta_dislikes',array(
                'user_id'=>$user_id,
                'comment_id'=>$this->input->post('i')
            ))
                ->num_rows() == 0){

            $this->db->insert('sta_dislikes',array(
                'user_id'=>$user_id,
                'comment_id'=>$this->input->post('i')
            ));
            echo 1;

        }else{
            $this->db->delete('sta_dislikes',array(
                'user_id'=>$user_id,
                'comment_id'=>$this->input->post('i')
            ));
            echo 2;
        }


    }

    function send_report(){
        $this->load->library('email');

        $this->email->from('it@namgam.com', 'STA');
        $this->email->to('nwebootn@gmail.com');
        $report[1] = 'SPAM';
        $report[2] = 'Pornography';
        $report[3] = 'Angry Speech';
        $report[4] = 'Other';

        $this->email->subject('STA Report!');
        $this->email->message('User :'. $this->ion_auth->user($this->input->post('i'))->row()->username.'
        send report: '.base_url().'forum/view_thread/'.$this->input->post('p').'
        Subject:'.$report[$this->input->post('r')]);

        $this->email->send();
    }



}