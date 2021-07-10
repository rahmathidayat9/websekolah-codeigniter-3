<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		auth();
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'contentTitle' => 'Dashboard',
			'view' => 'admin/dashboard',
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function truncate_log_activity()
	{
		$this->db->empty_table('tbl_log_activity');
		$this->session->set_flashdata('success', 'Log Activity dibersihkan');
		redirect('admin/Dashboard');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */