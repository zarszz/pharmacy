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
        $data['title'] = 'Admin - MANAGE JENIS OBAT';
        $data['jenis_obat'] = $this->Jenis_obat_model->loadJenisObatData();
        $this->load->view('admin/Jenis_obat/index', $data);
    }

    public function create()
    {
        $data['action'] = 'TAMBAH JENIS OBAT BARU';
        $data['title'] = 'Admin - TAMBAH JENIS OBAT';
        $data['jenis_obat'] = $this->Jenis_obat_model->loadJenisObatData();
        $this->form_validation->set_rules('jenis_obat', 'Jenis obat', 'required|min_length[5]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi obat', 'required|min_length[10]');
        $this->form_validation->set_rules('id_jenis', 'Id Jenis obat', 'required|min_length[3]');
        if($this->form_validation->run() == false) {
            $this->load->view('admin/Jenis_obat/form', $data);
            $this->session->set_flashdata('flash');
        } else {
            $this->Jenis_obat_model->insertNewJenisObat();
            redirect('/admin/jenis_obat/index');
        }
    }

    public function edit($id_jenis)
    {
        $data['action'] = 'UPDATE JENIS OBAT';
        $data['title'] = 'Admin - UPDATE JENIS OBAT';
        $data['jenis_obat'] = $this->Jenis_obat_model->loadJenisObatData();
        $this->form_validation->set_rules('jenis_obat', 'Jenis obat', 'required|min_length[5]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi obat', 'required|min_length[10]');
        $this->form_validation->set_rules('id_jenis', 'Id Jenis obat', 'required|min_length[3]');
        if($this->form_validation->run() == false) {
            $dataJenisObat = $this->Jenis_obat_model->getJenisById($id_jenis);
            $data['jenis'] = $dataJenisObat['jenis_obat'];
            $data['id_jenis'] = $dataJenisObat['id_jenis'];
            $data['deskripsi'] = $dataJenisObat['deskripsi'];
            $this->load->view('admin/Jenis_obat/form', $data);
            $this->session->set_flashdata('flash');
        } else {
            $this->Jenis_obat_model->update($id_jenis);
            redirect('/admin/jenis_obat/index');
        }
    }

	public function delete_ajax($id_jenis)
	{
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
	}

    public function fetch_ajax()
    {
        $dataCountTotal = $this->Jenis_obat_model->countAllData();
        $data = $this->Jenis_obat_model->loadAllJenisObatData();

        $callback = array(
            'recordsTotal' => $dataCountTotal,
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($callback);
    }
}