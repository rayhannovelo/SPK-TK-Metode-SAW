<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tk extends CI_Model{

    public function ambil_tk() {
        return $this->db->query('SELECT `id_tk`, `npsn`, `nama_tk`, `alamat`, `kecamatan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "1" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `status_tk`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "2" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `jumlah_guru`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "3" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `jumlah_kelas`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "4" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `biaya_pendaftaran`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "5" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `biaya_spp`,
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "6" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `akreditasi`,
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "7" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `jarak`
            FROM `tk`')->result_array();
    }

    public function ambil_tk1() {
        return $this->db->get('tk')->result_array();
    }

    public function ambil_tk_byid($id_tk) {
        return $this->db->query('SELECT `id_tk`, `npsn`, `nama_tk`, `alamat`, `kecamatan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "1" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk`) as `status_tk`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "2" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk`) as `jumlah_guru`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "3" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk`) as `jumlah_kelas`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "4" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk`) as `biaya_pendaftaran`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "5" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk`) as `biaya_spp`,
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "6" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk`) as `akreditasi`,
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "7" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `jarak`
            FROM `tk` WHERE `id_tk` = "'.$id_tk.'"')->result_array();
    }

    public function ambil_tk_byid1($id_tk) {
        $this->db->where('id_tk', $id_tk);
        return $this->db->get('tk')->result_array();
    }

    public function ambil_tk_kecamatan($kecamatan) {
        return $this->db->query('SELECT `id_tk`, `npsn`, `nama_tk`, `alamat`, `kecamatan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "1" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `status_tk`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "2" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `jumlah_guru`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "3" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `jumlah_kelas`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "4" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `biaya_pendaftaran`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "5" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `biaya_spp`,
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "6" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `akreditasi`,
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "7" AND `nilai_evaluasi`.`id_tk` = `tk`.`id_tk` LIMIT 1) as `jarak`
            FROM `tk` WHERE `kecamatan` = "'.$kecamatan.'"')->result_array();
    }

    public function ambil_tk_kecamatan1($kecamatan) {
        $this->db->where('kecamatan', $kecamatan);
        return $this->db->get('tk')->result_array();
    }

    public function ambil_jumlah_tk() {
        return $this->db->get('tk')->num_rows();
    }
     public function ambil_jumlah_tk_kecamatan($kecamatan) {
        $this->db->where('kecamatan', $kecamatan);
        return $this->db->get('tk')->num_rows();
    }

    public function ambil_kecamatan_tk() {
        $this->db->select('kecamatan, count(kecamatan) as jumlah_tk');
        $this->db->group_by('kecamatan');
        return $this->db->get('tk')->result_array();
    }

    public function tambah_tk($data, $nilai) {
        $this->db->insert('tk', $data);
        $id_tk = $this->db->insert_id();

        $data = array('id_tk' => $id_tk, 'id_kriteria' => 1, 'nilai' => $nilai['status_tk']);
        $this->db->insert('nilai_evaluasi', $data);

        $data = array('id_tk' => $id_tk, 'id_kriteria' => 2, 'nilai' => $nilai['jumlah_guru']);
        $this->db->insert('nilai_evaluasi', $data);

        $data = array('id_tk' => $id_tk, 'id_kriteria' => 3, 'nilai' => $nilai['jumlah_kelas']);
        $this->db->insert('nilai_evaluasi', $data);

        $data = array('id_tk' => $id_tk, 'id_kriteria' => 4, 'nilai' => $nilai['biaya_pendaftaran']);
        $this->db->insert('nilai_evaluasi', $data);

        $data = array('id_tk' => $id_tk, 'id_kriteria' => 5, 'nilai' => $nilai['biaya_spp']);
        $this->db->insert('nilai_evaluasi', $data);

        $data = array('id_tk' => $id_tk, 'id_kriteria' => 6, 'nilai' => $nilai['akreditasi']);
        $this->db->insert('nilai_evaluasi', $data);
        
        $data = array('id_tk' => $id_tk, 'id_kriteria' => 7, 'nilai' => $nilai['jarak']);
        $this->db->insert('nilai_evaluasi', $data);
    }

    public function edit_tk($id_tk, $data, $nilai) {
        $this->db->where('id_tk', $id_tk);
        $this->db->update('tk', $data);

        $this->db->set('nilai', $nilai['status_tk']);
        $this->db->where('id_kriteria', 1);
        $this->db->where('id_tk', $id_tk);
        $this->db->update('nilai_evaluasi');

        $this->db->set('nilai', $nilai['jumlah_guru']);
        $this->db->where('id_kriteria', 2);
        $this->db->where('id_tk', $id_tk);
        $this->db->update('nilai_evaluasi');

        $this->db->set('nilai', $nilai['jumlah_kelas']);
        $this->db->where('id_kriteria', 3);
        $this->db->where('id_tk', $id_tk);
        $this->db->update('nilai_evaluasi');

        $this->db->set('nilai', $nilai['biaya_pendaftaran']);
        $this->db->where('id_kriteria', 4);
        $this->db->where('id_tk', $id_tk);
        $this->db->update('nilai_evaluasi');

        $this->db->set('nilai', $nilai['biaya_spp']);
        $this->db->where('id_kriteria', 5);
        $this->db->where('id_tk', $id_tk);
        $this->db->update('nilai_evaluasi');

        $this->db->set('nilai', $nilai['akreditasi']);
        $this->db->where('id_kriteria', 6);
        $this->db->where('id_tk', $id_tk);
        $this->db->update('nilai_evaluasi');

        $this->db->set('nilai', $nilai['jarak']);
        $this->db->where('id_kriteria', 7);
        $this->db->where('id_tk', $id_tk);
        $this->db->update('nilai_evaluasi');
    }

    public function hapus_tk($id_tk) {
        $this->db->where('id_tk', $id_tk);
        $this->db->delete('tk');
    }
}