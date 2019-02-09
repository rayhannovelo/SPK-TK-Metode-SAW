<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saw extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// $this->simple_login->cek_login(1);
		$this->load->model('m_tk');
		$this->load->model('m_kriteria');
	}

	public function compose_view($main_view, $data)
	{
		// $this->load->view('karyawan/header', $data);
		$this->load->view($main_view, $data);
		// $this->load->view('karyawan/footer');
	}

	public function index()
	{
		$data['title'] = "Perhitungan SAW";
		$data['tk'] = $this->m_tk->ambil_tk();
		$data['jumlah_tk'] = $this->m_tk->ambil_jumlah_tk();
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria();
		$data['jumlah_kriteria'] = $this->m_kriteria->ambil_jumlah_kriteria();

		foreach ($data['tk'] as $key => $value) {
			$data['nilai'][$key][0] = $this->konversi_status_tk($value['status_tk']);
			$data['nilai'][$key][1] = $this->konversi_jumlah_guru($value['jumlah_guru']);
			$data['nilai'][$key][2] = $this->konversi_jumlah_kelas($value['jumlah_kelas']);
			$data['nilai'][$key][3] = $this->konversi_biaya_pendaftaran($value['biaya_pendaftaran']);
			$data['nilai'][$key][4] = $this->konversi_biaya_spp($value['biaya_spp']);
			$data['nilai'][$key][5] = $this->konversi_akreditasi($value['akreditasi']);
		}
		// $data['active'] = "Nilai Realisasi";

		$this->compose_view('saw', $data);
	}

	public function konversi_status_tk($status_tk) {
		if($status_tk == 'Swasta') {
			return 3;
		}elseif($status_tk == 'Negeri') {
			return 5;
		}else {
			return 0;
		}
	}

	public function konversi_jumlah_guru($jumlah_guru) {
		if($jumlah_guru >= 1 AND $jumlah_guru <= 3) {
			return 1;
		}elseif($jumlah_guru >= 4 AND $jumlah_guru <= 7) {
			return 2;
		}elseif($jumlah_guru >= 8 AND $jumlah_guru <= 11) {
			return 3;
		}elseif($jumlah_guru >= 12 AND $jumlah_guru <= 15) {
			return 4;
		}elseif($jumlah_guru > 15) {
			return 5;
		}else {
			return 0;
		}
	}

	public function konversi_jumlah_kelas($jumlah_kelas) {
		if($jumlah_kelas >= 1 AND $jumlah_kelas <= 2) {
			return 1;
		}elseif($jumlah_kelas >= 3 AND $jumlah_kelas <= 4) {
			return 2;
		}elseif($jumlah_kelas >= 5 AND $jumlah_kelas <= 6) {
			return 3;
		}elseif($jumlah_kelas >= 6 AND $jumlah_kelas <= 7) {
			return 4;
		}elseif($jumlah_kelas > 7) {
			return 5;
		}else {
			return 0;
		}
	}

	public function konversi_biaya_pendaftaran($biaya_pendaftaran) {
		if($biaya_pendaftaran > 2000000) {
			return 1;
		}elseif($biaya_pendaftaran > 1500000 AND $biaya_pendaftaran <= 2000000) {
			return 2;
		}elseif($biaya_pendaftaran > 1000000 AND $biaya_pendaftaran <= 1500000) {
			return 3;
		}elseif($biaya_pendaftaran > 500000 AND $biaya_pendaftaran <= 1000000) {
			return 4;
		}elseif($biaya_pendaftaran <= 500000) {
			return 5;
		}else {
			return 0;
		}
	}

	public function konversi_biaya_spp($biaya_spp) {
		if($biaya_spp > 400000) {
			return 1;
		}elseif($biaya_spp > 300000 AND $biaya_spp <= 400000) {
			return 2;
		}elseif($biaya_spp > 200000 AND $biaya_spp <= 300000) {
			return 3;
		}elseif($biaya_spp > 100000 AND $biaya_spp <= 200000) {
			return 4;
		}elseif($biaya_spp <= 100000) {
			return 5;
		}else {
			return 0;
		}
	}

	public function konversi_akreditasi($akreditasi) {
		if($akreditasi == 'Tidak Terakreditasi') {
			return 1;
		}elseif($akreditasi == 'Belum Diakreditasi') {
			return 2;
		}elseif($akreditasi == 'C') {
			return 3;
		}elseif($akreditasi == 'B') {
			return 4;
		}elseif($akreditasi == 'A') {
			return 5;
		}else {
			return 0;
		}
	}
}
