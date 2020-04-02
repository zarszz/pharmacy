<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');

    }



    public function index()
    {
        $data['title'] = 'Login';

        $id_user = $this->input->post('id_user_login',true);
        $password  = $this->input->post('password_login',true);

        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('id_user','Id_user','required');

        if( empty($this->User_model->check_account($id_user,$password)) ){
            $this->load->view('template/header', $data);
            $this->load->view('login/index');
            $this->load->view('template/footer');
        }

        else{
            $this->load->view('public/index');
        }

        //$this->load->view('template/header',$data);
        //$this->load->view('login/index');
        //$this->load->view('template/header');
        //$this->load->view('public/index');
    }
}