<?php
class User extends CI_Controller{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');

    }

    public function create_account(){
        $data['title'] = 'Create Account';
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('id_user','Id_user','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('template/header', $data);
            $this->load->view('user/form');
            $this->load->view('template/footer');
        }

        else{
            $this->User_model->create_account();
            $this->session->set_flashdata('flash','created');
            redirect('welcome');
        }


    }

}?>