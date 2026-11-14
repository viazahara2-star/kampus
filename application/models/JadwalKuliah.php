
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    // Menampilkan semua data
    public function tampil_data()
    {
        return $this->db->get('jadwalkuliah')->result();
    }

    // Menambah data
    public function tambah_data($data)
    {
        return $this->db->insert('jadwalkuliah', $data);
    }

    // Mengambil satu data berdasarkan NIM
    public function ambil_data($nim)
    {
        return $this->db->get_where('jadwalkuliah', array(
            'nim' => $nim
        ))->row();
    }

    // Mengubah data
    public function update_data($nim, $data)
    {
        $this->db->where('nim', $nim);
        return $this->db->update('jadwalkuliah', $data);
    }

    // Menghapus data
    public function hapus_data($nim)
    {
        $this->db->where('nim', $nim);
        return $this->db->delete('jadwalkuliah');
    }
}
