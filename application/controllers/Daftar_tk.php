<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_tk extends CI_Controller {

	public function __construct() {
		parent::__construct();

		//$this->simple_login->cek_login(1);
		$this->load->model('m_tk');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('admin/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('admin/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar TK";
		$data['active'] = "daftar_tk";
		$data['daftar_tk'] = $this->m_tk->ambil_tk();

		$this->compose_view('admin/daftar_tk', $data);
	}

	public function tambah_tk()
	{
		$data['title'] = "Form Tambah TK";
		$data['active'] = "daftar_tk";

		$this->compose_view('admin/tambah_tk', $data);
	}

	public function tambah_tk_form() {
		$data = array(
			'npsn' => $this->input->post('npsn'),
			'nama_tk' => $this->input->post('nama_tk'),
			'kecamatan' => $this->input->post('kecamatan'),
		);

		$nilai = array(
			'status_tk' => $this->input->post('status_tk'),
			'jumlah_guru' => $this->input->post('jumlah_guru'),
			'jumlah_kelas' => $this->input->post('jumlah_kelas'),
			'biaya_pendaftaran' => $this->input->post('biaya_pendaftaran'),
			'biaya_spp' => $this->input->post('biaya_spp'),
			'akreditasi' => $this->input->post('akreditasi'),
			'jarak' => $this->input->post('jarak')
		);

		$this->m_tk->tambah_tk($data, $nilai);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data TK Berhasil Ditambahkan!</div>');

		redirect('daftar_tk');
	}

	public function edit_tk($id_tk)
	{
		$data['title'] = "Form Edit TK";
		$data['active'] = "daftar_tk";
		$data['tk'] = $this->m_tk->ambil_tk_byid($id_tk);

		$this->compose_view('admin/edit_tk', $data);
	}

	public function edit_tk_form($id_tk) {
		$data = array(
			'npsn' => $this->input->post('npsn'),
			'nama_tk' => $this->input->post('nama_tk'),
			'kecamatan' => $this->input->post('kecamatan'),
		);

		$nilai = array(
			'status_tk' => $this->input->post('status_tk'),
			'jumlah_guru' => $this->input->post('jumlah_guru'),
			'jumlah_kelas' => $this->input->post('jumlah_kelas'),
			'biaya_pendaftaran' => $this->input->post('biaya_pendaftaran'),
			'biaya_spp' => $this->input->post('biaya_spp'),
			'akreditasi' => $this->input->post('akreditasi'),
			'jarak' => $this->input->post('jarak')
		);

		$this->m_tk->edit_tk($id_tk, $data, $nilai);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data TK Berhasil Ditambahkan!</div>');

		redirect('daftar_tk');
	}

	public function hapus_tk($id_tk)
	{
		$this->m_tk->hapus_tk($id_tk);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data TK Berhasil Diperbarui!</div>');

		redirect('daftar_tk');
	}
}
