<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Obat_model');
        $this->load->model('User_model');
        $this->load->model('Jenis_obat_model');
        $this->load->model('Cart_model');
    }

    public function show_obat($id){
        $data['obat'] = $this->Obat_model->get_obat_by_id($id);
        $data['jenis'] = $this->Jenis_obat_model->get_jenis_obat_by_id($data['obat']['id_jenis']);
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
        $this->load->view('public/obat/index', $data);
    }

    public function show_cart(){
        $data['title'] = 'Cart';
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
        $data['cart'] = $this->Cart_model->show_user_cart($_SESSION['user_id']);
        $this->load->view('public/user/cart', $data);
    }

    public function delete_cart($id_cart){
        $this->Cart_model->delete_item_cart($id_cart);
        redirect('public/obat/show_cart');
    }

    public function buy_cart($total_cart){
        $saldo = $_SESSION['saldo'];

        $id_user = $_SESSION['user_id'];

        if ( $saldo > $total_cart ){
            $sisa = $saldo - $total_cart;
            $this->Cart_model->cart_transaction($sisa,$id_user);
            $this->Cart_model->item_have_paid($id_user);
            $_SESSION['saldo'] = $sisa;
            redirect('public/obat/show_cart');
        } else {
            redirect('public/obat/show_cart');
        }
    }

    public function add_obat_to_cart($id_obat){
        $obat = $this->Obat_model->get_obat_by_id($id_obat);
        $user = $this->User_model->get_user_by_id($_SESSION['user_id']);
        $nama_obat = $obat['nama_obat'];
        $harga_obat = $obat['harga'];
        if(empty($user)){
            $this->session->set_flashdata('flash','created');
            redirect('/public/login');
        } else {
            $this->Obat_model->insert_cart($nama_obat,$_SESSION['user_id'],$harga_obat, $id_obat);
            $updated_stock = $obat['stok'] - 1;
            $this->Obat_model->update_stock($id_obat, $updated_stock);
            redirect('public/Obat/show_cart');
        }

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

    public function ajax_search()
    {
        $query = $this->input->get('query');
        $result = $this->Obat_model->get_like_data($query);
        $data = array();
        foreach ($result as $rslt) {
            $data[] = $rslt['nama_obat'];
        }
        echo json_encode($data);
    }

    public function search()
    {
        $query = $this->input->get('query');
        $data['data_obat'] = $this->Obat_model->get_like_data($query);
        $data['keyword'] = $query;
        $this->load->view('public/search', $data);
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