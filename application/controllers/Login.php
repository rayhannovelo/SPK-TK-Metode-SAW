<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$valid = $this->form_validation;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$valid->set_rules('username','Username','trim|required|xss_clean');
		$valid->set_rules('password','Password','trim|required|xss_clean');
		if($valid->run()) {
			$this->simple_login->login($username,$password);
		}
		$this->load->view('login/login');
	}
	
	public function logout() {
		$this->simple_login->logout();	
	}

	public function register() {
		$this->load->model('m_users');

		$data = array(
			'username' =>  $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 2
		);

		$id_users = $this->m_users->tambah_users($data);

		$data = array(
			'id_users' =>  $id_users,
			'nama' =>  $this->input->post('nama_ortu'),
			'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),
			'umur' =>  $this->input->post('umur'),
			'alamat' =>  $this->input->post('alamat')
		);

		$this->m_users->tambah_orang_tua($data);

		$this->session->set_flashdata('sukses','<div class="alert alert-success text-center">Selamat, Anda berhasil melakukan registrasi! <br> Silahkan Log In untuk masuk ke sistem.</div>');
		redirect('login');
	}
}	