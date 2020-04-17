<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Obat_model');
        $this->load->model('Jenis_obat_model');
    }

    public function index()
    {
        if($this->is_has_privilege()){
            $data['title'] = 'Admin';
            $this->load->view('admin/dashboard/index', $data);
        } else {
            redirect('page_not_found');
        }
    }

    public function user_dashboard()
    {
        if($this->is_has_privilege()){
            $data['title'] = 'Admin - Manage User';
            $this->load->view('admin/dashboard/User_dashboard', $data);
        } else {
            redirect('page_not_found');
        }
    }

    public function obat_dashboard()
    {
        if($this->is_has_privilege()){
            $data['title'] = 'Admin - Manage Obat';
            $this->load->view('admin/dashboard/Obat_dashboard', $data);
        } else {
            redirect('page_not_found');
        }
    }

    public function jenis_obat_dashboard()
    {
        if($this->is_has_privilege()){
            $data['title'] = 'Admin - Manage Jenis Obat';
            $this->load->view('admin/dashboard/Jenis_obat_dashboard', $data);
        } else {
            redirect('page_not_found');
        }
    }

    public function ajax_card_data()
    {
		if($this->is_has_privilege()){
            $count_obat = $this->Obat_model->count_all_data();
            $count_jenis_obat = $this->Jenis_obat_model->count_all_data();
            $count_user = $this->User_model->count_all_data();

			$callback = array(
                'count_obat' => $count_obat,
                'count_jenis_obat' => $count_jenis_obat,
                'count_user' => $count_user
			);
			header('Content-Type: application/json');
			echo json_encode($callback);
		} else {
			header('Content-Type: application/json');
			echo json_encode(['error' => 'not found']);
		}
    }

    public function ajax_chart_obat()
    {
        $obatData = $this->Obat_model->count_by_jenis();
        $callback = [
            "value" => [],
            "label" => []
        ];
        foreach ($obatData as $data) {
            array_push($callback["value"], $data["count_data"]);
            array_push($callback["label"], $data["jenis_obat"]);
        }
		if($this->is_has_privilege()){
			header('Content-Type: application/json');
			echo json_encode($callback);
		} else {
			header('Content-Type: application/json');
            echo json_encode(['error' => 'not found']);
        }
    }

    public function ajax_chart_user()
    {
        $userData = $this->User_model->count_by_kelamin();
        $callback = [
            "value" => [],
            "label" => []
        ];
        foreach ($userData as $data) {
            array_push($callback["value"], $data["count_data"]);
            array_push($callback["label"], $data["jenis_kelamin"]);
        }
		if($this->is_has_privilege()){

			header('Content-Type: application/json');
			echo json_encode($callback);
		} else {
			header('Content-Type: application/json');
            echo json_encode(['error' => 'not found']);
        }
    }

    private function is_has_privilege()
    {
        if(isset($_SESSION['role'])){
            return $_SESSION['role'] == 'admin';
        }
        return false;
    }
}