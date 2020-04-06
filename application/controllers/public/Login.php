<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_obat_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
        $email = $this->input->post('email',true);
        $password  = $this->input->post('password',true);

        $this->form_validation->set_rules('email','Email','email|required');
        $this->form_validation->set_rules('password','Password','required');

        if(empty($this->User_model->check_account($email,$password)) ){
            $this->load->view('public/login/index', $data);
        } else {
            $user_data = $this->User_model->get_user_by_email($email)[0];
            $session_data = [
                'user_id' => $user_data['id_user'],
                'role' => $user_data['role'],
                'logged_in' => true
            ];
            $this->session->set_userdata($session_data);
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}