<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(2);
		$this->load->model('m_users');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('orang_tua/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('orang_tua/footer');
	}

	public function index()
	{
		$data['title'] = "Profil";
		$data['active'] = "Profil";
		$data['profil'] = $this->m_users->ambil_profil_orang_tua($this->session->userdata('id_users'));

		$this->compose_view('orang_tua/profil_orang_tua', $data);
	}

	public function edit_profil()
	{
		$data['title'] = "Edit Profil";
		$data['active'] = "Profil";
		$data['profil'] = $this->m_users->ambil_profil_orang_tua($this->session->userdata('id_users'));

		$this->compose_view('orang_tua/edit_profil', $data);
	}

	public function edit_profil_form() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->cek_password($this->input->post('password'))
		);

		$this->m_users->edit_users($this->session->userdata('id_users'), $data);

		$data = array(
			'nama' =>  $this->input->post('nama'),
			'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),
			'umur' =>  $this->input->post('umur'),
			'alamat' =>  $this->input->post('alamat')
		);

		$this->m_users->edit_orang_tua($this->session->userdata('id_orang_tua'), $data);
		$this->session->set_userdata('nama', $this->input->post('nama'));
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Profil Berhasil Diperbarui!</div>');

		redirect('profil');
	}

	public function cek_password($password) {
		if($this->m_users->ambil_password($this->session->userdata('id_users')) == $password) {
			return $password;
		}else {
			return md5($password);
		}
	}
}
