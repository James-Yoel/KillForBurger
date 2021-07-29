<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cart extends CI_Model{
    public function __construct()
	{
		parent::__construct();
    }
    
    public function addToCartForUser(){
        $data = array(
            'item_id' => $this->input->post('productId'),
            'price' => $this->input->post('productPrice'),
            'qty' => $this->input->post('qty'),
            'gross_amount' => $this->input->post('grossAmount'),
            'service_charge' => $this->input->post('serviceCharge'),
            'vat_charge' => $this->input->post('vatCharge'),
            'total_amount' => $this->input->post('totalAmount'),
            'user_id' => $this->session->userdata('id')
        );
        $insert = $this->db->insert('cart', $data);
        return true;
    }

    public function getCartDataForUser($id){
        $sql = "SELECT * FROM cart WHERE user_id = $id;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function deleteCartForUser($id){
        $this->db->where('id', $id);
		$delete = $this->db->delete('cart');
		return ($delete == true) ? true : false;
    }

    public function getCartNumRow($id){
        $sql = "SELECT * FROM cart WHERE user_id = $id;";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}
?>