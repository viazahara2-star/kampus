
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalKuliahController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Menampilkan data jadwal kuliah
    public function index()
    {
        $data['jadwalkuliahs'] = $this->db
            ->get('jadwalkuliah')
            ->result();

        $this->load->view('jadwalkuliah', $data);
    }

    // Menambah jadwal kuliah
    public function tambah()
    {
        $data = array(
            'hari' => $this->input->post('hari', TRUE),
            'jam' => $this->input->post('jam', TRUE),
            'kode' => $this->input->post('kode', TRUE),
            'mata_kuliah' => $this->input->post('mata_kuliah', TRUE),
            'sks' => $this->input->post('sks', TRUE)
        );

        $this->db->insert('jadwalkuliah', $data);

        redirect('JadwalKuliahController');
    }

    // Mengambil data untuk diedit
    public function edit($id)
    {
        $data['jadwalkuliah'] = $this->db
            ->get_where('jadwalkuliah', array('id' => $id))
            ->row();

        if (!$data['jadwalkuliah']) {
            show_404();
        }

        $this->load->view('edit_jadwalkuliah', $data);
    }

    // Memperbarui data
    public function update($id)
    {
        $data = array(
            'hari' => $this->input->post('hari', TRUE),
            'jam' => $this->input->post('jam', TRUE),
            'kode' => $this->input->post('kode', TRUE),
            'mata_kuliah' => $this->input->post('mata_kuliah', TRUE),
            'sks' => $this->input->post('sks', TRUE)
        );

        $this->db->where('id', $id);
        $this->db->update('jadwalkuliah', $data);

        redirect('JadwalKuliahController');
    }

    // Menghapus data
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwalkuliah');

        redirect('JadwalKuliahController');
    }

}
