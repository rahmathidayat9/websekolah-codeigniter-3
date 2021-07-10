<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('M_Home');
		$this->load->helper('download');
	}

	public function index()
	{
		$config['base_url'] = site_url('Download/index');
		$config['total_rows'] = $this->db->count_all("tbl_file");
		$config['per_page'] = 6;
		$this->pagination->initialize($config);
		///////////////////////////////////////
		$data['start'] = $this->uri->segment(4);
		$data['title'] 			= 'Download';
		$data['all_files'] 		= $this->M_Home->get_file($config['per_page'],$data['start'])->result_array();
		$data['check_files'] 	= count_data("tbl_file");
		########### ============= ##############
		$this->load->view('layout/frontend/header',$data);
		$this->load->view('layout/frontend/navbar',$data);
		$this->load->view('frontend/download',$data);
		$this->load->view('layout/frontend/footer');
	}

	public function download_file($file_name)
	{
		$file = $this->M_Home->get_file_name($file_name);
		if ($file->num_rows()>0) {
			$file=$file->row_array();
			force_download("./asset/download/".$file_name,NULL);
			$this->session->set_flashdata('success', 'File didownload');
			redirect('download');
		}else{
			$this->session->set_flashdata('warning', 'File tidak ditemukan');
			redirect('download');
		}
	}

}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */