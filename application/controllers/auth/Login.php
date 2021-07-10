<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		guest();
		$this->load->view('auth/login');			
	}

	public function check()
	{	
		$email 		= $this->input->post("email");
		$password 	= $this->input->post("password");
		$user = $this->db->get_where("tbl_user",["email" => $email])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$this->session->set_userdata([
					'id_user' => $user['id_user'],
				]);
				create_log_activity('Login',user()->username);
				redirect('admin/Dashboard');			
			}else{
				$this->session->set_flashdata('error','Password salah');
				redirect('auth/Login');	
			}
		}else{
			$this->session->set_flashdata('error','Email tidak ditemukan');
			redirect('auth/Login');	
		}
	}

	public function out()
	{
		create_log_activity('Logout',user()->username);
		$this->session->sess_destroy();
		redirect('auth/Login');
	}

}