<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_Blog','M_Blog');
		auth();
	}

	public function index()
	{
		$data = [
			'title' => 'Manage Blog',
			'view' => 'admin/blog/index',
			'contentTitle' => 'Manage Artikel',
			'blogs' => $this->M_Blog->getAll(),
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function create()
	{
		$data = [
			'title' => 'Manage Blog',
			'contentTitle' => 'Buat Artikel',
			'view' => 'admin/blog/create',
			'kategori_blog' => $this->db->get('tbl_kategori_blog')->result_array(),
		];

		$this->load->view('layout/backend/content',$data);
	}

	public function store()
	{
		$blog_img = upload_img("blog");
		$thumb_img = upload_img("thumb");
		create_thumb('blog/'.$thumb_img,'300','150');

		$this->M_Blog->create([
			'blog_slug' => create_slug(strtolower($this->input->post('blog_title'))),
			'blog_author'	=>	htmlentities($this->input->post('blog_author',TRUE)),
			'blog_title'	=>	htmlentities($this->input->post('blog_title',TRUE)),
			'blog_isi'	=>	$this->input->post('blog_isi',TRUE),
			'blog_img'	=>	$blog_img,
			'blog_thumb' => $thumb_img,
			'blog_kategori_id'	=> $this->input->post('blog_kategori_id'),
			'user_id'	=> user()->id_user,			
		]);
		
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/Blog');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Manage Blog',
			'contentTitle' => 'Edit Artikel',
			'view' => 'admin/blog/edit',
			'kategori_blog' => $this->db->get('tbl_kategori_blog')->result_array(),
			'blog' => $this->M_Blog->getOne($id),
		];

		$this->load->view('layout/backend/content',$data);
	} 

	public function update($id)
	{	
		$this->M_Blog->update($id,[
			'blog_title'	=>	htmlentities($this->input->post('blog_title',TRUE)),
			'blog_isi'	=>	$this->input->post('blog_isi',TRUE),
			'blog_kategori_id'	=> $this->input->post('blog_kategori_id'),
		]);

		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('admin/Blog'); 
	}

	public function delete($id)
	{
		$blog = $this->M_Blog->getOne($id);
		unlink(FCPATH.'./assets/img/blog/'.$blog['blog_img']);
		unlink(FCPATH.'./assets/img/blog/'.$blog['blog_thumb']);
		$this->M_Blog->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/Blog');
	}

	public function truncate()
	{
		foreach ($this->M_Blog->getAll() as $blog) {
			unlink(FCPATH.'./assets/img/blog/'.$blog['blog_img']);
			unlink(FCPATH.'./assets/img/blog/'.$blog['blog_thumb']);
		}
		$this->db->empty_table("tbl_blog");

		$this->session->set_flashdata('success','Data berhasil dikosongkan');
		redirect('admin/Blog');
	}

}

/* End of file Blog.php */
/* Location: ./application/controllers/admin/Blog.php */