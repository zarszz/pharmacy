<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_obat_model extends CI_Model
{
    private $_table = 'jenis_obat';

    public function insert_new()
    {
        $data = [
            'jenis_obat' => $this->input->post('jenis_obat', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'id_jenis' => $this->input->post('id_jenis', true)
        ];
        return $this->db->insert($this->_table, $data);
    }
    public function get_all_data()
    {
        return $this->db->get($this->_table)->result();
    }

    public function count_all_data()
    {
        return $this->db->count_all($this->_table);
    }

    public function get_jenis_obat()
    {
        $this->db->select('jenis_obat, id_jenis');
        return $this->db->get($this->_table)->result_array();
    }

    public function get_jenis_data_complete()
    {
        $this->db->select('id_jenis, jenis_obat');
        return $this->db->get($this->_table)->result_array();
    }

    public function get_jenis_obat_by_id($id)
    {
        return $this->db->get_where($this->_table, ['id_jenis' => $id])->result_array()[0];
    }

    public function update($id_jenis)
    {
        $data = [
            'jenis_obat' => $this->input->post('jenis_obat', true),
            'deskripsi' => $this->input->post('deskripsi', true),
        ];
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update($this->_table, $data);
    }

    public function delete($id_jenis)
    {
        $is_avaible = $this->db->get_where($this->_table, ['id_jenis' => $id_jenis])->result_array();
        if(sizeof($is_avaible) > 0) {
            $this->db->where('id_jenis', $id_jenis);
            return $this->db->delete($this->_table);
        } else {
            return null;
        }
    }
}
