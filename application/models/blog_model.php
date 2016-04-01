<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function get_all(){
        $this -> db -> select("*");
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        return $this -> db -> get() -> result();
    }

    public  function save($title, $author, $content,$blog_id){

        $data=array(
            "title"=>$title,
            "author"=>$author,
            "content"=>$content,
            "blog_id"=>$blog_id
        );
        $this -> db-> insert ("t_blog",$data);

    }

    public function get_by_page($page){
        //return $this->db->get('t_blog', 6, $page) -> result();
        $this -> db -> select("*");
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        $this -> db -> limit(6, $page);
        return $this -> db -> get() -> result();
    }
    public function get_by_id($blog_id){
        //'select * from t_admin where admin_name=$name and admin_pwd=$pwd'
//        $this -> db -> select("*");
//        $this -> db -> from('t_blog blog');
//        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');

        $data = array(
            'blog_id' => $blog_id,
        );
        return $this -> db -> get_where('t_blog', $data) -> row();
    }
    public  function delete($blog_id){
        $this -> db -> delete('t_blog', array('blog_id' => $blog_id));
    }

}

