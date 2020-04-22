<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Jenis_obat_model');
        $this->load->model('Obat_model');
    }

    public function index()
    {
        $config = $this->paginationConfig($this->Obat_model->count_all_data());
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['data_obat'] = $this->Obat_model->get_obat_by_offset($config['per_page'], $from);
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_data_complete();
        $this->load->view('public/index', $data);
    }

    private function paginationConfig($jumlahData){
        $config['base_url']         = base_url() . 'index.php/welcome/index';
        $config['total_rows']       = $jumlahData;
        $config['per_page']         = 9;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        return $config;
    }
}