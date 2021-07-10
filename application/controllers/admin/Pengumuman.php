<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_Pengumuman','M_Pengumuman');
		auth();
	}

	public function index()
	{
		$data = [
			'title' => 'Manage Pengumuman',
			'contentTitle' => 'Manage Pengumuman',
			'view' => 'admin/pengumuman/index',
			'pengumuman' => $this->M_Pengumuman->getAll(),
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function create()
	{
		$data = [
			'title' => 'Manage Pengumuman',
			'contentTitle' => 'Tambah Pengumuman',
			'view' => 'admin/pengumuman/create',
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function store()
	{
		$this->M_Pengumuman->create([
			'pengumuman_nama'	 	=> htmlspecialchars($this->input->post('pengumuman_nama',TRUE)),
			'pengumuman_deskripsi' 	=> $this->input->post('pengumuman_deskripsi',TRUE),
		]);

		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/Pengumuman');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Manage Pengumuman',
			'contentTitle' => 'Edit Pengumuman',
			'view' => 'admin/pengumuman/edit',
			'pengumuman' => $this->M_Pengumuman->getOne($id),
		];

		$this->load->view('layout/backend/content',$data);
	} 

	public function update($id)
	{	
		$this->M_Pengumuman->update($id,[
			'pengumuman_nama'	 	=> htmlspecialchars($this->input->post('pengumuman_nama',TRUE)),
			'pengumuman_deskripsi' 	=> $this->input->post('pengumuman_deskripsi',TRUE),
		]);

		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/Pengumuman'); 
	}

	public function delete($id)
	{
		$this->M_Pengumuman->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/Pengumuman');
	}

	public function truncate()
	{
		$this->db->empty_table("tbl_pengumuman");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/Pengumuman');
	}

}

/* End of file Pengumuman.php */
/* Location: ./application/controllers/admin/Pengumuman.php */