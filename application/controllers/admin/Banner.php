<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_Banner','M_Banner');
		auth();
	}

	public function index()
	{
		$data = [
			'title' => 'Manage Banner',
			'contentTitle' => 'Manage Banner',
			'view' => 'admin/banner/index',
			'banners' => $this->M_Banner->getAll(),
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function create()
	{
		$data = [
			'title' => 'Manage Banner',
			'contentTitle' => 'Tambah Banner',
			'view' => 'admin/banner/create',
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function store()
	{
		$this->M_Banner->create([
			'banner_image' => upload_img("banner"),
			'banner_title'	=>	$this->input->post('banner_title'),
			'banner_subtitle'	=>	$this->input->post('banner_subtitle'),
			'is_active' => 0,
		]);

		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/Banner');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Manage Banner',
			'contentTitle' => 'Edit Banner',
			'view' => 'admin/banner/edit',
			'banner' => $this->M_Banner->getOne($id),
		];

		$this->load->view('layout/backend/content',$data);
	} 

	public function update($id)
	{	
		$this->M_Banner->update($id,[
			'banner_title'	=>	$this->input->post('banner_title'),
			'banner_subtitle'	=>	$this->input->post('banner_subtitle'),
		]);

		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/Banner'); 
	}

	public function handle($id)
	{
		$banner = $this->M_Banner->getOne($id);
		if ($banner['is_active'] == 0) {
			$this->db->update('tbl_banner',[
				'is_active' => 0,
			]);
			$this->M_Banner->update($id,[
				'is_active' => 1,
			]);
			$this->session->set_flashdata('success','Banner diaktifkan');
			redirect('admin/Banner');
		}else{
			$this->M_Banner->update($id,[
				'is_active' => 0,
			]);
			$this->session->set_flashdata('success','Banner dinonaktifkan');
			redirect('admin/Banner');
		}
	}

	public function delete($id)
	{
		$banner = $this->M_Banner->getOne($id);
		unlink(FCPATH.'./assets/img/banner/'.$banner['banner_image']);
		$this->M_Banner->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/Banner');
	}

	public function truncate()
	{
		foreach ($this->M_Banner->getAll() as $banner) {
			unlink(FCPATH.'./assets/img/banner/'.$banner['banner_image']);

		}
		$this->db->empty_table("tbl_banner");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/Banner');
	}

}

/* End of file Banner.php */
/* Location: ./application/controllers/admin/Banner.php */