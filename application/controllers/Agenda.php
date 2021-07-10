<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('M_Home');
	}

	public function index()
	{
		$config['base_url'] 	= site_url('Agenda/index');
		$config['total_rows'] 	= $this->db->count_all("tbl_agenda");
		$config['per_page'] 	= 6;
		$this->pagination->initialize($config);
		
		$data['start'] 				= $this->uri->segment(4);
		$data['title'] 				= 'Agenda';
		$data['all_agenda'] 		= $this->M_Home->get_agenda($config['per_page'],$data['start'])->result_array();
		$data['check_agenda'] 		= count_data("tbl_agenda");

		$this->load->view('layout/frontend/header',$data);
		$this->load->view('layout/frontend/navbar',$data);
		$this->load->view('frontend/agenda',$data);
		$this->load->view('layout/frontend/footer');
	}

	//untuk ditampilkan di modal 
	public function show_agenda($id)
	{
		$data = $this->M_Home->get_agenda_by_id($id)->row_array();
		echo json_encode($data);
	}

}

/* End of file Agenda.php */
/* Location: ./application/controllers/Agenda.php */