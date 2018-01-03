<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $breadcrumbs;

    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = array('name'=>'Logistics','link'=>base_url().'logistic');
        $this->breadcrumbs[] = 'User profile';
        if($this->input->post('k') == ''){
        if(!$this->ion_auth->logged_in())
            redirect('login');
        }
    }

    function index(){
        $user_id =
            ($this->permission->get_user_by_key($this->input->post('k'))!=false)
                ?$this->permission->get_user_by_key($this->input->post('k'))
                :$this->ion_auth->get_user_id();

        $header['breadcrumbs'] = $this->breadcrumbs;
        $script['users'][] = "user_orders";
        $script['users'][] = "user_attach";
        $this->load->view('header',$header);
        $pr['my'] =  $this->ion_auth->user($user_id)->row();
        $pr['attach'] = $this->db->get_where('user_attachments',array('user_id'=>$this->ion_auth->get_user_id()))->result();
        $this->load->view('user/profile',$pr);

        $data['order_status'] = $this->db->get('order_status')->result();



        $data['createdloads'] = $this->db->query('
        select * from logistic_orders
        WHERE  owner_id = '.$user_id.'
          and status !=3
         order by logistic_orders.id desc  ')->result();

        $data['myorders'] = $this->db->query('
        select * from user_orders
        left join logistic_orders on logistic_orders.id= user_orders.order_id
        WHERE  user_orders.user_id = '. $user_id.'
        and status !=3
        order by logistic_orders.id desc ')->result();
        $data['attach'] = $pr['attach'];


        $data['disp_orders'] = $this->db->query('select * from logistic_orders where status !=3 and user_id='. $user_id)->result();



        $this->load->view('user/myorders',$data);

        $this->load->view('message');
        $this->load->view('user/footer',$script);


        if($this->input->post('attach_name')){
            $name = time();

            $config['upload_path']          = './file/';
            $config['allowed_types']        = 'gif|jpg|png|pdf|txt|doc|docx';
            $config['file_name']             = $name;
            $config['max_size']             = 15000;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);


            if (!$this->upload->do_upload('attach'))
            {
                $error = array('error' => $this->upload->display_errors());
                echo var_dump($error);


            }
            else
            {

                $upl =  $this->upload->data();

                $att['att_name'] = $this->input->post('attach_name');
                $att['att_description'] = $this->input->post('attach_desc');
                $att['type'] = $upl['file_ext'];
                $att['name_code'] = $name;
                $att['user_id'] =  $user_id;
                $att['is_profile'] = ($this->input->post('attach_ispr')=="on")?1:0;
                $this->db->insert('user_attachments',$att);
                redirect(current_url(),'refresh');


            }
        }

    }

    function orders(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $script['users'][] = "order";

        $this->load->view('header',$header);
        $data['order']=$this->db->get_where('logistic_orders',array('id'=>$this->uri->segment(3)))->result();

        $this->db->join('users','users.id=user_orders.user_id');
        $this->db->select('users.username,users.id');
        $this->db->distinct();
        $data['order_users']= $this->db->get_where('user_orders',array('order_id'=>$this->uri->segment(3)))->result();

        $data['user_drivers'] = $this->ion_auth->users()->result();
        $data['attach'] = $this->db->get_where('user_attachments',array('user_id'=>$this->ion_auth->get_user_id()))->result();


        $this->load->view('user/orders',$data);

        $this->load->view('message');
        $this->load->view('user/footer',$script);

    }

    function premium_data(){
        $name = time();
        $config['upload_path']          = './file/policy/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|txt|doc|docx';
        $config['file_name']             = $name;
        $config['max_size']             = 15000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('policy'))
        {

            redirect(base_url().'user');

        }else{
            $upl =  $this->upload->data();
            $data['policy'] = $name.$upl['file_ext'];
            $data['is_prim'] = 1;
            $this->db->where('id', $this->ion_auth->get_user_id());
            $this->db->update('users',$data);
            redirect(base_url().'user','refresh');
        }

    }

    function update_order(){
        if($this->input->post('i')==null)die();
        $data['id']=$this->input->post('i');
        $data['owner_id']=$this->ion_auth->get_user_id();
        if($this->db->get_where('logistic_orders',$data)->num_rows()==0)die();

        $this->db->where('id',$this->input->post('i'));
        $this->db->update('logistic_orders',array($this->input->post('n')=>$this->input->post('v')));

    }

    function get_addition_files(){
        if($this->uri->segment(3)==null)die();

        $this->db->join('user_attachments','user_attachments.att_id=order_attachments.attach_id');
        $data['docs']= $this->db->get_where('order_attachments',array('order_id'=>$this->uri->segment(3)))->result();

        $this->load->view('user/addition_files',$data);
    }

    function update_accept(){
        if($this->input->post('i')==null)die();
        $this->db->where('id',$this->input->post('i'));
        $this->db->update('logistic_orders',array('accept'=>$this->ion_auth->get_user_id()));
    }

    function update_dicline(){
        if($this->input->post('i')==null)die();
        $this->db->where('id',$this->input->post('i'));
        $this->db->update('logistic_orders',array('user_id'=>0));
    }

    function get_user_questions(){
        if($this->input->post('i')==null)die();
        $where['user_id'] = $this->input->post('i');
        $where['order_id'] = $this->input->post('o');
        $data['comments'] = $this->db->get_where('order_comments',$where)->result();

        $this->load->view('user/order_comments',$data);

    }
    function send_comment_user(){
        if($this->input->post('u')==null)die();

        $data = array(
            'user_id'=>$this->input->post('u'),
            'owner_id'=>$this->ion_auth->get_user_id(),
            'comment'=>$this->input->post('c'),
        );
        $this->db->insert('user_comments',$data);

    }

    function get_dispatch_user(){
        $this->db->join('users','logistic_orders.user_id=users.id');
        $this->db->select('users.username,logistic_orders.user_id');
        $data = $this->db->get_where('logistic_orders',array('logistic_orders.id'=>$this->uri->segment(3)))->result();
        echo '{
            "id":"'.$data[0]->user_id.'",
            "user":"'.$data[0]->username.'"
        }';
    }

    function set_dispatch_user(){
        if($this->input->post('id')==null)die();
        $this->db->where('id',$this->uri->segment(3));
        $this->db->update('logistic_orders',array('user_id'=>$this->input->post('id')));

        $this->db->where('id',$this->input->post('id'));
        $this->db->update('users',array('notification_auto '=>'1'));


    }

    function set_dispatch_user_null(){
        //ToDo проверку на то кому принадлежит заказ
        //if($this->input->post('id')==null)die();
        $this->db->where('id',$this->uri->segment(3));
        $this->db->update('logistic_orders',array('user_id'=> null));

    }

    function change_order_status(){
        if(!$this->input->post())die();
        $this->db->where('id',$this->input->post('i'));
        $this->db->update('logistic_orders',array('status'=>$this->input->post('s')));
    }

    function add_select_attach(){
        if($this->input->post('i')==null)die();
        $data['order_id'] = $this->input->post('i');
        $data['attach_id'] = $this->input->post('a');
        $this->db->insert('order_attachments',$data);
    }

    function del_order_attach(){
        if($this->input->post('i')==null)die();
        $this->db->delete('order_attachments',array('id'=>$this->input->post('i')));
    }

    function order_attach(){
        if($this->uri->segment(3)==null)die();
        $data['orders']= $this->db->query('select * from order_attachments
        left join user_attachments on order_attachments.attach_id = user_attachments.att_id
        where order_attachments.order_id="'.$this->uri->segment(3).'"
        ')->result();
        $this->load->view('user/order_attach',$data);

    }

    function get_order_comment(){
       if($this->input->get('id')==null)die();
        $data['comments'] =  $this->db->get_where('order_comments',array('order_id'=>$this->input->get('id')))->result();

        $this->load->view('user/order_comments',$data);

    }

    function get_order_users(){
        if($this->input->get('id')==null)die();
        $data['users'] =  $this->db->get_where('user_orders',array('order_id'=>$this->input->get('id')))->result();


        $this->load->view('user/order_users',$data);

    }



    function  update_attach(){
        if($this->input->post('n')==null)die();
        $data['att_name'] = $this->input->post('n');
        $data['att_description'] = $this->input->post('d');
        $data['is_profile'] = $this->input->post('is');
        $this->db->where('user_id', $this->ion_auth->get_user_id());
        $this->db->where('att_id', $this->input->post('i'));
        $this->db->update('user_attachments', $data);

    }

    function delete_attach(){
        if($this->input->post('i')==null)die();
        $this->db->delete('user_attachments', array('att_id' => $this->input->post('i')));
        $this->db->delete('order_attachments', array('attach_id' => $this->input->post('i')));
    }

    function delete_order(){
        if($this->input->post('i')==null)die();
        $this->db->where('id', $this->input->post('i'));
        $this->db->update('logistic_orders', array('status'=>'3'));

    }

    function send_msg(){
        if($this->input->post('msg')==null)die();

        $data['text'] = $this->input->post('msg');
        $data['to_user_id'] = $this->input->post('i');
        $data['from_user_id'] = $this->ion_auth->get_user_id();
        $data['is_view'] = 1;
        $data['added'] = time();

        $this->db->insert('messages',$data);

    }


    function user_id(){
        $data['user_data'] =$this->ion_auth->user($this->uri->segment('3'))->row() ;

        if($data['user_data'] == null)die('Error');

        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['add_css'][] = 'userprofile';
        $script=array();
        if($this->uri->segment('3') == $this->ion_auth->get_user_id()){
        $script['users'][] = "user_status";
        }
        $this->load->view('header',$header);
        $data['user_id'] = $this->uri->segment('3');
        $this->db->order_by('id','asc');
        $data['user_comments'] = $this->db->get_where('user_comments',array('user_id'=>$this->uri->segment('3')))->result();

        $data['attachments'] = $this->db->get_where('user_attachments',array(
            'user_id'=>$data['user_id'],
            'is_profile'=>'1'
        ))->result();
        $data['status'] = @$this->db->get_where('profile_status',array('user_id'=>$this->uri->segment('3')))->result()[0]->status_text;

        $this->load->view('user/userprofile',$data);
        $this->load->view('message');



        $this->load->view('user/footer',$script);

    }

    function update_status(){
        $data = array(
            'status_text'=>$this->input->post('t'),
            'user_id'=>$this->ion_auth->get_user_id()
        );
        if( $this->db->get_where('profile_status',array('user_id'=>$this->ion_auth->get_user_id()))->result()){

            $this->db->where('user_id', $this->ion_auth->get_user_id());
            $this->db->update('profile_status', $data);
       }
       else{
            $this->db->insert('profile_status',$data);

       }
    }

    function msg(){
        if($this->input->post('u')==null)die();
        $data['from_user_id']=$this->ion_auth->get_user_id();
        $data['to_user_id']=$this->input->post('u');
        $data['text']=$this->input->post('t');
        $data['added']=time();
        $data['is_view']=1;
        $this->db->insert('messages',$data);

    }

    function phone(){
        if($this->input->post('p')==null)die();

        $data['phone'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }
    function group(){
        if($this->input->post('p')==null)die();

        $data['group_id'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users_groups',$data);
    }

    function firstname(){
        if($this->input->post('p')==null)die();

        $data['first_name'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function howcdl(){
        if($this->input->post('p')==null)die();

        $data['howcdl'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function lastname(){
        if($this->input->post('p')==null)die();

        $data['last_name'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function address(){
        if($this->input->post('p')==null)die();

        $data['address'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function auto(){
        if($this->input->post('p')==null)die();

        $data['auto_id'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function website(){
        if($this->input->post('p')==null)die();

        $data['website'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }


    function dit(){
        if($this->input->post('p')==null)die();

        $data['dit'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function mc(){
        if($this->input->post('p')==null)die();

        $data['mc'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }
    function policyname(){
        if($this->input->post('p')==null)die();

        $data['policy_name'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function company(){
        if($this->input->post('p')==null)die();

        $data['company_id'] =$this->input->post('p');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function about(){
        if($this->input->post('a')==null)die();

        $data['about'] =$this->input->post('a');
        $this->db->where('id', $this->ion_auth->get_user_id());
        $this->db->update('users',$data);
    }

    function inbox(){
        $this->db->order_by('id_message','desc');
        $data['msg'] = $this->db->get_where('messages',array('to_user_id'=>$this->ion_auth->get_user_id()))->result();
        $data['usr'] = true;
        $this->load->view('user/inbox',$data);

    }
    function outbox(){
        $this->db->order_by('id_message','desc');
        $data['msg'] = $this->db->get_where('messages',array('from_user_id'=>$this->ion_auth->get_user_id()))->result();
        $data['usr'] = false;
        $this->load->view('user/inbox',$data);

    }

    function add_fav(){
        if($this->input->post('i')==null)die();
            $data = array(
            'user_id'=>$this->ion_auth->get_user_id(),
            'fav_user_id'=>$this->input->post('i'));

        if($this->db->get_where('favorite_users',$data )->result()){
          $this->db->delete('favorite_users',$data);
            echo 0 ;
        }
        else{
            $this->db->insert('favorite_users',$data);
            echo 1 ;
        }

    }

    function check_chat(){
        header('Content-Type: application/json');
    $this->db->order_by("id_message",'desc');
       if($data = @$this->db->get_where('messages',array(
            'to_user_id'=>$this->ion_auth->get_user_id(),
            'is_view'=>1
        ))->result()){
           echo '{
           "text" : "'.htmlspecialchars($data[0]->text).'",
           "id" : "'.$data[0]->id_message.'"
           }';
       }

    }

    function check_view(){
        if($this->input->post('i')==null)die();
        echo $this->input->post('i');

        if($data = @$this->db->get_where('messages',array(
            'id_message'=>$this->input->post('i'),
            'is_view'=>1
        ))->result()){
            $this->db->where('id_message', $this->input->post('i'));
            $this->db->update('messages',array('is_view'=>'0'));
        }

    }

}