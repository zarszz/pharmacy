<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_obat_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();

        $this->form_validation->set_rules('email','Email','valid_email|required');
        $this->form_validation->set_rules('password','Password','required');
        if(!$this->is_logged_in()){
            if($this->form_validation->run() == FALSE){
                $this->load->view('public/login/index', $data);
            } else {
                $email = $this->input->post('email',true);
                $password  = $this->input->post('password',true);
                $is_valid = sizeof($this->User_model->check_account($email,$password)) > 0;
                if($is_valid){
                    $user_data = $this->User_model->get_user_by_email($email)[0];
                    $session_data = [
                        'user_id' => $user_data['id_user'],
                        'role' => $user_data['role'],
                        'logged_in' => true,
                        'saldo' => $user_data['saldo']
                    ];
                    $this->session->set_userdata($session_data);
                    redirect('/');
                } else {
                    $_SESSION['error'] = 'Invalid email or password';
                    redirect('public/login/index');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function auth($email, $password)
    {
        return !empty($this->User_model->check_account($email,$password));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    private function is_logged_in()
    {
        if(isset($_SESSION['logged_in'])){
            return $_SESSION['logged_in'];
        }
        return false;
    }
}