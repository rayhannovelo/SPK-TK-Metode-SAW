<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(2);
		$this->load->model('m_users');
		$this->load->model('m_kuesioner');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('orang_tua/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('orang_tua/footer');
	}

	public function index()
	{
		$data['title'] = "Kuesioner";
		$data['active'] = "kuesioner";
		$data['kuesioner'] = $this->m_kuesioner->ambil_kuesioner();

		$this->compose_view('orang_tua/kuesioner', $data);
	}

	public function tambah_kuesioner_form() {
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'id_orang_tua' => $this->session->userdata('id_orang_tua'),
			'waktu_kirim' => date('Y-m-d H:i:s'),
		);

		$id_daftar_kuesioner = $this->m_kuesioner->tambah_daftar_kuesioner($data);

		foreach($this->input->post('id_kuesioner[]') as $key1 => $id_kuesioner) {
			foreach($this->input->post('jawaban[]') as $key2 => $jawaban) {
				if($key1 == $key2) {
					$data = array(
						'id_daftar_kuesioner' => $id_daftar_kuesioner,
						'id_kuesioner' => $id_kuesioner,
						'jawaban' => $jawaban
					);
					$this->m_kuesioner->tambah_item_kuesioner($data);
				}
			}
		}
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Kuesioner Berhasil Dikirim!</div>');

		redirect('kuesioner');
	}
}
