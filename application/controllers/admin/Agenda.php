<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_Agenda','M_Agenda');
		auth();
	}

	public function index()
	{
		$data = [
			'title' => 'Manage Agenda',
			'contentTitle' => 'Manage Agenda',
			'view' => 'admin/agenda/index',
			'agenda' => $this->M_Agenda->getAll(),
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function create()
	{
		$data = [
			'title' => 'Manage Agenda',
			'contentTitle' => 'Tambah Agenda',
			'view' => 'admin/agenda/create',
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function store()
	{
		$waktu=empty($this->input->post('agenda_waktu')) ? "-" : $this->input->post('agenda_waktu');
		$this->M_Agenda->create([
			'agenda_nama'	 	=> htmlspecialchars($this->input->post('agenda_nama',TRUE)),
			'agenda_mulai' 		=> $this->input->post('agenda_mulai'),
			'agenda_selesai' 	=> $this->input->post('agenda_selesai'),
			'agenda_waktu' 		=> $waktu,
			'agenda_deskripsi' 	=> $this->input->post('agenda_deskripsi',TRUE),
			'agenda_tempat' 	=> htmlspecialchars($this->input->post('agenda_tempat',TRUE)),
			'agenda_keterangan' => htmlspecialchars($this->input->post('agenda_keterangan',TRUE)),
			'agenda_author' 	=> user()->username,
		]);

		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/Agenda');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Manage Agenda',
			'contentTitle' => 'Edit Agenda',
			'view' => 'admin/agenda/edit',
			'agenda' => $this->M_Agenda->getOne($id),
		];

		$this->load->view('layout/backend/content',$data);
	} 

	public function update($id)
	{	
		$this->M_Agenda->update($id,[
			'agenda_nama'	 	=> htmlspecialchars($this->input->post('agenda_nama',TRUE)),
			'agenda_mulai' 		=> $this->input->post('agenda_mulai'),
			'agenda_selesai' 	=> $this->input->post('agenda_selesai'),
			'agenda_waktu' 		=> $waktu,
			'agenda_deskripsi' 	=> $this->input->post('agenda_deskripsi',TRUE),
			'agenda_tempat' 	=> htmlspecialchars($this->input->post('agenda_tempat',TRUE)),
			'agenda_keterangan' => htmlspecialchars($this->input->post('agenda_keterangan',TRUE)),
			'agenda_author' 	=> user()->username,
		]);

		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/Agenda'); 
	}

	public function delete($id)
	{
		$this->M_Agenda->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/Agenda');
	}

	public function truncate()
	{
		$this->db->empty_table("tbl_agenda");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/Agenda');
	}

}

/* End of file Agenda.php */
/* Location: ./application/controllers/admin/Agenda.php */