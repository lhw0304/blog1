<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
	public function add_blog()
	{
		$this->load->view('add-blog');
	}
	public function contact()
	{
		$this->load->view('contact');
	}
	public function detail()
{
	$blog_id = $this -> input -> get('blog_id');
	$this -> load -> model('blog_model');
	$row = $this -> blog_model -> get_by_id($blog_id);

	$this -> load -> model('comment_model');
	$result = $this -> comment_model -> get_by_blog_id($blog_id);
	$data = array(
			'blog' => $row,
			'comments' => $result
	);
	$this->load->view('detail', $data);
}
	public function detail_p($blog_id)
	{

		$this -> load -> model('blog_model');
		$row = $this -> blog_model -> get_by_id($blog_id);

		$this -> load -> model('comment_model');
		$result = $this -> comment_model -> get_by_blog_id($blog_id);
		$data = array(
				'blog' => $row,
				'comments' => $result
		);
		$this->load->view('detail', $data);
	}
	public function message()
	{	
		$username= $this-> input-> post("username");
		$email= $this-> input-> post("email");
		$message= $this-> input-> post("message");
		$this->load-> model('message_model');
		$this->message_model->save($username,$email,$message);
		$this->contact();

	}
	public function comment()
	{
		$uname= $this-> input-> post("uname");
		$email= $this-> input-> post("email");
		$subject= $this-> input-> post("subject");
		$blog_id= $this-> input-> post("blog_id");
		$website= $this-> input-> post("website");

		$this->load-> model('comment_model');

		$this->comment_model->save($uname,$email,$subject,$blog_id,$website);
//		$this->detail_p($blog_id);
		redirect('welcome/detail?blog_id='.$blog_id);

	}
	public function login()
	{	
		$this->load->view('login');
	}
	public function delete_admin()
	{

		$admin_id= $this-> input-> get("admin_id");

		$this->load-> model('admin_model');

		$this->admin_model->delete($admin_id);
		$this->admin_mrg();

	}
	public function delete_message()
	{

		$message_id= $this-> input-> get("message_id");

		$this->load-> model('message_model');

		$this->message_model->delete($message_id);
		$this->admin_message();

	}

	public function delete_blog()
	{

		$blog_id= $this-> input-> get("blog_id");

		$this->load-> model('blog_model');

		$this->blog_model->delete($blog_id);

		$this->admin_blog();

	}

	public function bianji_blog()
	{

		$blog_id= $this-> input-> get("blog_id");

		$this->load-> model('blog_model');

		$row=$this->blog_model->get_by_id($blog_id);

		$data = array(
				"row"=>$row
		);

		$this->load->view('bianji-blog',$data);

	}


	public function admin()
	{

		$username= $this-> input-> post("username");
		$pwd= $this-> input-> post("pwd");

		$this->load-> model('admin_model');

		$row=$this->admin_model->get_by_name_pwd($username,$pwd);
		if($row){
			$this->load->view('admin-index');
		}else{
			$this->load->view('login');
		}

	}
	public function admin_mrg()
	{
		$this->load-> model('admin_model');

		$admins=$this->admin_model->get_all();

		if($admins){
			$data = array(
				"admins"=>$admins
			);
			$this->load->view('admin-mgr',$data);
		}
	}
	public function admin_blog()
	{
		$this->load-> model('blog_model');

		$blogs=$this->blog_model->get_all();

		if($blogs){
			$data = array(
					"blogs"=>$blogs
			);
			$this->load->view('admin-blog',$data);
		}

	}

	public function admin_message()
	{
		$this->load-> model('message_model');

		$messages=$this->message_model->get_all();

		if($messages){
			$data = array(
					"messages"=>$messages
			);
			$this->load->view('admin-message',$data);
		}
	}
	public function get_articles(){
		$page = $this -> input -> get('page');
		$this -> load -> model('blog_model');
		$all = $this -> blog_model -> get_all();
		$total = count($all);
		$total_page = ceil($total / 6 + 1);
		$result = $this -> blog_model -> get_by_page($page);
		$json = array(
				'data' => $result,
				'isEnd' => $page/6+1<$total_page?false:true
		);
		echo json_encode($json);
	}

	public function save_blog(){
		$title = $this -> input -> post('title');
		$author = $this -> input -> post('author');
		$content = $this -> input -> post('content');
		$blog_id="";

		if($title == '' || $author  == '' || $content == ''){
			//$this -> contact();//调用方法
			echo 'fail';
		}else{
			$this -> load -> model('blog_model');
			$this -> blog_model -> save($title, $author, $content,$blog_id);
			echo "2";
		}
	}
	public function genggai_blog(){
		$title = $this -> input -> post('title');
		$author = $this -> input -> post('author');
		$content = $this -> input -> post('content');
		$blog_id=$this->input->post('blog_id');

		if($title == '' || $author  == '' || $content == ''||$blog_id==''){
			//$this -> contact();//调用方法
			echo 'fail';
		}else{

			$this -> load -> model('blog_model');
			$this->blog_model->delete($blog_id);
			$this -> blog_model -> save($title, $author, $content,$blog_id);
			echo "success";
		}
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */