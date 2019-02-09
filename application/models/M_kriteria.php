<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model{

    public function ambil_kriteria() {
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_kriteria_byid($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_jumlah_kriteria() {
        return $this->db->get('kriteria')->num_rows();
    }

    public function tambah_kriteria($data) {
        $this->db->insert('kriteria', $data);
    }

    public function edit_kriteria($id_kriteria, $data) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
    }

    public function hapus_kriteria($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('kriteria');
    }
}