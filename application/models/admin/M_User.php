<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_user",$data);
	}
	
	public function getAll()
	{
		return $this->db->get('tbl_user')->result_array();
	}

	public function getOne($id)
	{
		return $this->db->get_where("tbl_user",["id_user" => $id])->row_array();
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_user",$id);
		return $this->db->update("tbl_user",$data);
	}

	public function delete($id)
	{
		return $this->db->delete("tbl_user",["id_user" => $id]);
	}	

}

/* End of file M_User.php */
/* Location: ./application/models/admin/M_User.php */