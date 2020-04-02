<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_model');
		$this->load->model('Jenis_obat_model');
	}

	public function create()
	{
		$data['title'] = 'Admin - Tambah obat';
		$data['jenis_obat'] = $this->Jenis_obat_model->loadJenisObatData();
		$data['jenis_obat_complete'] = $this->Jenis_obat_model->loadJenisDataComplete();
		$data['action'] = 'TAMBAH OBAT BARU';
		$this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|min_length[5]');
		$this->form_validation->set_rules('id_jenis', 'Jenis obat', 'required');
		$this->form_validation->set_rules('harga', 'Harga obat', 'required|numeric');
		$this->form_validation->set_rules('stok', 'Stok obat', 'required|numeric');
		if($this->form_validation->run() == false) {
			$this->load->view('admin/obat/form', $data);
			$this->session->set_flashdata('flash');
		} else {
			$this->Obat_model->insertNew($this->input->post('id_jenis', true));
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			redirect(base_url() . 'index.php/admin/obat/hi');
		}
	}

	public function hi()
	{
		$data['obats'] = $this->Obat_model->getAllData();
		$data['jenis_obat'] = $this->Jenis_obat_model->loadJenisObatData();
		$data['title'] = 'Admin - Obat';
		$data['action'] = 'TAMBAH OBAT BARU';
		$this->load->view('tes', $data);
	}

	public function ajax()
	{
		$dataCountTotal = $this->Obat_model->countAllData();
		$data = $this->Obat_model->getAllData();

		$callback = array(
			'recordsTotal' => $dataCountTotal,
			'data' => $data
		);
		header('Content-Type: application/json');
		echo json_encode($callback);
	}

	public function edit($id)
	{
		$data['title'] = 'Admin - Update obat';
		$data['jenis_obat'] = $this->Jenis_obat_model->loadJenisObatData();
		$data['jenis_obat_complete'] = $this->Jenis_obat_model->loadJenisDataComplete();
		$data['action'] = 'UPDATE OBAT';
		$dataObatById = $this->Obat_model->getObatById($id);
		$data['nama_obat'] = $dataObatById['nama_obat'];
		$data['id_jenis'] = $dataObatById['id_jenis'];
		$data['harga'] = $dataObatById['harga'];
		$data['stok'] = $dataObatById['stok'];
		$this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|min_length[5]');
		$this->form_validation->set_rules('id_jenis', 'Jenis obat', 'required');
		$this->form_validation->set_rules('harga', 'Harga obat', 'required|numeric');
		$this->form_validation->set_rules('stok', 'Stok obat', 'required|numeric');
		if($this->form_validation->run() == false) {
			$this->load->view('admin/obat/form', $data);
			$this->session->set_flashdata('flash');
		} else {
			$this->Obat_model->update($id);
			$this->session->set_flashdata('flash', 'Berhasil diupdate');
			redirect(base_url() . 'index.php/admin/obat/hi');
		}
	}

	public function delete_ajax($id_obat)
	{
		try {
			if(!isset($id_obat)){
				$stats = 'fail';
			} else {
				$stats = $this->Obat_model->delete($id_obat);
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
}
