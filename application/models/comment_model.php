<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function get_all(){
        $this -> db -> select("*");
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        return $this -> db -> get() -> result();
    }

    public function get_by_page($page){
        //return $this->db->get('t_blog', 6, $page) -> result();
        $this -> db -> select("*");
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        $this -> db -> limit(6, $page);
        return $this -> db -> get() -> result();
    }
    public function get_by_blog_id($blog_id){
        //'select * from t_admin where admin_name=$name and admin_pwd=$pwd'
//        $this -> db -> select("*");
//        $this -> db -> from('t_blog blog');
//        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');

        $data = array(
            'blog_id' => $blog_id,
        );
        return $this -> db -> get_where('t_comment', $data) -> result();
    }
    public  function save($uname,$email,$subject,$blog_id,$website){
        $data = array(
            "uname"=>$uname,
            "email"=>$email,
            "subject"=>$subject,
            "blog_id"=>$blog_id,
            "website"=>$website

    );
        $this -> db ->insert('t_comment',$data);
    }

}

