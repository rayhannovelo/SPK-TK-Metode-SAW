<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_kuesioner extends CI_Controller {

	public function __construct() {
		parent::__construct();

		//$this->simple_login->cek_login(1);
		$this->load->model('m_kuesioner');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('admin/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('admin/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar Kuesioner";
		$data['active'] = "daftar_kuesioner";
		$data['daftar_kuesioner'] = $this->m_kuesioner->ambil_daftar_kuesioner();

		$this->compose_view('admin/daftar_kuesioner', $data);
	}

	public function detail_kuesioner($id_daftar_kuesioner)
	{
		$data['title'] = "Detail Kuesioner";
		$data['active'] = "daftar_kuesioner";
		$data['item_kuesioner'] = $this->m_kuesioner->ambil_item_kuesioner($id_daftar_kuesioner);
		$data['daftar_kuesioner'] = $this->m_kuesioner->ambil_daftar_kuesioner_byid($id_daftar_kuesioner);

		$this->compose_view('admin/detail_kuesioner', $data);
	}

	public function hapus_kuesioner($id_daftar_kuesioner)
	{
		$this->m_kuesioner->hapus_daftar_kuesioner($id_daftar_kuesioner);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Kuesioner Berhasil Diperbarui!</div>');

		redirect('daftar_kuesioner');
	}
}
