<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Blog extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_blog",$data);
	}
	
	public function getAll()
	{
		return $this->db->get('tbl_blog')->result_array();
	}

	public function getOne($id)
	{
		return $this->db->get_where("tbl_blog",["id_blog" => $id])->row_array();
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_blog",$id);
		return $this->db->update("tbl_blog",$data);
	}

	public function delete($id)
	{
		return $this->db->delete("tbl_blog",["id_blog" => $id]);
	}	

}

/* End of file M_Blog.php */
/* Location: ./application/models/admin/M_Blog.php */