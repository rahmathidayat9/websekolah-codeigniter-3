<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_User','M_User');
		auth();
	}

	public function index()
	{
		$data = [
			'title' => 'Manage User',
			'contentTitle' => 'Manage User',
			'view' => 'admin/user/index',
			'users' => $this->M_User->getAll(),
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function create()
	{
		$data = [
			'title' => 'Manage User',
			'contentTitle' => 'Buat User',
			'view' => 'admin/user/create',
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function store()
	{
		$this->M_User->create([
			'username' 	=> htmlentities($this->input->post('username',TRUE)),
			'email' 	=> htmlentities($this->input->post('email',TRUE)),
			'password' 	=> password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
		]);
		
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/User');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Manage User',
			'contentTitle' => 'Edit User',
			'view' => 'admin/user/edit',
			'user' => $this->M_User->getOne($id),
		];

		$this->load->view('layout/backend/content',$data);
	} 

	public function update($id)
	{	
		if (!empty($this->input->post('newpassword'))) {
			$password = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
		}else{
			$password = $this->input->post('oldpassword');
		}
		
		$data = [
			'username' 	=> htmlentities($this->input->post('username')),
			'password' 	=> $password,
		]; 

		$this->M_User->update($id,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/User'); 
	}

	public function delete($id)
	{
		$this->M_User->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/User');
	}

	public function truncate()
	{
		$this->db->empty_table("tbl_user");
		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/User');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */