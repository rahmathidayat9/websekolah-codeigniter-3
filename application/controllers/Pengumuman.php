<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('M_Home');
	}

	public function index()
	{
		$config['base_url'] 	= site_url('Pengumuman/index');
		$config['total_rows'] 	= $this->db->count_all("tbl_pengumuman");
		$config['per_page'] 	= 6;
		$this->pagination->initialize($config);
		//
		$data['start'] 				= $this->uri->segment(4);
		$data['title'] 			 	= 'Pengumuman';
		$data['pengumuman']		 	=	$this->M_Home->get_pengumuman($config['per_page'],$data['start'])->result_array();
		########### ============= ##############
		$this->load->view('layout/frontend/header',$data);
		$this->load->view('layout/frontend/navbar',$data);
		$this->load->view('frontend/pengumuman',$data);
		$this->load->view('layout/frontend/footer');
	}

	//untuk ditampilkan di modal 
	public function show_pengumuman($id)
	{
		$data = $this->M_Home->get_pengumuman_by_id($id)->row_array();
		echo json_encode($data);
	}

}

/* End of file Pengumuman.php */
/* Location: ./application/controllers/Pengumuman.php */