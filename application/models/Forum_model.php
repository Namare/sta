<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Forum_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function forum_cats(){
       return $this->db->query('
        select post_id,post_name, count(main_post_id) as count_cat
            from
         forum_thead
         left join forums_post on forums_post.post_id = forum_thead.main_post_id
         group by
         main_post_id')->result();
    }
    function forum_thread(){
       return  $this->db->query('
        select id_thead,title, count(thread_id) as count_com
            from
         forum_comments
         left join  forum_thead on forum_comments.thread_id =  forum_thead.id_thead
         group by
         forum_comments.thread_id ')->result();
    }


}

?>