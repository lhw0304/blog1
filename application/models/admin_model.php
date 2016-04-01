<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_by_name_pwd($username, $pwd){
        //'select * from t_admin where admin_name=$name and admin_pwd=$pwd'
        $data = array(
            'username' => $username,
            'pwd' => $pwd
        );
        return $this -> db -> get_where('t_admin', $data) -> row();
    }

    public function get_all(){
        return $this -> db -> get('t_admin') -> result();
    }

    public  function save($admin_name, $admin_pwd){

    }

    public  function update(){

    }

    public  function delete($admin_id){
        $this -> db -> delete('t_admin', array('admin_id' => $admin_id));
    }

}



















