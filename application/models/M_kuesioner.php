<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kuesioner extends CI_Model{

    // kuesioner

    public function ambil_kuesioner() {
        return $this->db->get('kuesioner')->result_array();
    }

    public function ambil_jumlah_kuesioner() {
        return $this->db->get('kuesioner')->num_rows();
    }

    public function tambah_kuesioner($data) {
        $this->db->insert('kuesioner', $data);
    }

    public function edit_kuesioner($id_kuesioner, $data) {
        $this->db->where('id_kuesioner', $id_kuesioner);
        $this->db->update('kuesioner', $data);
    }

    public function hapus_kuesioner($id_kuesioner) {
        $this->db->where('id_kuesioner', $id_kuesioner);
        $this->db->delete('kuesioner');
    }

    // daftar kuesioner

    public function ambil_daftar_kuesioner() {
        $this->db->join('orang_tua', 'orang_tua.id_orang_tua = daftar_kuesioner.id_orang_tua');
        return $this->db->get('daftar_kuesioner')->result_array();
    }

    public function ambil_daftar_kuesioner_byid($id_daftar_kuesioner) {
        $this->db->join('orang_tua', 'orang_tua.id_orang_tua = daftar_kuesioner.id_orang_tua');
        $this->db->where('id_daftar_kuesioner', $id_daftar_kuesioner);
        return $this->db->get('daftar_kuesioner')->result_array();
    }

    public function tambah_daftar_kuesioner($data) {
        $this->db->insert('daftar_kuesioner', $data);
        return $this->db->insert_id();
    }

    public function hapus_daftar_kuesioner($id_daftar_kuesioner) {
        $this->db->where('id_daftar_kuesioner', $id_daftar_kuesioner);
        $this->db->delete('daftar_kuesioner');
    }

    // item kuesioner

    public function ambil_item_kuesioner($id_daftar_kuesioner) {
        $this->db->join('kuesioner', 'kuesioner.id_kuesioner = item_kuesioner.id_kuesioner');
        $this->db->where('id_daftar_kuesioner', $id_daftar_kuesioner);
        return $this->db->get('item_kuesioner')->result_array();
    }

    public function tambah_item_kuesioner($data) {
        $this->db->insert('item_kuesioner', $data);
    }
}