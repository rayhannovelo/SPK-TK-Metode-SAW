<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model{

    // users

    public function tambah_users($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function edit_users($id_users, $data) {
        $this->db->where('id_users', $id_users);
        $this->db->update('users', $data);
    }

    public function hapus_users($id_users) {
        $this->db->where('id_users', $id_users);
        $this->db->delete('users');
    }   

    // orang_tua

    public function ambil_password($id_users) {
        $this->db->join('users', 'users.id_users = orang_tua.id_users');
        $this->db->where('users.id_users', $id_users);
        return $this->db->get('orang_tua')->row()->password;
    }

    public function ambil_profil_orang_tua_byid($id_users) {
        $this->db->join('users', 'users.id_users = orang_tua.id_users');
        $this->db->where('users.id_users', $id_users);
        return $this->db->get('orang_tua')->result_array();
    }

    public function ambil_profil_orang_tua() {
        $this->db->join('users', 'users.id_users = orang_tua.id_users');
        return $this->db->get('orang_tua')->result_array();
    }

    public function ambil_id_orang_tua($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('orang_tua')->row()->id_orang_tua;
    }

    public function ambil_nama_orang_tua($id_users) {
    	$this->db->where('id_users', $id_users);
        return $this->db->get('orang_tua')->row()->nama;
    }

    public function ambil_nama_orang_tua_byid($id_orang_tua) {
        $this->db->where('id_orang_tua', $id_orang_tua);
        return $this->db->get('orang_tua')->row()->nama_orang_tua;
    }

    public function ambil_jumlah_orang_tua() {
        return $this->db->get('orang_tua')->num_rows();
    }

    public function tambah_orang_tua($data) {
        $this->db->insert('orang_tua', $data);
    }

    public function edit_orang_tua($id_orang_tua, $data) {
        $this->db->where('id_orang_tua', $id_orang_tua);
        $this->db->update('orang_tua', $data);
    }
}