<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Blog_m','m');
	}
	
	public function index()
	{
		$data['data']=$this->m->getblog();
		$this->load->view('layout/header');
		$this->load->view('blog/index',$data);
		$this->load->view('layout/footer');
	}
	
	public function add()
	{
		$this->load->view('layout/header');
		$this->load->view('blog/add');
		$this->load->view('layout/footer');
	}
	
	public function submit()
	{
		$result=$this->m->submit();
		if($result)
		{
			$this->session->set_flashdata('success_msg','record added successfully');
		}
		else
		{
			$this->session->set_flashdata('error_msg','Failed to add record ');
		}
		redirect(base_url('blog/index'));
	}
	
	public function edit($id)
	{
		$data['blog'] = $this->m->getblogById($id);
		$this->load->view('layout/header');
		$this->load->view('blog/edit',$data);
		$this->load->view('layout/footer');
	}
	
	public function update()
	{
		$result=$this->m->update();
		if($result)
		{
			$this->session->set_flashdata('success_msg','record update successfully');
		}
		else
		{
			$this->session->set_flashdata('error_msg','Failed to update record ');
		}
		redirect(base_url('blog/index'));
	}
	
	public function delete($id)
	{
		$result=$this->m->delete($id);
		if($result)
		{
			$this->session->set_flashdata('success_msg','record delete successfully');
		}
		else
		{
			$this->session->set_flashdata('error_msg','Failed to delete record ');
		}
		redirect(base_url('blog/index'));
	}
	
}