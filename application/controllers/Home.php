<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Home');
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['all_jurusan'] 		= $this->M_Home->get_info_jurusan();
		$data['new_pengumuman'] 	= $this->db->order_by('created_at','DESC')->get('tbl_pengumuman',3)->result_array();
		$data['new_agenda']			=	$this->db->query("SELECT * FROM tbl_agenda WHERE created_at <= agenda_mulai ORDER BY created_at DESC LIMIT 0,3")->result_array();
		$data['new_blogs']			=	$this->db->order_by('created_at','DESC')->get('tbl_blog',2)->result_array();
		$data['check_agenda'] 		= count_data("tbl_agenda");
		$data['check_jurusan'] 		= count_data("tbl_jurusan");
		$data['check_pengumuman'] 	= count_data("tbl_pengumuman");
		$data['check_blog']			= count_data("tbl_blog");

		$this->load->view('layout/frontend/header',$data);
		$this->load->view('layout/frontend/navbar',$data);
		$this->load->view('frontend/home/index',$data);
		$this->load->view('layout/frontend/footer');
	}

	public function about()
	{
		$data['title'] = 'About';

		$this->load->view('layout/frontend/header',$data);
		$this->load->view('layout/frontend/navbar',$data);
		$this->load->view('frontend/home/about');
		$this->load->view('layout/frontend/footer');	
	}

	public function contact()
	{	
		$data['title'] = 'Contact';
		$this->load->view('layout/frontend/header',$data);
		$this->load->view('layout/frontend/navbar',$data);
		$this->load->view('frontend/home/contact');
		$this->load->view('layout/frontend/footer');	
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
