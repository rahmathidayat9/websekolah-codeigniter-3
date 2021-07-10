<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_User','M_User');
		auth();
	}

	public function index()
	{
		$data = [
			'title' => 'Profile',
			'contentTitle' => 'Profile',
			'view' => 'admin/profile',
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function update()
	{
		$this->M_User->update(user()->id_user,[
			'username' => htmlentities($this->input->post('username', TRUE)),
		]);

		create_log_activity('Update Profile',user()->username);

		$this->session->set_flashdata('success', 'Profil berhasil diupdate');
		redirect('admin/Profile');
	}	

}

/* End of file Profile.php */
/* Location: ./application/controllers/admin/Profile.php */