<?php
class User_model extends CI_Model {
    protected $_table = 'user';

    //create account user
    public function create_account(){
        $data = [
            // "id_user" => $this->input->post('id_user',true),
            "email"  => $this->input->post('email',true),
            "nama"   => $this->input->post('nama',true),
            "alamat" => $this->input->post('alamat', true),
            "password" => $this->input->post('password',true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "role" => $this->input->post('role', true)
        ];
        $this->db->insert($this->_table,$data);
    }

    //check if user is available or not
    public function check_account($email, $password){
        $data = array('email' => $email, 'password' => $password);
        $this->db->where($data);
        return $this->db->get($this->_table)->result_array();

    }

    public function get_user_by_id($user_id)
    {
        $this->db->where('id_user', $user_id);
        return $this->db->get($this->_table)->result_array();
    }

    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        return $this->db->get($this->_table)->result_array();
    }

    public function get_all_data()
    {
        return $this->db->get($this->_table)->result();
    }

    public function count_all_data()
    {
        return $this->db->count_all($this->_table);
    }

    public function update($id_user)
    {
        $data = [
            "email" => $this->input->post('email', true),
            "nama" => $this->input->post('nama', true),
        ];
        $this->db->where('id_user', $id_user);
        $this->db->update($this->_table, $data);
    }


    public function delete($id_user)
    {
        $is_avaible = $this->db->get_where($this->_table, ['id_user' => $id_user])->result_array();
        if(sizeof($is_avaible) > 0) {
            $this->db->where('id_user', $id_user);
            return $this->db->delete($this->_table);
        } else {
            return null;
        }
    }
}