<?php 

// ambil banner untuk halaman home
function set_banner()
{	
	$CI =& get_instance();
	$banner = $CI->db->get_where('tbl_banner',['is_active' => 1]);
	if ($banner->num_rows() > 0) {
		return $banner->row();
	}else{
		return "";
	}
}


// redirect jika belum login
function auth()
{
	$CI =& get_instance();
	if (!$CI->session->userdata('id_user')) {
		redirect('auth/Login');
	}else{
		return TRUE;
	}
}

// redirect jika sudah login
function guest()
{
	$CI =& get_instance();
	if ($CI->session->userdata('id_user')) {
		redirect('admin/Dashboard');
	}else{
		return TRUE;
	}
}

// ambil user data yang sedang login
function user()
{
	$CI =& get_instance();
	$user = $CI->db->get_where('tbl_user',[
		'id_user' => $CI->session->userdata('id_user'),
	])->row();
	return $user;
}

// buat log activity
function create_log_activity($name,$user)
{
	$CI =& get_instance();
	$CI->db->insert('tbl_log_activity',[
		'log_activity_name' => $name,
		'log_activity_user' => $user,
	]);
}

// ambil semua log activity
function get_all_log_activity()
{
	$CI =& get_instance();
	return $CI->db->order_by('created_at','DESC')->get('tbl_log_activity')->result_array();
}

function get_csrf()
{
	$ci = get_instance();		
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" value="'.$ci->security->get_csrf_hash().'">';
}

//validasi pesan di halaman contact
function contact_validation()
{
	$ci = get_instance();
	$ci->form_validation->set_rules('nama','Nama','required|min_length[2]|max_length[15]',[
		'required' => 'nama harus diisi',
		'min_length' => 'nama terlalu pendek',
		'max_length' => 'nama terlalu panjang'
	]);
	$ci->form_validation->set_rules('email','Email','required|valid_email',[
		'required' => 'email harus diisi',
		'valid_email' => 'email tidak valid'
	]);
	$ci->form_validation->set_rules('isi','Isi','required|min_length[5]|max_length[700]',[
		'required' => 'isi pesan harus diisi',
		'min_length' => 'pesan terlalu pendek',
		'max_length' => 'pesan terlalu panjang'
	]);
}

function comment_validation()
{
	$ci = get_instance();
	$ci->form_validation->set_rules('komentar_nama','Nama','required|min_length[2]|max_length[15]',[
		'required' => 'nama harus diisi',
		'min_length' => 'nama terlalu pendek',
		'max_length' => 'nama terlalu panjang'
	]);
	$ci->form_validation->set_rules('komentar_isi','Isi','required|min_length[4]',[
		'required' => 'komentar harus diisi',
		'min_length' => 'komentar terlalu pendek'
	]);
}

function reply_comment_validation()
{
	$ci = get_instance();
	$ci->form_validation->set_rules('balasan_nama','Nama','required|min_length[2]|max_length[15]',[
		'required' => 'nama harus diisi',
		'min_length' => 'nama terlalu pendek',
		'max_length' => 'nama terlalu panjang'
	]);
	$ci->form_validation->set_rules('balasan_isi','Isi','required|min_length[4]',[
		'required' => 'komentar harus diisi',
		'min_length' => 'komentar terlalu pendek'
	]);
}

function count_data($table)
{
	$ci = get_instance();
	return $ci->db->count_all($table);
}

function create_slug($str)
{
	$illegal_string=[" ","?","!","(",")","^","$","#","@","{","}","+","[","]","/","'\'",
					"<",">",";",":","|","'",'"',",","`","*","%"];
	return str_replace($illegal_string,"-",$str);
}

function upload_img($upload_path)
{
	$CI =& get_instance();

	$config['upload_path'] 	= './assets/img/'.$upload_path;
	$config['allowed_types'] = 'png|jpg|jpeg|jfif|gif';
	$config['detect_mime'] = TRUE;
	$config['mod_mime_fix'] = TRUE;
	$config['encrypt_name'] = TRUE;
	$CI->load->library('upload',$config);
	if ($CI->upload->do_upload('file')) {
		return $CI->upload->data('file_name');
	}else{
		echo $CI->upload->display_errors();
	}	
}

function resize_image($path=NULL,$width=NULL,$height=NULL,$new_image=NULL)
{
	$CI =& get_instance();

	$config['image_library'] = 'gd2';
	$config['source_image']  = './assets/img/'.$path;
	// $config['create_thumb']	 = FALSE;
	$config['maintain_ratio'] = FALSE;
	$config['width'] 		=	$width; 
	$config['height'] 		=	$height;
	$config['quality'] 		= 	'100%';
	$CI->load->library('image_lib',$config);
	$CI->image_lib->resize();
}

function create_thumb($path=NULL,$width=NULL,$height=NULL)
{
	$CI =& get_instance();

	$config['image_library'] 	= 	'gd2';
	$config['source_image']  	= 	'./assets/img/'.$path;
	// $config['create_thumb']	= 	FALSE;
	$config['maintain_ratio'] 	= 	FALSE;
	$config['width'] 			=	$width; 
	$config['height'] 			=	$height;
	$config['quality'] 			= 	'100%';
	$config['new_image'] 		= 	'./assets/img/'.$path;
	$CI->load->library('image_lib',$config);
	$CI->image_lib->resize();
}

function upload_file($path=NULL,$allowed_types=NULL)
{
	$CI =& get_instance();

	$config['upload_path'] 		= './assets/'.$path;
	$config['allowed_types'] 	= $allowed_types;
	$config['detect_mime'] 		= TRUE;
	$config['mod_mime_fix'] 	= TRUE;
	$CI->load->library('upload', $config);
	if ($CI->upload->do_upload('file')) {
		return $CI->upload->data('file_name');
	}else{
		echo $CI->upload->display_errors();
	}
}