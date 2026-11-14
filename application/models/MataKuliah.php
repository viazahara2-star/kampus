<?php

class MataKuliah extends CI_Model {
    public function getMataKuliahs() {
        return $this->db->get('tb_mata_kuliah')->result();
    }
}