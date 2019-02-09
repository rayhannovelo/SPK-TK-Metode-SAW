<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//$this->simple_login->cek_login(1);
		$this->load->model('m_users');
		$this->load->model('m_kuesioner');
		$this->load->model('m_kriteria');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('admin/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('admin/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar Kriteria";
		$data['active'] = "kriteria";
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria();

		$this->compose_view('admin/daftar_kriteria', $data);
	}

	public function edit_kriteria($id_kriteria)
	{
		$data['title'] = "Daftar Kriteria";
		$data['active'] = "kriteria";
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria_byid($id_kriteria);

		$this->compose_view('admin/edit_kriteria', $data);
	}

	public function edit_kriteria_form($id_kriteria)
	{
		$data = array(
			'bobot ' => $this->input->post('bobot')
		);
		$this->m_kriteria->edit_kriteria($id_kriteria, $data);
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Kriteria Berhasil Diperbarui!</div>');
		redirect('kriteria');
	}
}
