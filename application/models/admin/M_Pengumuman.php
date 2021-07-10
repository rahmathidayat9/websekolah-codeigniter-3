<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengumuman extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_pengumuman",$data);
	}
	
	public function getAll()
	{
		return $this->db->get('tbl_pengumuman')->result_array();
	}

	public function getOne($id)
	{
		return $this->db->get_where("tbl_pengumuman",["id_pengumuman" => $id])->row_array();
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_pengumuman",$id);
		return $this->db->update("tbl_pengumuman",$data);
	}

	public function delete($id)
	{
		return $this->db->delete("tbl_pengumuman",["id_pengumuman" => $id]);
	}	

}

/* End of file M_Pengumuman.php */
/* Location: ./application/models/admin/M_Pengumuman.php */