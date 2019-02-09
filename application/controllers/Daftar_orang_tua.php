<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_orang_tua extends CI_Controller {

	public function __construct() {
		parent::__construct();

		//$this->simple_login->cek_login(1);
		$this->load->model('m_users');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('admin/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('admin/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar Orang Tua";
		$data['active'] = "daftar_orang_tua";
		$data['daftar_orang_tua'] = $this->m_users->ambil_profil_orang_tua();

		$this->compose_view('admin/daftar_orang_tua', $data);
	}

	public function hapus_orang_tua($id_users)
	{
		$this->m_users->hapus_users($id_users);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Orang Tua Berhasil Dihapus!</div>');

		redirect('daftar_orang_tua');
	}
}
