<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Banner extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_banner",$data);
	}
	
	public function getAll()
	{
		return $this->db->get('tbl_banner')->result_array();
	}

	public function getOne($id)
	{
		return $this->db->get_where("tbl_banner",["id_banner" => $id])->row_array();
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_banner",$id);
		return $this->db->update("tbl_banner",$data);
	}

	public function delete($id)
	{
		return $this->db->delete("tbl_banner",["id_banner" => $id]);
	}	

}

/* End of file M_Banner.php */
/* Location: ./application/models/admin/M_Banner.php */