<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_m extends CI_Model 
{
	public function getblog()
	{
		$query=$this->db->get('blog');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	
	public function submit()
	{
		$field=array(
			'title'=>$this->input->post('txt_title'),
			'discription'=>$this->input->post('txt_discription'),
			'created_at'=>date('Y-m-d')
		);
		$this->db->insert('blog',$field);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{ 
			return false;
		}
	}
	
	public function getblogById($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('blog');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	
	public function update()
	{
		$id=$this->input->post('txt_hidden');
		$field=array(
			'title'=>$this->input->post('txt_title'),
			'discription'=>$this->input->post('txt_discription'),
			'created_at'=>date('Y-m-d')
		);
		$this->db->where('id',$id);
		$this->db->update('blog',$field);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('blog');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function register($data)
	{
		$this->db->insert('register',$data);
	}
	
}