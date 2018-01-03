<?php
defined('BASEPATH') OR exit('');

class Logistic extends CI_Controller {

    private $breadcrumbs;

    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = array('name'=>'Logistics','link'=>base_url().'logistic');
        $this->breadcrumbs[] = 'Find loads';

    }

    function test(){

    $this->load->view('test');
    }

    function upload_app(){
       echo"asdasd";
        $name = time().'p.wav';
        $config['upload_path']         = $_SERVER['DOCUMENT_ROOT'].'/audio/';
        $config['allowed_types']       = '*';
        $config['file_name']           = $name;
        $config['max_size']            = 150000;
        $config['max_width']           = 0;
        $config['max_height']          = 0;
        $config['overwrite']           = true;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('recording')){
            echo $name;
        }
       echo $this->upload->data();
        echo $this->upload->display_errors();
        echo var_dump($_FILES);
    }

    public function index()
	{
        $data['apikey']="&amp;key=AIzaSyCGWPy8EXdIZF6fIGX5IsMlrv2y-pT1BZY" ;

      if($this->input->get('f_a')!==null){
          if($this->input->get('f_a')!='0')
          $this->db->like('auto',$this->input->get('f_a'),'both');
        }
      if($this->input->get('f_f')!=null){
          $this->db->like('from_end',$this->input->get('f_f'));
        }
      if($this->input->get('f_t')!=null){
          $this->db->like('to_end',$this->input->get('f_t'));
        }


        if($this->input->post()){

            $pick = explode( ',', $this->input->post('filter_from'));
            $dil = explode( ',', $this->input->post('filter_to'));
            if($this->input->post('filter_from')){$this->db->like('from_end',$pick[0]);}
            if($this->input->post('filter_to')){$this->db->like('to_end',$dil[0]);}

            if($this->input->post('filter_start')){$this->db->where('date_start',$this->input->post('filter_start'));}
            if($this->input->post('filter_end')){$this->db->where('date_end',$this->input->post('filter_end'));}

            if($this->input->post('filter_weight')){$this->db->where('weight',$this->input->post('filter_weight'));}
            if($this->input->post('filter_length')){$this->db->where('length',$this->input->post('filter_length'));}
            if($this->input->post('filter_price')){$this->db->where('price',$this->input->post('filter_price'));}

            if($this->input->post('filter_auto')){$this->db->where('auto',$this->input->post('filter_auto'));}
        }
        $this->db->where('user_id','0');
        $this->db->where('status!=','3');
            if(isset($_GET['sort']) and $_GET['sort']=='asap')
            $this->db->order_by('asap','desc');
        $this->db->order_by('added','desc');
        $data['orders'] =  $this->db->get('logistic_orders')->result();
        $data['count_orders']= count( $data['orders'] );

        $data['my_orders']= $this->db->query('select * from user_orders
            left join logistic_orders as lo on lo.id =user_orders.order_id order by user_orders.id desc')->result();

        $header['breadcrumbs'] = $this->breadcrumbs;
        $this->load->view('header',$header);
		$this->load->view('logistic', $data);
        $this->load->view('footer');
	}

    function send_cons(){
        $this->load->library('email');

        $this->email->from('it@namgam.com', 'STA');
        $this->email->to('nwebootn@gmail.com, ygrynko@gmail.com');


        $this->email->subject('STA report!');
        $this->email->message($this->input->post('e').':  '.$this->input->post('m'));

        $this->email->send();

    }

    function send_support(){
        $this->load->library('email');

        $this->email->from('it@namgam.com', 'STA');
        $this->email->to('nwebootn@gmail.com');


        $this->email->subject('STA Consultation !');
        $this->email->message($this->input->post('your_name').' '.$this->input->post('your_email').' '.$this->input->post('your_phone').' '.$this->input->post('your_message'));

        $this->email->send();

    }

    function get_phone(){
        if($this->uri->segment(3)==null)die();
        echo @$this->ion_auth->user($this->uri->segment(3))->row()->phone;
    }

    function get_email(){
        if($this->uri->segment(3)==null)die();
        echo @$this->ion_auth->user($this->uri->segment(3))->row()->email;
    }
    function get_name(){
        if($this->uri->segment(3)==null)die();
        echo @$this->ion_auth->user($this->uri->segment(3))->row()->username;
    }

    function order_id(){
        $data['order']= $this->db->get_where('logistic_orders',array('id'=>$this->uri->segment(2)))->result();
        if($data['order'] == null)redirect(base_url());
        $header['breadcrumbs'] = $this->breadcrumbs;

        $data['comments'] = $this->db->get_where('order_comments',array('order_id'=>$this->uri->segment(2)))->result();

        $this->load->view('header',$header);
        $this->load->view('order_id',$data);
        $this->load->view('footer');
    }

    function company_id(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['add_css'][] = 'userprofile';
        $this->load->view('header',$header);

        $data['company_users'] = $this->db->get_where('users',array('company_id'=>$this->uri->segment(2)))->result();
        $data['company']= $this->db->get_where('company',array('id'=>$this->uri->segment(2)))->result();
        $this->load->view('company',$data);
    }


    function add_order(){
        if($this->ion_auth->user()->row()->is_prim==0)die('No primary');
        if($this->ion_auth->in_group(4))die();
      if($this->input->post() and $this->input->post('add_from')!=''){
          $data['added'] = time();
          $data['from_end'] = $this->input->post('add_from');
          $data['to_end'] = $this->input->post('add_to');
          $data['date_start'] = $this->input->post('add_start');
          $data['date_end'] = $this->input->post('add_end');
          $data['weight'] = $this->input->post('add_weight');
          $data['length'] = $this->input->post('add_length');
          $data['wide'] = $this->input->post('add_wide');
          $data['height'] = $this->input->post('add_height');
          $data['auto'] = $this->input->post('add_auto');
          $data['asap'] = $this->input->post('add_asap');
          $data['other_auto'] = $this->input->post('add_other');
          $data['info'] = $this->input->post('add_info');
          $data['additional'] = $this->input->post('additional');
          $data['price'] = $this->input->post('add_price');

          $data['pickuplat'] = $this->input->post('puplat');
          $data['pickuplng'] = $this->input->post('puplng');

          $data['deliverylat'] = $this->input->post('delat');
          $data['deliverylng'] = $this->input->post('delng');
          $data['distance'] = $this->input->post('dist');
          $data['totaltime'] = $this->input->post('tt');
          $data['points'] = $this->input->post('points');
          $data['owner_id'] =  $this->ion_auth->get_user_id();


          $this->db->insert('logistic_orders',$data);
      }

    }
    //Взать заказ
    function get_order(){
        if($this->input->post('k')=='')
        if($this->ion_auth->user()->row()->is_prim==0)die('No primary');
            $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();

        if($this->input->post()){

            $owner_id = $this->input->post('owner_id');
            $data['user_id'] = $user_id;
            $data['order_id'] = $this->input->post('order_id');


            if( $this->input->post('commentOrder')==''){
                if($this->db->get_where('user_orders',
                    array(
                        'user_id'=>$user_id,
                        'order_id'=> $this->input->post('order_id')
                    ))->result())die('Заказ уже взят');

            $this->db->insert('user_orders', $data);
            echo"You got new load!";
                $data_array = array(
                    array(
                        'name'=>'Заказчик:',
                        'value'=>'<a href="'.base_url().'user/user_id/'.$owner_id.'">'.$this->ion_auth->user($owner_id)->row()->username.'</a>'
                    ),
                    array(
                        'name'=>'Новый кандидат:',
                        'value'=>'<a href="'.base_url().'user/user_id/'.$data['user_id'].'">'.$this->ion_auth->user($data['user_id'])->row()->username.'</a>'
                    ),
                    array(
                        'name'=>'Страница заказа:',
                        'value'=>'<a href="'.base_url().'order_id/'.$data['order_id'].'">Детали заказа</a>'
                    )
                );
                $this->stano->set_nf($user_id,$owner_id,1,$data_array);
            }

            if($this->input->post('commentOrder')!=''){
              $data['comment'] = $this->input->post('commentOrder');
              $this->db->insert('order_comments', $data);
                $data_array = array(
                    array(
                        'name'=>'Заказчик:',
                        'value'=>'<a href="'.base_url().'user/user_id/'.$owner_id.'">'.$this->ion_auth->user($owner_id)->row()->username.'</a>'
                    ),
                    array(
                        'name'=>'Новый комментарий:',
                        'value'=>$this->input->post('commentOrder')
                    ),
                    array(
                        'name'=>'Страница заказа:',
                        'value'=>'<a href="'.base_url().'order_id/'.$data['order_id'].'">Детали заказа</a>'
                    )

                );
                $this->stano->set_nf($user_id,$owner_id,3,$data_array);


            }
        }
    }

    function get_location(){
        if(!$this->ion_auth->logged_in())die();

        $data['lat'] = $this->input->post('lat');
        $data['lng'] = $this->input->post('lng');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users', $data );


    }


}
