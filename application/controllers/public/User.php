<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_obat_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        // user profile pag
        return 'UNDER CONSTRUCTION';
    }

    public function profile_page()
    {
        $data['user_data'] = $this->User_model->get_user_by_id($_SESSION['user_id'])[0];
        $data['title'] = 'YOUR PROFILE';
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
        $this->load->view('public/user/profile', $data);
    }

    public function create_account()
    {
        // create user page
        $data['title'] = 'Create Account';
        $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]',['is_unique' => 'This email is already used']);
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('alamat','Alamat', 'required|min_length[5]');
        if($this->form_validation->run() == FALSE){
            $this->load->view('public/user/form', $data);
        } else {
            $this->User_model->create_account();
            $this->session->set_flashdata('flash','created');
            redirect('welcome');
        }
    }

    public function edit()
    {
        // edit user page
    }

    public function manage_user()
    {
        if($this->is_has_privilege()){
            $data['obats'] = $this->User_model->get_all_data();
            $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
            $data['title'] = 'Admin - User';
            $data['action'] = 'TAMBAH USER BARU';
            $this->load->view('admin/user/index', $data);
        } else {
            redirect('page_not_found');
        }
    }

    public function edit_with_admin($id_user)
    {
        if($this->is_has_privilege()) {
            $user_data = $this->User_model->get_user_by_id($id_user)[0];
            $data['email'] = $user_data['email'];
            $data['nama'] = $user_data['nama'];

            $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();

            $data['title'] = 'Admin - User';
            $data['action'] = 'UPDATE USER';

            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/user/form', $data);
            } else {
                $this->User_model->update($id_user);
                $this->session->set_flashdata('flash','updated successfully !!');
                redirect('public/user/manage_user');
            }
        } else {
            redirect('page_not_found');
        }
    }

    public function create_account_with_admin()
    {
        if($this->is_has_privilege()) {
            $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();

            $data['title'] = 'Admin - User';
            $data['action'] = 'TAMBAH USER BARU';

            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('alamat','Alamat', 'required|min_length[5]');
            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/user/form', $data);
            } else {
                $this->User_model->create_account();
                $this->session->set_flashdata('flash','created');
                redirect('public/user/manage_user');
            }
        } else {
            redirect('page_not_found');
        }
    }

	public function ajax()
	{
        if($this->is_has_privilege()) {
            $data_total = $this->User_model->count_all_data();
            $data = $this->User_model->get_all_data();

            $callback = array(
                'recordsTotal' => $data_total,
                'data' => $data
            );
            header('Content-Type: application/json');
            echo json_encode($callback);
        } else {
			$this->output->set_status_header('404');
			header('Content-Type: application/json');
			echo json_encode(['error' => 'not found']);
        }
    }

    public function delete_ajax($id_user)
    {
        if($this->is_has_privilege()) {
            try {
                if(!isset($id_user)){
                    $stats = 'fail';
                } else {
                    $stats = $this->User_model->delete($id_user);
                    if($stats){
                        header('Content-Type: application/json');
                        echo json_encode(['status' => $stats]);
                    } else {
                        header('Content-Type: application/json');
                        echo json_encode(['status' => 'not found']);
                    }
                }
            } catch (\Throwable $th) {
                echo json_encode(['status' => 'error']);
            }
        } else {
            $this->output->set_status_header('404');
			header('Content-Type: application/json');
			echo json_encode(['error' => 'not found']);
        }
    }

    private function is_has_privilege()
    {
        return $_SESSION['role'] == 'admin';
    }
}