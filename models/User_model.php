<?php 

class User_model extends CI_Model{
    //create account user
    public function create_account(){
        $data = [
            "id_user" => $this->input->post('id_user',true),
            "nama"   => $this->input->post('nama',true),
            "email"  => $this->input->post('email',true),
            "password" => $this->input->post('password',true)
        ];
        $this->db->insert('user',$data);
    }

    //check if id_user is available or not
    public function check_account($id_user,$password){

        $data = array('id_user' => $id_user, 'password' => $password);
        $this->db->where($data);
        return $this->db->get('user')->result_array();

    }
}


?>