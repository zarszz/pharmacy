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
		if($this->is_has_privilege()){
			$data['title'] = 'Admin - Tambah obat';
			$data['jenis_obat'] = $this->Jenis_obat_model->get_all_data();
			$data['jenis_obat_complete'] = $this->Jenis_obat_model->get_jenis_data_complete();
			$data['action'] = 'TAMBAH OBAT BARU';
			$this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|min_length[5]');
			$this->form_validation->set_rules('id_jenis', 'Jenis obat', 'required');
			$this->form_validation->set_rules('harga', 'Harga obat', 'required|numeric');
			$this->form_validation->set_rules('stok', 'Stok obat', 'required|numeric');
			if($this->form_validation->run() == false) {
				$this->load->view('admin/obat/form', $data);
				$this->session->set_flashdata('flash');
			} else {
				$this->Obat_model->insert_new($this->input->post('id_jenis', true));
				$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
				redirect(base_url() . 'index.php/admin/obat/index');
			}
		} else {
			redirect('page_not_found');
		}
	}

	public function index()
	{
		if($this->is_has_privilege()){
			$data['obats'] = $this->Obat_model->get_all_data();
			$data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
			$data['title'] = 'Admin - Obat';
			$data['action'] = 'TAMBAH OBAT BARU';
			$this->load->view('admin/obat/index', $data);
		} else {
			redirect('page_not_found');
		}
	}

	public function ajax()
	{
		if($this->is_has_privilege()){
			$data_total = $this->Obat_model->count_all_data();
			$data = $this->Obat_model->get_all_data();

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

	public function edit($id)
	{
		if($this->is_has_privilege()){
			$data['title'] = 'Admin - Update obat';
			$data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
			$data['jenis_obat_complete'] = $this->Jenis_obat_model->get_jenis_data_complete();
			$data['action'] = 'UPDATE OBAT';
			$obat_by_id = $this->Obat_model->get_obat_by_id($id);
			$data['nama_obat'] = $obat_by_id['nama_obat'];
			$data['id_jenis'] = $obat_by_id['id_jenis'];
			$data['harga'] = $obat_by_id['harga'];
			$data['stok'] = $obat_by_id['stok'];
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
				redirect(base_url() . 'index.php/admin/obat/index');
			}
		} else {
			redirect('page_not_found');
		}
	}

	public function delete_ajax($id_obat)
	{
		if($this->is_has_privilege()){
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
		} else {
			$this->output->set_status_header('404');
			header('Content-Type: application/json');
			echo json_encode(['error' => 'not found']);
		}

	}

	private function is_has_privilege()
	{
		return $_SESSION['role'] == 'admin' or $_SESSION['role'] == 'pegawai';
	}
}
