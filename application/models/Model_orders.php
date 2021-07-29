<?php 

class Model_orders extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_users');
		$this->load->model('model_cart');
	}

	/* Ambil data orders */
	public function getOrdersData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM orders WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$user_id = $this->session->userdata('id');
		if($user_id == 1) {
			$sql = "SELECT * FROM orders ORDER BY id DESC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		else {
			$user_data = $this->model_users->getUserData($user_id);
			return $query->result_array();	
		}
	}

	// Ambil data item orders 
	public function getOrdersItemData($order_id = null)
	{
		if(!$order_id) {
			return false;
		}

		$sql = "SELECT * FROM order_items WHERE order_id = ?";
		$query = $this->db->query($sql, array($order_id));
		return $query->result_array();
	}

	public function getOrderDataByIdForUser($id){
		$sql = "SELECT * FROM orders WHERE id = $id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getOrderDataForUser($id){
		$sql = "SELECT * FROM orders WHERE user_id = $id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create()
	{
		$user_id = $this->session->userdata('id');
		$user_data = $this->model_users->getUserData($user_id);

		$bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
    		'bill_no' => $bill_no,
    		'date_time' => strtotime(date('Y-m-d h:i:s a')),
    		'gross_amount' => $this->input->post('gross_amount_value'),
    		'service_charge_rate' => $this->input->post('service_charge_rate'),
    		'service_charge_amount' => ($this->input->post('service_charge_value') > 0) ?$this->input->post('service_charge_value'):0,
    		'vat_charge_rate' => $this->input->post('vat_charge_rate'),
    		'vat_charge_amount' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
    		'net_amount' => $this->input->post('net_amount_value') ,
    		'user_id' => $user_id,
    	);

		$insert = $this->db->insert('orders', $data);
		$order_id = $this->db->insert_id();

		$count_product = count($this->input->post('product'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'order_id' => $order_id,
    			'product_id' => $this->input->post('product')[$x],
    			'qty' => $this->input->post('qty')[$x],
    			'rate' => $this->input->post('rate_value')[$x],
    			'amount' => $this->input->post('amount_value')[$x],
			);
			$productId = $this->input->post('product')[$x];
			$qty = $this->input->post('qty')[$x];
			$this->db->query("UPDATE products SET stock = stock - '".$qty."' WHERE id = '".$productId."';");
    		$this->db->insert('order_items', $items);
		}

		return ($order_id) ? $order_id : false;
	}

	public function createOrderForUser($grossAmount, $itemService, $itemVat, $totalAmount){
		$user_id = $this->session->userdata('id');
		$bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
    		'bill_no' => $bill_no,
    		'date_time' => strtotime(date('Y-m-d h:i:s a')),
    		'gross_amount' => $grossAmount,
    		'service_charge_rate' => $this->input->post('serviceCharge'),
    		'service_charge_amount' => $itemService,
    		'vat_charge_rate' => $this->input->post('vatCharge'),
    		'vat_charge_amount' => $itemVat,
    		'net_amount' => $totalAmount,
    		'user_id' => $user_id
		);
		
		$insert = $this->db->insert('orders', $data);
		$order_id = $this->db->insert_id();

		$count_product = count($this->input->post('itemId'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'order_id' => $order_id,
    			'product_id' => $this->input->post('itemId')[$x],
    			'qty' => $this->input->post('itemQty')[$x],
    			'rate' => $this->input->post('itemPrice')[$x],
    			'amount' => $this->input->post('grossAmount')[$x],
			);
			$rate = array(
				'product_id' => $this->input->post('itemId')[$x],
				'user_id' => $this->session->userdata('id'),
				'status' => 0,
				'score' => 0
			);
			$cartId = $this->input->post('cartId')[$x];
			$productId = $this->input->post('itemId')[$x];
			$qty = $this->input->post('itemQty')[$x];
			$this->db->query("UPDATE products SET stock = stock - '".$qty."' WHERE id = '".$productId."';");
			$this->db->insert('order_items', $items);
			$this->db->insert('rating', $rate);
			$this->model_cart->deleteCartForUser($cartId);
		}

		return $order_id;
	}

	public function countOrderItem($order_id)
	{
		if($order_id) {
			$sql = "SELECT * FROM order_items WHERE order_id = ?";
			$query = $this->db->query($sql, array($order_id));
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			$user_data = $this->model_users->getUserData($user_id);

			$data = array(
	    		'gross_amount' => $this->input->post('gross_amount_value'),
	    		'service_charge_rate' => $this->input->post('service_charge_rate'),
	    		'service_charge_amount' => ($this->input->post('service_charge_value') > 0) ?$this->input->post('service_charge_value'):0,
	    		'vat_charge_rate' => $this->input->post('vat_charge_rate'),
	    		'vat_charge_amount' => ($this->input->post('vat_charge_value') > 0) ? $this->input->post('vat_charge_value') : 0,
	    		'net_amount' => $this->input->post('net_amount_value'),
	    		'user_id' => $user_id,
	    	);

			$this->db->where('id', $id);
			$update = $this->db->update('orders', $data);

			// Menghapus data item order  
			$this->db->where('order_id', $id);
			$this->db->delete('order_items');

			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    			'order_id' => $id,
	    			'product_id' => $this->input->post('product')[$x],
	    			'qty' => $this->input->post('qty')[$x],
	    			'rate' => $this->input->post('rate_value')[$x],
	    			'amount' => $this->input->post('amount_value')[$x],
				);
				$productId = $this->input->post('product')[$x];
				$qty = $this->input->post('qty')[$x];
				$qtyBefore = $this->input->post('qtyHidden')[$x];
				if($qty > $qtyBefore){
					$qtyUpdate = $qty - $qtyBefore;
				}
				else{
					$qtyUpdate = $qtyBefore - $qty;
				}
				$this->db->query("UPDATE products SET stock = stock - '".$qtyUpdate."' WHERE id = '".$productId."';");
	    		$this->db->insert('order_items', $items);
	    	}

	    	
	    	

			return true;
		}
	}



	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('orders');

			$this->db->where('order_id', $id);
			$delete_item = $this->db->delete('order_items');
			return ($delete == true && $delete_item) ? true : false;
		}
	}

	public function countTotalPaidOrders()
	{
		$sql = "SELECT * FROM orders";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

}