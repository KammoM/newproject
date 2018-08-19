<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Blog_m','m');
	}
	
	public function index()
	{
		$this->load->view('registerLayout/header');
		$this->load->view('register');
		$this->load->view('registerLayout/footer');
	}
	public function insert()
	{
	 	$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('name','Name', 'required');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('email','Email Address','required|valid_email]');
		$this->form_validation->set_rules('phone','Phone', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$errors = validation_errors();
			//echo json_encode(['error'=>$errors]);
			echo json_encode(array("status"=>"errors","message"=>$errors));
		} 
		else 
		{
			$data['name']=$this->input->post('name');
  			$data['password']=$this->input->post('password');
  			$data['email']=$this->input->post('email');
  			$data['phone']=$this->input->post('phone');
  			$result=$this->m->register($data);
			//$errors= "record insert successfully";
			echo json_encode(array("status"=>"success","message"=>"record insert successfully"));
			//echo json_encode(['error'=>$errors]);
		}
	}
		
}