<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function get_by_name_pwd($username, $pwd){
        //'select * from t_admin where admin_name=$name and admin_pwd=$pwd'
        $data = array(
            'username' => $username,
            'pwd' => $pwd
        );
        return $this -> db -> get_where('t_message', $data) -> row();
    }

    public function get_all(){
        $this->db->order_by("message_id","desc");
        return $this -> db -> get('t_message') -> result();
    }

    public  function save($username, $email,$message){
        $data=array(
            "username"=>$username,
            "email"=>$email,
            "message"=>$message,
            );
        $this -> db-> insert ("t_message",$data);

    }

    public  function update(){

    }

    public  function delete($message_id){
        $this -> db -> delete('t_message', array('message_id' => $message_id));
    }

}



















