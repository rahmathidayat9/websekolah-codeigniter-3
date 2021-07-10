<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_Password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_User','M_User');
		auth();
	}

	public function index()
	{
		$data = [
			'title' => 'Ubah Password',
			'contentTitle' => 'Ubah Password',
			'view' => 'admin/change-password',
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function update()
	{
		$this->M_User->update(user()->id_user,[
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		]);

		create_log_activity('Update Password',user()->username);

		$this->session->set_flashdata('success', 'Password berhasil diupdate');
		redirect('admin/Change_Password');
	}

}

/* End of file Change_Password.php */
/* Location: ./application/controllers/admin/Change_Password.php */