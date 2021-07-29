<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Restaurant extends CI_Controller{
    public function __construct()
	{
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->model('model_products');
        $this->load->model('model_users');
        $this->load->model('model_company');
        $this->load->model('model_cart');
        $this->load->model('model_orders');
    }
    
    public function index(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        redirect('Restaurant/Main');
    }

    public function main(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->session->userdata('id');
        $nav['rating_row'] = $this->model_products->getRatingNumRow($id);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($id);
        $data['products'] = $this->model_products->getProductsForUser();
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/main', $data);
    }

    public function about(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->session->userdata('id');
        $nav['rating_row'] = $this->model_products->getRatingNumRow($id);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($id);
        $data['products'] = $this->model_products->getProductsForUser();
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/about', $data);
    }

    public function order(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->input->get('id', TRUE);
        $idUser = $this->session->userdata('id');
        $nav['rating_row'] = $this->model_products->getRatingNumRow($idUser);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($idUser);
        $data['company'] = $this->model_company->getCompanyDataForUser(1);
        $data['products'] = $this->model_products->getProductsByIdForUser($id);
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/order', $data);
    }

    public function filterAndSort(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->session->userdata('id');
        $result = $this->model_products->filterSortQuery();
        $nav['rating_row'] = $this->model_products->getRatingNumRow($id);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($id);
        $data['products'] = $result;
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/filSort', $data);
    }

    public function user(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->session->userdata('id');
        $nav['rating_row'] = $this->model_products->getRatingNumRow($id);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($id);
        $data['user'] = $this->model_users->getUserData($id);
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/user', $data);
    }

    public function addCart(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->input->post("productId");
        $stock = $this->input->post("productStock");
        $this->form_validation->set_rules('productName', 'Product Name', 'required');
        $this->form_validation->set_rules('productPrice', 'Product Price', 'required|greater_than[0]');
        $this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
        $this->form_validation->set_rules('grossAmount', 'Gross Amount', 'required|greater_than[0]');
        $this->form_validation->set_rules('serviceCharge', 'Service Charge', 'required|greater_than[0]');
        $this->form_validation->set_rules('vatCharge', 'Vat Charge', 'required|greater_than[0]');
        $this->form_validation->set_rules('totalAmount', 'Total Amount', 'required|greater_than[0]');
        if($this->form_validation->run() == TRUE){
            if($this->input->post("qty") <= 0 || $this->input->post("qty") > $stock){
                //echo "failed";
                $this->session->set_flashdata('errors', 'Please input the right amount of quantity!');
				redirect("Restaurant/Order?id=".$id."");
            }
            else{
                //echo "true";
                $this->model_cart->addToCartForUser();
                //echo "true again";
                $this->session->set_flashdata('success', 'Product Successfully added to cart!');
        		redirect("Restaurant/Order?id=".$id."");
            }
        }
        else{
            //echo "failed2";
            $this->session->set_flashdata('errors', 'Error occurred!!');
			redirect("Restaurant/Order?id=".$id."");
        }
    }

    public function cart(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->session->userdata('id');
        $nav['rating_row'] = $this->model_products->getRatingNumRow($id);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($id);
        $data['cart'] = $this->model_cart->getCartDataForUser($id);
        $data['company'] = $this->model_company->getCompanyDataForUser(1);
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/cart', $data);
    }

    public function deleteCart(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->input->get('id', TRUE);
        $delete = $this->model_cart->deleteCartForUser($id);
        if($delete){
            $this->session->set_flashdata('success', 'Product Successfully removed from cart!');
        	redirect("Restaurant/Cart", "refresh");
        }
        else{
            $this->session->set_flashdata('errors', 'Error occurred!!');
			redirect("Restaurant/Cart", "refresh");
        }
    }

    public function checkout(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $this->form_validation->set_rules('itemId[]', '', 'required|greater_than[0]');
        $this->form_validation->set_rules('itemPrice[]', '', 'required|greater_than[0]');
        $this->form_validation->set_rules('itemQty[]', '', 'required|greater_than[0]'); 
        $this->form_validation->set_rules('grossAmount[]', '', 'required|greater_than[0]'); 
        $this->form_validation->set_rules('itemService[]', '', 'required|greater_than[0]');
        $this->form_validation->set_rules('itemVat[]', '', 'required|greater_than[0]');
        $this->form_validation->set_rules('totalAmount[]', '', 'required|greater_than[0]');
        $this->form_validation->set_rules('serviceCharge', '', 'required|greater_than[0]');
        $this->form_validation->set_rules('vatCharge', '', 'required|greater_than[0]');
        if($this->form_validation->run() == TRUE){
            $count_product = count($this->input->post('itemId'));
            for($x = 0; $x < $count_product; $x++){
				$productId = $this->input->post('itemId')[$x];
				$productStock = $this->model_products->getProductStock($productId);
				$productCheck = $productStock[0]['stock'];
				$qty =  $this->input->post('itemQty')[$x];
				if($qty == 0 || $qty > $productCheck){
                    $name = $this->input->post('itemName')[$x];
					$this->session->set_flashdata('errors', $name.' out of stock, please remove the item from the cart!');
					redirect('Restaurant/Cart', 'refresh');
				}
            }
            $grossAmount = 0;
            $itemService = 0;
            $itemVat = 0;
            $totalAmount = 0;
            for($i = 0; $i < $count_product; $i++){
                $grossAmount = $grossAmount + $this->input->post('grossAmount')[$i];
                $itemService = $itemService + $this->input->post('itemService')[$i];
                $itemVat = $itemVat + $this->input->post('itemVat')[$i];
                $totalAmount = $totalAmount + $this->input->post('totalAmount')[$i];
            }
            $grossAmount = $grossAmount.".00";
            $itemService = $itemService.".00";
            $itemVat = $itemVat.".00";
            $totalAmount = $totalAmount.".00"; 
            $orderId = $this->model_orders->createOrderForUser($grossAmount, $itemService, $itemVat, $totalAmount);
            $this->session->set_flashdata('success', 'Order successfully created!');
        	redirect("Restaurant/OrderDetail/?id=".$orderId, "refresh");
        }
        else{
            $this->session->set_flashdata('errors', 'Error occurred!!');
			redirect("Restaurant/Cart", "refresh");
        }
    }

    public function orderDetail(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->input->get('id', TRUE);
        $idUser = $this->session->userdata('id');
        $nav['rating_row'] = $this->model_products->getRatingNumRow($idUser);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($idUser);
        $data['order'] = $this->model_orders->getOrderDataByIdForUser($id);
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/orderDetail', $data);
    }

    public function orderList(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->session->userdata('id');
        $nav['rating_row'] = $this->model_products->getRatingNumRow($id);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($id);
        $data['order'] = $this->model_orders->getOrderDataForUser($id);
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/orderList', $data);
    }

    public function rate(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $id = $this->session->userdata('id');
        $nav['rating_row'] = $this->model_products->getRatingNumRow($id);
        $nav['cart_row'] = $this->model_cart->getCartNumRow($id);
        $data['rating'] = $this->model_products->getNonRatingDataForUser($id);
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('templates/navbarUser', $nav, TRUE);
        $data['footer'] = $this->load->view('templates/footerUser', NULL, TRUE);
        $data['mainJS'] = $this->load->view('include/mainJS', NULL, TRUE);
        $data['vendor'] = $this->load->view('include/vendor', NULL, TRUE);
        $data['favicon'] = $this->load->view('include/favicon', NULL, TRUE);
        $data['vendorCSS'] = $this->load->view('include/vendorCSS', NULL, TRUE);
        $this->load->view('restaurant/rate', $data);
    }

    public function submitRate(){
        if(!$this->session->has_userdata('id')){
            redirect('Auth');
        }
        $this->form_validation->set_rules('ratingId', '', 'required|greater_than[0]');
        $this->form_validation->set_rules('rate', '', 'required|greater_than[0]');
        if($this->form_validation->run() == TRUE){
            //echo "true";
            $id = $this->input->post('ratingId');
            $this->model_products->sendRatingDataForUser($id);
            $this->session->set_flashdata('success', 'Product successfully rated!');
        	redirect("Restaurant/Rate", "refresh");
        }
        else{
            //echo "false";
            $this->session->set_flashdata('errors', 'Please rate the product before submitting!');
			redirect("Restaurant/Rate", "refresh");
        }
    }
}

?>