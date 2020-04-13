<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_model');
		$this->load->model('Jenis_obat_model');
    }

    public function show_obat($id){
        $data['obat'] = $this->Obat_model->get_obat_by_id($id);
        $data['jenis'] = $this->Jenis_obat_model->get_jenis_obat_by_id($data['obat']['id_jenis']);
        $this->load->view('public/obat/index', $data);
    }

    public function show_obat_by_jenis(){
        $id_jenis = $this->uri->segment(4);
        $from = $this->uri->segment(5);
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_data_complete();
        $config = $this->paginationConfig($this->Obat_model->count_by_id_jenis($id_jenis), $id_jenis);
        $data['data_obat'] = $this->Obat_model->get_obat_by_jenis_offset($config['per_page'], $from, $id_jenis);
        $data['total_row'] = $config['total_rows'];
        $this->pagination->initialize($config);
        $this->load->view('public/obat/obat_by_jenis', $data);
    }

    private function paginationConfig($jumlahData, $id_jenis){
        $config['base_url']         = base_url() . 'index.php/public/obat/show_obat_by_jenis/' . $id_jenis;
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