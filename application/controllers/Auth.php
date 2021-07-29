<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('model_auth');
		$this->load->model('model_users');
		$this->load->model('model_groups');
	}

	public function index()
	{

		if(!in_array('viewUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			$group = $this->model_users->getUserGroup($v['id']);
			$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;

		$this->render_template('users/index', $this->data);
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	/* 
		Register
	*/
	public function regis()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'First name', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->password_hash($this->input->post('password'));
        	$data = array(
        		'username' => $this->input->post('username'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('firstname'),
				'birthday' => $this->input->post('birthday'),
        		'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'profile_picture' => 'assets/images/user_image/default.jpg'
        	);
			
    		$create = $this->model_auth->create($data, $this->input->post('groups'));
        	if($create == true) {
				$this->session->set_flashdata('success', 'Successfully created');
				$login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));
        		$logged_in_sess = array(
					'id' => $login['id'],
					'username'  => $login['username'],
					'email'     => $login['email'],
					'picture'   => $login['profile_picture'],
					'logged_in' => TRUE
				);

				 $this->session->set_userdata($logged_in_sess);
				redirect('restaurant', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('auth/regis', 'refresh');
        	}
        	
        }
        else {
			//false case
            $this->load->view('logreg/regis');
        }	
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{

		$this->logged_in();

		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
           	$email_exists = $this->model_auth->check_email($this->input->post('email'));

           	if($email_exists == TRUE) {
           		$login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));

           		if($login) {

           			$logged_in_sess = array(
           				'id' => $login['id'],
				        'username'  => $login['username'],
						'email'     => $login['email'],
						'picture'   => $login['profile_picture'],
				        'logged_in' => TRUE
					);

					$this->session->set_userdata($logged_in_sess);
					$group = $this->model_groups->getUserGroupByUserId($login['id']);
					foreach($group as $check){
						if($check == 1 || $check == 5){
							redirect('dashboard', 'refresh');
						}
						else{
							redirect('restaurant', 'refresh');
						}
					}
           		}
           		else {
           			$this->data['errors'] = 'Incorrect username/password combination';
           			$this->load->view('logreg/login', $this->data);
           		}
           	}
           	else {
           		$this->data['errors'] = 'Email does not exists';

           		$this->load->view('logreg/login', $this->data);
           	}	
        }
        else {
            // false case
            $this->load->view('logreg/login');
        }	
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login', 'refresh');
	}

}
