<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Agenda extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_agenda",$data);
	}
	
	public function getAll()
	{
		return $this->db->get('tbl_agenda')->result_array();
	}

	public function getOne($id)
	{
		return $this->db->get_where("tbl_agenda",["id_agenda" => $id])->row_array();
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_agenda",$id);
		return $this->db->update("tbl_agenda",$data);
	}

	public function delete($id)
	{
		return $this->db->delete("tbl_agenda",["id_agenda" => $id]);
	}	

}

/* End of file M_Agenda.php */
/* Location: ./application/models/admin/M_Agenda.php */