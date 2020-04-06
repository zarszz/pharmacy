<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Jenis_obat_model');
    }

    public function index()
    {
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
        $this->load->view('public/index', $data);
    }
}