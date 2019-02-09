<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	/* 
		Level User :
		1. Admin
		2. Orang Tua
	*/

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	// Fungsi login
	public function login($username,$password,$level) {
		$query = $this->CI->db->get_where('users', array('username'=>$username,'password' => md5($password)));
		if($query->num_rows() == 1) {
			$users 	= $this->CI->db->query('SELECT * FROM users where username = "'.$username.'"')->row();
			$this->CI->session->set_userdata('id_users', $users->id_users);
			$this->CI->session->set_userdata('username', $users->username);
			redirect('kriteria');
		}else{                
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-danger text-center">Maaf password/username yang Anda masukkan salah!</div>');
			redirect('login');
		}
	}

	// Proteksi halaman
	public function cek_login($level) {
		if($this->CI->session->userdata('level') != $level) {
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center">Anda Belum Log In!</div>');
			redirect('login');
		}
	}

	public function login_super($level1,$level2) {
		if($this->CI->session->userdata('level') != $level1 && $this->CI->session->userdata('level') != $level2){
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center" align="center">Anda Belum Log In!</div>');
			redirect('login');
		}else{
			return $this->CI->session->userdata('level');
		}
	}

	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('id_users');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('id_orang_tua');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->set_flashdata('sukses','<div class="alert alert-success text-center">Anda Berhasil Log Out!</div>');
		redirect('login');
	}
}