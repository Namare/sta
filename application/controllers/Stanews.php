<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stanews extends CI_Controller {
    private $breadcrumbs;
    public function __construct()
    {
        parent::__construct();
        $this->breadcrumbs[] = 'STA';
        $this->breadcrumbs[] = 'NEWS';
    }

    function index(){
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['add_css'][] = 'news';
        $this->db->order_by('news_category.category_id','asc');
        $data['news_menu'] = $this->db->get('news_category')->result();
            if($this->input->get('cat')!==null){
               $this->db->where('news_category.url',$this->input->get('cat'));
            }
        $this->db->join('news_category','news_category.category_id=sta_news.category_id');

        $data['news'] = $this->db->get('sta_news')->result();
        $this->load->view('header',$header);
        $this->load->view('news/content',$data);

    }

    function news(){
        if($this->uri->segment(3)==null)redirect(base_url().'stanews');
        $header['breadcrumbs'] = $this->breadcrumbs;
        $header['add_css'][] = 'news';
        $data['news_menu'] = $this->db->get('news_category')->result();

        $data['news'] = $this->db->get_where('sta_news',array('id'=>$this->uri->segment(3)))->result();
        $allnews['news'] = $this->db->get('sta_news')->result();
        $this->load->view('header',$header);
        $this->load->view('news/news',$data);
        $this->load->view('news/allnews',$allnews);

    }


}