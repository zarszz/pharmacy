<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model{

    protected $_table_cart = 'cart';

    protected $_table_user = 'user';

    public function delete_item_cart($id_cart){
        $is_avaible = $this->db->get_where($this->_table_cart, ['id_cart' => $id_cart])->result_array();
        if(sizeof($is_avaible) > 0) {
            $obat = $this->Obat_model->get_obat_by_id($is_avaible[0]['id_obat']);
            $current_stock_obat = intval($obat['stok']) + 1;
            $this->Obat_model->update_stock($obat['id_obat'], $current_stock_obat);
            $this->db->where('id_cart', $id_cart);
            return $this->db->delete($this->_table_cart);
        } else {
            return null;
        }

    }

    public function item_have_paid($id_user){
        $is_avaible = $this->db->get_where($this->_table_cart, ['id_user' => $id_user])->result_array();
        if(sizeof($is_avaible) > 0) {
            $this->db->where('id_user', $id_user);
            return $this->db->delete($this->_table_cart);
        } else {
            return null;
        }

    }

    public function show_user_cart($id_user){

            return $this->db->get_where($this->_table_cart, ['id_user' => $id_user])->result_array();
    }

    public function cart_transaction($sisa,$id_user){
        $is_avaible = $this->db->get_where($this->_table_user, ['id_user' => $id_user])->result_array();
        if(sizeof($is_avaible) > 0) {
            $data = [
                "saldo" => $sisa

        ];
            $this->db->where('id_user', $id_user);
            return $this->db->update($this->_table_user,$data);
        } else {
            return null;
        }

    }

    public function get_all_cart()
    {
        return $this->db->get($this->_table_cart)->result_array();
    }

    public function count_all_data()
    {
        return $this->db->count_all($this->_table_cart);
    }

}
?>