<?php

class MataKuliahController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MataKuliah');
    }

    public function getMataKuliahs() {
        $data['matakuliahs'] = $this->MataKuliah->getMataKuliahs();
        $this->load->view('MataKuliahView', $data);
    }
}