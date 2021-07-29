<?php 

class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_users');
	}

	/* Ambil data product */
	public function getProductData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM products where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}	

		$user_id = $this->session->userdata('id');
		if($user_id == 1) {
			$sql = "SELECT * FROM products ORDER BY id DESC";
			$query = $this->db->query($sql);
			return $query->result_array(); 
		}
		else {
			
			$user_data = $this->model_users->getUserData($user_id);
			$sql = "SELECT * FROM products ORDER BY id DESC";
			$query = $this->db->query($sql);

			$data = array();

			return $data;		
		}
	}

	/* Ambil data product */
	public function getProductDataByCat($cat_id = null)
	{
		if($cat_id) {

			$user_id = $this->session->userdata('id');
			if($user_id == 1) {
				$sql = "SELECT * FROM products ORDER BY id DESC";
				$query = $this->db->query($sql);
				$result = array();
				foreach($query->result_array() as $key => $value) {
					$category_ids = json_decode($value['category_id']);
					if(in_array($cat_id, $category_ids)) {
						$result[] = $value;
					}
				} 

				return $result;
			}
			else {

				$user_data = $this->model_users->getUserData($user_id);

				$sql = "SELECT * FROM products ORDER BY id DESC";
				$query = $this->db->query($sql);

				$data = array();

				return $data;		


			}
		}	
	}

	public function getActiveProductData()
	{
		$user_id = $this->session->userdata('id');

		if($user_id == 1) {
			$sql = "SELECT * FROM products WHERE active = ? ORDER BY id DESC";
			$query = $this->db->query($sql, array(1));
			return $query->result_array();
		}
		else {
			$this->load->model('model_users');
			$user_data = $this->model_users->getUserData($user_id);
			$sql = "SELECT * FROM products WHERE active = ? ORDER BY id DESC";
			$query = $this->db->query($sql, array(1));

			return $query->result_array();			
		}
	}

	public function getProductStock($id){
		$sql = "SELECT stock FROM products WHERE id = $id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getProductsForUser(){
		$sql = "SELECT * FROM products WHERE active = 1 ORDER BY id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getProductsByIdForUser($id){
		$sql = "SELECT * FROM products WHERE id = $id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function filterSortQuery(){
		$minPrice = $this->input->get('minPrice');
		$maxPrice = $this->input->get('maxPrice');
		$sort = $this->input->get('sort');
		$search = $this->input->get('search');
		$searchSql = "%".$search."%";
		$sql = "SELECT * FROM products WHERE active = 1";

		if($search != null){
			$sql .= " AND name LIKE '".$searchSql."'";
		}

		if($minPrice != null){
			$sql .= " AND price >= $minPrice";
		}

		if($maxPrice != null){
			$sql .= " AND price <= $maxPrice";
		}

		if(isset($sort)){
			if($sort == 1){
				$sql .= "  ORDER BY CAST(price AS DECIMAL(10,2)) DESC;";
			}
			else if($sort == 2){
				$sql .= " ORDER BY CAST(price AS DECIMAL(10,2)) ASC;";
			}
			else if($sort == 3){
				$sql .= " ORDER BY name ASC;";
			}
		}

		$query = $this->db->query($sql);
		$result = array();
		
		if($this->input->get('kategori', TRUE) != null){
			echo "true";
			$count = count($this->input->get('kategori'));
			if($count != 0){
				foreach($query->result_array() as $key => $value) {
					$category_ids = json_decode($value['category_id']);
					for($i = 0; $i < $count ; $i++){
						$filter = $this->input->get('kategori', TRUE)[$i];
						if(in_array($filter, $category_ids)) {
							$result[] = $value;
						}
					}
				} 
			}
		}
		else{
			return $query->result_array();
		}
		return $result;
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('products', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('products', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->model_products->removeRating($id);
			$this->model_products->removeCart($id);
			$this->db->where('id', $id);
			$delete = $this->db->delete('products');
			return ($delete == true) ? true : false;
		}
	}

	public function removeCart($id){
		$this->db->where('item_id', $id);
		$delete = $this->db->delete('cart');
	}

	public function removeRating($id){
		$this->db->where('product_id', $id);
		$delete = $this->db->delete('rating');
	}

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function getNonRatingDataForUser($id){
		$sql = "SELECT * FROM rating WHERE user_id = $id AND status = 0";
		$query = $this->db->query($sql);
		return $query->result_array();	
	}

	public function sendRatingDataForUser($id){
		$score = $this->input->post('rate');
		$sql = "UPDATE rating SET score = $score, status = 1 WHERE id = $id";
		$query = $this->db->query($sql);
		return ($query == true) ? true : false; 
	}

	public function getRatingDataForProduct($id){
		$sql = "SELECT * FROM rating WHERE product_id = $id AND status = 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getRatingNumRow($id){
		$sql = "SELECT * FROM rating WHERE user_id = $id AND status = 0";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

}