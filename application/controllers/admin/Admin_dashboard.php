<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Jenis_obat_model');
    }

    public function index()
    {
        if($this->is_has_privilege()){
            $data['title'] = 'Admin';
            $this->load->view('admin/index', $data);
        } else {
            redirect('page_not_found');
        }
    }

    private function is_has_privilege()
    {
        return $_SESSION['role'] == 'admin';
    }
}