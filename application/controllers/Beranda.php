<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_tk');
		$this->load->model('m_kriteria');
	}

	/* public function insert() {
		for ($i=1; $i <= 80 ; $i++) { 
			$data = array(
				'id_tk' => $i,
				'id_kriteria' => 7,
				'nilai' => rand(1,15),
			);
			$this->db->insert('nilai_evaluasi', $data);
		}
	} */

	public function compose_view($main_view, $data)
	{
		$this->load->view('orang_tua/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('orang_tua/footer');
	}

	public function index()
	{
		$data['kecamatan'] = $this->m_tk->ambil_kecamatan_tk();
		$data['jumlah_seluruh_tk'] = $this->m_tk->ambil_jumlah_tk();

		$this->load->view('beranda/beranda', $data);
	}

	public function kecamatan()
	{
		$data['kecamatan'] = $this->m_tk->ambil_kecamatan_tk();
		$data['jumlah_seluruh_tk'] = $this->m_tk->ambil_jumlah_tk();

		$this->load->view('beranda/kecamatan', $data);
	}

	public function panduan()
	{
		$this->load->view('beranda/panduan');
	}

	public function pengaturan_kriteria($kecamatan) {
		$data['kecamatan'] = urldecode($kecamatan);

		$this->load->view('beranda/pengaturan_kriteria', $data);
	}

	public function hasil_rekomendasi($kecamatan) {
		$kecamatan = urldecode($kecamatan);
		$data['kecamatan'] = $kecamatan;
		$data['nama_kecamatan'] = 'Kecamatan '.$kecamatan;
		$data['tk'] = $this->m_tk->ambil_tk_kecamatan($kecamatan);
		$data['jumlah_tk'] = $this->m_tk->ambil_jumlah_tk_kecamatan($kecamatan);
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria();
		$data['jumlah_kriteria'] = $this->m_kriteria->ambil_jumlah_kriteria();

		foreach ($data['tk'] as $key => $value) {
			$data['nilai'][$key][0] = $this->konversi_status_tk($value['status_tk'], $this->input->post('status_tk'));
			$data['nilai'][$key][1] = $this->konversi_jumlah_guru($value['jumlah_guru'], $this->input->post('jumlah_guru'));
			$data['nilai'][$key][2] = $this->konversi_jumlah_kelas($value['jumlah_kelas'], $this->input->post('jumlah_kelas'));
			$data['nilai'][$key][3] = $this->konversi_biaya_pendaftaran($value['biaya_pendaftaran'], $this->input->post('biaya_pendaftaran'));
			$data['nilai'][$key][4] = $this->konversi_biaya_spp($value['biaya_spp'], $this->input->post('biaya_spp'));
			$data['nilai'][$key][5] = $this->konversi_akreditasi($value['akreditasi'], $this->input->post('akreditasi'));
			$data['nilai'][$key][6] = $this->konversi_jarak($value['jarak'], $this->input->post('jarak'));
		}

		$this->load->view('beranda/hasil_rekomendasi', $data);
	}

	public function konversi_status_tk($status_tk, $id) {
		switch ($id) {
			case 1:
				if($status_tk == 'Negeri') {
					return 5;
				}elseif($status_tk == 'Swasta') {
					return 3;
				}
				break;
			case 2:
				if($status_tk == 'Negeri') {
					return 3;
				}elseif($status_tk == 'Swasta') {
					return 5;
				}
				break;
			default:
				return 0;
				break;
		}
	}

	public function konversi_jumlah_guru($jumlah_guru, $id) {
		switch ($id) {
			case 1:
				if($jumlah_guru >= 1 AND $jumlah_guru <= 3) {
					return 5;
				}elseif($jumlah_guru >= 4 AND $jumlah_guru <= 7) {
					return 4;
				}elseif($jumlah_guru >= 8 AND $jumlah_guru <= 11) {
					return 3;
				}elseif($jumlah_guru >= 12 AND $jumlah_guru <= 15) {
					return 2;
				}elseif($jumlah_guru > 15) {
					return 1;
				}
				break;
			case 2:
				if($jumlah_guru >= 1 AND $jumlah_guru <= 3) {
					return 3;
				}elseif($jumlah_guru >= 4 AND $jumlah_guru <= 7) {
					return 5;
				}elseif($jumlah_guru >= 8 AND $jumlah_guru <= 11) {
					return 4;
				}elseif($jumlah_guru >= 12 AND $jumlah_guru <= 15) {
					return 2;
				}elseif($jumlah_guru > 15) {
					return 1;
				}
				break;
			case 3:
				if($jumlah_guru >= 1 AND $jumlah_guru <= 3) {
					return 1;
				}elseif($jumlah_guru >= 4 AND $jumlah_guru <= 7) {
					return 3;
				}elseif($jumlah_guru >= 8 AND $jumlah_guru <= 11) {
					return 5;
				}elseif($jumlah_guru >= 12 AND $jumlah_guru <= 15) {
					return 4;
				}elseif($jumlah_guru > 15) {
					return 2;
				}
				break;
			case 4:
				if($jumlah_guru >= 1 AND $jumlah_guru <= 3) {
					return 1;
				}elseif($jumlah_guru >= 4 AND $jumlah_guru <= 7) {
					return 2;
				}elseif($jumlah_guru >= 8 AND $jumlah_guru <= 11) {
					return 3;
				}elseif($jumlah_guru >= 12 AND $jumlah_guru <= 15) {
					return 5;
				}elseif($jumlah_guru > 15) {
					return 4;
				}
				break;
			case 5:
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
				}
				break;
			default:
				return 0;
				break;
		}
	}

	public function konversi_jumlah_kelas($jumlah_kelas, $id) {
		switch ($id) {
			case 1:
				if($jumlah_kelas >= 1 AND $jumlah_kelas <= 2) {
					return 5;
				}elseif($jumlah_kelas >= 3 AND $jumlah_kelas <= 4) {
					return 4;
				}elseif($jumlah_kelas >= 5 AND $jumlah_kelas <= 6) {
					return 3;
				}elseif($jumlah_kelas >= 6 AND $jumlah_kelas <= 7) {
					return 2;
				}elseif($jumlah_kelas > 7) {
					return 1;
				}
				break;
			case 2:
				if($jumlah_kelas >= 1 AND $jumlah_kelas <= 2) {
					return 3;
				}elseif($jumlah_kelas >= 3 AND $jumlah_kelas <= 4) {
					return 5;
				}elseif($jumlah_kelas >= 5 AND $jumlah_kelas <= 6) {
					return 4;
				}elseif($jumlah_kelas >= 6 AND $jumlah_kelas <= 7) {
					return 2;
				}elseif($jumlah_kelas > 7) {
					return 1;
				}
				break;
			case 3:
				if($jumlah_kelas >= 1 AND $jumlah_kelas <= 2) {
					return 1;
				}elseif($jumlah_kelas >= 3 AND $jumlah_kelas <= 4) {
					return 3;
				}elseif($jumlah_kelas >= 5 AND $jumlah_kelas <= 6) {
					return 5;
				}elseif($jumlah_kelas >= 6 AND $jumlah_kelas <= 7) {
					return 4;
				}elseif($jumlah_kelas > 7) {
					return 2;
				}
				break;
			case 4:
				if($jumlah_kelas >= 1 AND $jumlah_kelas <= 2) {
					return 1;
				}elseif($jumlah_kelas >= 3 AND $jumlah_kelas <= 4) {
					return 2;
				}elseif($jumlah_kelas >= 5 AND $jumlah_kelas <= 6) {
					return 3;
				}elseif($jumlah_kelas >= 6 AND $jumlah_kelas <= 7) {
					return 5;
				}elseif($jumlah_kelas > 7) {
					return 4;
				}
				break;
			case 5:
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
				}
				break;
			default:
				return 0;
				break;
		}
	}

	public function konversi_biaya_pendaftaran($biaya_pendaftaran, $id) {
		switch ($id) {
			case 1:
				if($biaya_pendaftaran > 2000000) {
					return 5;
				}elseif($biaya_pendaftaran > 1500000 AND $biaya_pendaftaran <= 2000000) {
					return 4;
				}elseif($biaya_pendaftaran > 1000000 AND $biaya_pendaftaran <= 1500000) {
					return 3;
				}elseif($biaya_pendaftaran > 500000 AND $biaya_pendaftaran <= 1000000) {
					return 2;
				}elseif($biaya_pendaftaran <= 500000) {
					return 1;
				}
				break;
			case 2:
				if($biaya_pendaftaran > 2000000) {
					return 3;
				}elseif($biaya_pendaftaran > 1500000 AND $biaya_pendaftaran <= 2000000) {
					return 5;
				}elseif($biaya_pendaftaran > 1000000 AND $biaya_pendaftaran <= 1500000) {
					return 4;
				}elseif($biaya_pendaftaran > 500000 AND $biaya_pendaftaran <= 1000000) {
					return 2;
				}elseif($biaya_pendaftaran <= 500000) {
					return 1;
				}
				break;
			case 3:
				if($biaya_pendaftaran > 2000000) {
					return 1;
				}elseif($biaya_pendaftaran > 1500000 AND $biaya_pendaftaran <= 2000000) {
					return 3;
				}elseif($biaya_pendaftaran > 1000000 AND $biaya_pendaftaran <= 1500000) {
					return 5;
				}elseif($biaya_pendaftaran > 500000 AND $biaya_pendaftaran <= 1000000) {
					return 4;
				}elseif($biaya_pendaftaran <= 500000) {
					return 2;
				}
				break;
			case 4:
				if($biaya_pendaftaran > 2000000) {
					return 1;
				}elseif($biaya_pendaftaran > 1500000 AND $biaya_pendaftaran <= 2000000) {
					return 2;
				}elseif($biaya_pendaftaran > 1000000 AND $biaya_pendaftaran <= 1500000) {
					return 3;
				}elseif($biaya_pendaftaran > 500000 AND $biaya_pendaftaran <= 1000000) {
					return 5;
				}elseif($biaya_pendaftaran <= 500000) {
					return 4;
				}
				break;
			case 5:
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
				}
				break;
			default:
				return 0;
				break;
		}
		
	}

	public function konversi_biaya_spp($biaya_spp, $id) {
		switch ($id) {
			case 1:
				if($biaya_spp > 400000) {
					return 5;
				}elseif($biaya_spp > 300000 AND $biaya_spp <= 400000) {
					return 4;
				}elseif($biaya_spp > 200000 AND $biaya_spp <= 300000) {
					return 3;
				}elseif($biaya_spp > 100000 AND $biaya_spp <= 200000) {
					return 2;
				}elseif($biaya_spp <= 100000) {
					return 1;
				}
				break;
			case 2:
				if($biaya_spp > 400000) {
					return 3;
				}elseif($biaya_spp > 300000 AND $biaya_spp <= 400000) {
					return 5;
				}elseif($biaya_spp > 200000 AND $biaya_spp <= 300000) {
					return 4;
				}elseif($biaya_spp > 100000 AND $biaya_spp <= 200000) {
					return 2;
				}elseif($biaya_spp <= 100000) {
					return 1;
				}
				break;
			case 3:
				if($biaya_spp > 400000) {
					return 1;
				}elseif($biaya_spp > 300000 AND $biaya_spp <= 400000) {
					return 3;
				}elseif($biaya_spp > 200000 AND $biaya_spp <= 300000) {
					return 5;
				}elseif($biaya_spp > 100000 AND $biaya_spp <= 200000) {
					return 4;
				}elseif($biaya_spp <= 100000) {
					return 2;
				}
				break;
			case 4:
				if($biaya_spp > 400000) {
					return 1;
				}elseif($biaya_spp > 300000 AND $biaya_spp <= 400000) {
					return 2;
				}elseif($biaya_spp > 200000 AND $biaya_spp <= 300000) {
					return 3;
				}elseif($biaya_spp > 100000 AND $biaya_spp <= 200000) {
					return 5;
				}elseif($biaya_spp <= 100000) {
					return 4;
				}
				break;
			case 5:
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
				}
				break;
			default:
				return 0;
				break;
		}
	}

	public function konversi_akreditasi($akreditasi, $id) {
		switch ($id) {
			case 1:
				if($akreditasi == 'Tidak Terakreditasi') {
					return 5;
				}elseif($akreditasi == 'Belum Diakreditasi') {
					return 4;
				}elseif($akreditasi == 'C') {
					return 3;
				}elseif($akreditasi == 'B') {
					return 2;
				}elseif($akreditasi == 'A') {
					return 1;
				}
				break;
			case 2:
				if($akreditasi == 'Tidak Terakreditasi') {
					return 3;
				}elseif($akreditasi == 'Belum Diakreditasi') {
					return 5;
				}elseif($akreditasi == 'C') {
					return 4;
				}elseif($akreditasi == 'B') {
					return 2;
				}elseif($akreditasi == 'A') {
					return 1;
				}
				break;
			case 3:
				if($akreditasi == 'Tidak Terakreditasi') {
					return 1;
				}elseif($akreditasi == 'Belum Diakreditasi') {
					return 3;
				}elseif($akreditasi == 'C') {
					return 5;
				}elseif($akreditasi == 'B') {
					return 4;
				}elseif($akreditasi == 'A') {
					return 2;
				}
				break;
			case 4:
				if($akreditasi == 'Tidak Terakreditasi') {
					return 1;
				}elseif($akreditasi == 'Belum Diakreditasi') {
					return 2;
				}elseif($akreditasi == 'C') {
					return 3;
				}elseif($akreditasi == 'B') {
					return 5;
				}elseif($akreditasi == 'A') {
					return 4;
				}
				break;
			case 5:
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
				}
				break;
			default:
				return 0;
				break;
		}		
	}

	public function konversi_jarak($jarak, $id) {
		switch ($id) {
			case 1:
				if($jarak >= 1 AND $jarak <= 3) {
					return 1;
				}elseif($jarak >= 4 AND $jarak <= 6) {
					return 2;
				}elseif($jarak >= 7 AND $jarak <= 9) {
					return 3;
				}elseif($jarak >= 10 AND $jarak <= 12) {
					return 4;
				}elseif($jarak >= 13) {
					return 5;
				}
				break;
			case 2:
				if($jarak >= 1 AND $jarak <= 3) {
					return 1;
				}elseif($jarak >= 4 AND $jarak <= 6) {
					return 2;
				}elseif($jarak >= 7 AND $jarak <= 9) {
					return 4;
				}elseif($jarak >= 10 AND $jarak <= 12) {
					return 5;
				}elseif($jarak >= 13) {
					return 3;
				}
				break;
			case 3:
				if($jarak >= 1 AND $jarak <= 3) {
					return 2;
				}elseif($jarak >= 4 AND $jarak <= 6) {
					return 4;
				}elseif($jarak >= 7 AND $jarak <= 9) {
					return 5;
				}elseif($jarak >= 10 AND $jarak <= 12) {
					return 3;
				}elseif($jarak >= 13) {
					return 1;
				}
				break;
			case 4:
				if($jarak >= 1 AND $jarak <= 3) {
					return 4;
				}elseif($jarak >= 4 AND $jarak <= 6) {
					return 5;
				}elseif($jarak >= 7 AND $jarak <= 9) {
					return 3;
				}elseif($jarak >= 10 AND $jarak <= 12) {
					return 2;
				}elseif($jarak >= 13) {
					return 1;
				}
				break;
			case 5:
				if($jarak >= 1 AND $jarak <= 3) {
					return 5;
				}elseif($jarak >= 4 AND $jarak <= 6) {
					return 4;
				}elseif($jarak >= 7 AND $jarak <= 9) {
					return 3;
				}elseif($jarak >= 10 AND $jarak <= 12) {
					return 2;
				}elseif($jarak >= 13) {
					return 1;
				}
				break;
			default:
				return 0;
				break;
		}
	}
}
