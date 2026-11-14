
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    // Menampilkan data mahasiswa
    public function index()
    {
        $data['mahasiswas'] = $this->Mahasiswa_model->tampil_data();

        $this->load->view('MahasiswaView', $data);
    }

    // Menambah data mahasiswa
    public function tambah()
    {
        $data = array(
            'nim'   => $this->input->post('nim', TRUE),
            'nama'  => $this->input->post('nama', TRUE),
            'kelas' => $this->input->post('kelas', TRUE)
        );

        $this->Mahasiswa_model->tambah_data($data);

        redirect('MahasiswaController');
    }

    // Menampilkan halaman Edit
    public function edit($nim)
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->ambil_data($nim);

        if (!$data['mahasiswa']) {
            show_404();
            return;
        }

        $this->load->view('EditMahasiswaView', $data);
    }

    // Menyimpan perubahan data
    public function update($nim)
    {
        $data = array(
            'nim'   => $this->input->post('nim', TRUE),
            'nama'  => $this->input->post('nama', TRUE),
            'kelas' => $this->input->post('kelas', TRUE)
        );

        $this->Mahasiswa_model->update_data($nim, $data);

        redirect('MahasiswaController');
    }

    // Menghapus data mahasiswa
    public function delete($nim)
    {
        $this->Mahasiswa_model->hapus_data($nim);

        redirect('MahasiswaController');
    }

}
