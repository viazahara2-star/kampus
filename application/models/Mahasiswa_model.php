
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    // Menampilkan semua data mahasiswa
    public function tampil_data()
    {
        return $this->db->get('tb_mahasiswa')->result();
    }

    // Menambahkan data mahasiswa
    public function tambah_data($data)
    {
        return $this->db->insert('tb_mahasiswa', $data);
    }

    // Mengambil data mahasiswa
public function ambil_data($nim)
{
    return $this->db->get_where(
        'tb_mahasiswa',
        array('nim' => $nim)
    )->row();
}

    // Mengubah data mahasiswa
public function update_data($nim, $data)
{
    $this->db->where('nim', $nim);
    return $this->db->update('tb_mahasiswa', $data);
}

    // Menghapus data mahasiswa
    public function hapus_data($nim)
    {
        $this->db->where('nim', $nim);
        return $this->db->delete('tb_mahasiswa');
    }

}
