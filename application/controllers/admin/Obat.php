<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_model');
		$this->load->model('Jenis_obat_model');
		$this->load->model('Cart_model');
	}

	public function create()
	{
		if($this->is_has_privilege()){
			$data['title'] = 'Admin - Tambah obat';
			$data['jenis_obat'] = $this->Jenis_obat_model->get_jenis_obat();
			$data['jenis_obat_complete'] = $this->Jenis_obat_model->get_jenis_data_complete();
			$data['action'] = 'TAMBAH OBAT BARU';
			$config = $this->get_upload_config();
			$this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|min_length[5]');
			$this->form_validation->set_rules('id_jenis', 'Jenis obat', 'required');
			$this->form_validation->set_rules('harga', 'Harga obat', 'required|numeric');
			$this->form_validation->set_rules('stok', 'Stok obat', 'required|numeric');
			if($this->form_validation->run() == false) {
				$this->load->view('admin/obat/form', $data);
				$this->session->set_flashdata('flash');
			} else {
				$file_name = $this->slugify($this->input->post('nama_obat', true));
				$extension = pathinfo($_FILES['foto-obat']['name'], PATHINFO_EXTENSION);
				$config['file_name'] = $file_name . '.' . $extension;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('foto-obat')){
					$_SESSION['UPLOAD_ERROR'] = "Upload gagal";
					redirect(base_url('admin/obat/create'));
				} else {
					$this->Obat_model->insert_new($this->input->post('id_jenis', true), $config['file_name']);
					$_SESSION['ADD_SUCCESS'] = "Add data success";
					redirect(base_url() . 'admin/obat/create');
				}
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
			$config = $this->get_upload_config();
			$data['obat'] = $this->Obat_model->get_obat_by_id($id);
			$this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|min_length[5]');
			$this->form_validation->set_rules('id_jenis', 'Jenis obat', 'required');
			$this->form_validation->set_rules('harga', 'Harga obat', 'required|numeric');
			$this->form_validation->set_rules('stok', 'Stok obat', 'required|numeric');
			if($this->form_validation->run() == false) {
				$this->load->view('admin/obat/form', $data);
				$this->session->set_flashdata('flash');
			} else {
				$file_name = $this->slugify($this->input->post('nama_obat', true));
				$extension = pathinfo($_FILES['foto-obat']['name'], PATHINFO_EXTENSION);
				$config['file_name'] = $file_name . '.' . $extension;
				$config['overwrite'] = true;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('foto-obat')){
					$_SESSION['UPLOAD_ERROR'] = "Upload gagal";
					redirect(base_url('admin/obat/edit/' . $id));
				} else {
					$this->Obat_model->update($id);
					$_SESSION['SUCCESS'] = "Update data success";
					redirect(base_url() . 'admin/obat/edit/' . $id);
				}
			}
		} else {
			$this->output->set_status_header('404');
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

	public function ajax_cart()
	{
		if($this->is_has_privilege()) {
			$data_total = $this->Cart_model->count_all_data();
			$data = $this->Cart_model->get_all_cart();

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

	public function delete_cart_ajax($id_cart)
	{
		if($this->is_has_privilege()) {
			if($this->Cart_model->delete_cart($id_cart)){
				$callback = array(
					'status' => 'success'
				);
				header('Content-Type: application/json');
				echo json_encode($callback);
			} else {
				header('Content-Type: application/json');
				echo json_encode(['status' => 'error']);
			}
        } else {
			$this->output->set_status_header('404');
			header('Content-Type: application/json');
			echo json_encode(['error' => 'not found']);
		}
	}

	private function get_upload_config()
	{
		return [
			"upload_path" => "./assets/public/produk",
			"allowed_types" => "jpg|png",
			"max_size" => "500",
			"max_width" => "1024",
			"max_height" => "768"
		];
	}

	private function slugify($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	 }

	private function is_has_privilege()
	{
		return $_SESSION['role'] == 'admin' or $_SESSION['role'] == 'pegawai';
	}
}
