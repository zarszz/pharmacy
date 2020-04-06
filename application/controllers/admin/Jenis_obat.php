<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_obat extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_obat_model');
    }

    public function index()
    {
        if($this->is_has_privilege()){
            $data['title'] = 'Admin - MANAGE JENIS OBAT';
            $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
            $this->load->view('admin/Jenis_obat/index', $data);
        } else {
            redirect('page_not_found');
        }
    }

    public function create()
    {
        if($this->is_has_privilege()){
            $data['action'] = 'TAMBAH JENIS OBAT BARU';
            $data['title'] = 'Admin - TAMBAH JENIS OBAT';
            $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
            $this->form_validation->set_rules('jenis_obat', 'Jenis obat', 'required|min_length[5]');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi obat', 'required|min_length[10]');
            $this->form_validation->set_rules('id_jenis', 'Id Jenis obat', 'required|min_length[3]');
            if($this->form_validation->run() == false) {
                $this->load->view('admin/Jenis_obat/form', $data);
                $this->session->set_flashdata('flash');
            } else {
                $this->Jenis_obat_model->insert_new();
                redirect('/admin/jenis_obat/index');
            }
        } else {
            redirect('page_not_found');
        }
    }

    public function edit($id_jenis)
    {
        if($this->is_has_privilege()){
            $data['action'] = 'UPDATE JENIS OBAT';
            $data['title'] = 'Admin - UPDATE JENIS OBAT';
            $data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
            $this->form_validation->set_rules('jenis_obat', 'Jenis obat', 'required|min_length[5]');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi obat', 'required|min_length[10]');
            $this->form_validation->set_rules('id_jenis', 'Id Jenis obat', 'required|min_length[3]');
            if($this->form_validation->run() == false) {
                $jenis_obat_data = $this->Jenis_obat_model->get_jenis_obat_by_id($id_jenis);
                $data['jenis'] = $jenis_obat_data['jenis_obat'];
                $data['id_jenis'] = $jenis_obat_data['id_jenis'];
                $data['deskripsi'] = $jenis_obat_data['deskripsi'];
                $this->load->view('admin/Jenis_obat/form', $data);
                $this->session->set_flashdata('flash');
            } else {
                $this->Jenis_obat_model->update($id_jenis);
                redirect('/admin/jenis_obat/index');
            }
        } else {
            redirect('page_not_found');
        }
    }

	public function delete_ajax($id_jenis)
	{
        if($this->is_has_privilege()) {
            try {
                if(!isset($id_jenis)){
                    $stats = 'fail';
                } else {
                    $stats = $this->Jenis_obat_model->delete($id_jenis);
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

    public function fetch_ajax()
    {
        if($this->is_has_privilege()) {
            $data_total = $this->Jenis_obat_model->count_all_data();
            $data = $this->Jenis_obat_model->get_all_data();

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

    public function is_has_privilege()
    {
        return $_SESSION['role'] == 'admin' or $_SESSION['role'] == 'pegawai';
    }
}