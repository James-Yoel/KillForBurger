<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->not_logged_in();
		
		$this->data['page_title'] = 'Users';
		

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

	public function create()
	{

		if(!in_array('createUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('groups', 'Group', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');
		

        if ($this->form_validation->run() == TRUE) {
            // true case
			$password = $this->password_hash($this->input->post('password'));
			$upload_image = $this->upload_image();
        	$data = array(
        		'username' => $this->input->post('username'),
        		'password' => $password,
        		'email' => $this->input->post('email'),
        		'firstname' => $this->input->post('fname'),
				'lastname' => $this->input->post('lname'),
				'birthday' => $this->input->post('birthday'),
        		'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'profile_picture' => $upload_image
        	);

        	$create = $this->model_users->create($data, $this->input->post('groups'));
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('users/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/create', 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->model_groups->getGroupData();
        	$this->data['group_data'] = $group_data;

            $this->render_template('users/create', $this->data);
        }	

		
	}

	public function upload_image()
    {
    	
        $config['upload_path'] = 'assets/images/user_image';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('profile_picture'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['profile_picture']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function edit($id = null)
	{

		if(!in_array('updateUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
			$this->form_validation->set_rules('groups', 'Group', 'required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
				// true case
				if($_FILES['profile_picture']['size'] > 0) {
					$upload_image = $this->upload_image();
					$upload = array('profile_picture' => $upload_image);
					
					$this->model_users->edit($upload, $id, $this->input->post('groups'));
				}
		        if(null==($this->input->post('password')) && null==($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'firstname' => $this->input->post('fname'),
						'lastname' => $this->input->post('lname'),
						'birthday' => $this->input->post('birthday'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender')
		        	);

		        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
							'password' => $password,
							'email' => $this->input->post('email'),
							'firstname' => $this->input->post('fname'),
							'lastname' => $this->input->post('lname'),
							'birthday' => $this->input->post('birthday'),
							'phone' => $this->input->post('phone'),
							'gender' => $this->input->post('gender')
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/edit', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	$groups = $this->model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/edit', $this->data);	
	        }	
		}	
	}

	public function delete($id)
	{

		if(!in_array('deleteUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
			if($this->input->post('confirm')) {

				
					$delete = $this->model_users->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/delete', $this->data);
			}	
		}
	}

	public function profile()
	{

		if(!in_array('viewProfile', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$user_id = $this->session->userdata('id');

		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;

		$user_group = $this->model_users->getUserGroup($user_id);
		$this->data['user_group'] = $user_group;

        $this->render_template('users/profile', $this->data);
	}

	public function editForUser(){
		$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				// true case
				if($_FILES['profile_picture']['size'] > 0) {
					$upload_image = $this->upload_image();
					$upload = array('profile_picture' => $upload_image);
					
					$this->model_users->edit($upload, $id, $this->input->post('groups'));
				}
		        if(null==($this->input->post('password')) && null==($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'firstname' => $this->input->post('fname'),
						'lastname' => $this->input->post('lname'),
						'birthday' => $this->input->post('birthday'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender')
		        	);

		        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
		        	if($update == true) {
						$user = $this->model_users->getUserData($id);
						$logged_in_sess = array(
							'id' => $id,
							'username'  => $user['username'],
							'email'     => $user['email'],
							'picture'   => $user['profile_picture'],
							'logged_in' => TRUE
						);
						$this->session->set_userdata($logged_in_sess);
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('Restaurant/User', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('Restaurant/User', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
							'password' => $password,
							'email' => $this->input->post('email'),
							'firstname' => $this->input->post('fname'),
							'lastname' => $this->input->post('lname'),
							'birthday' => $this->input->post('birthday'),
							'phone' => $this->input->post('phone'),
							'gender' => $this->input->post('gender')
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
							$user = $this->model_users->getUserData($id);
							$logged_in_sess = array(
								'id' => $id,
								'username'  => $user['username'],
								'email'     => $user['email'],
								'picture'   => $user['profile_picture'],
								'logged_in' => TRUE
							);
						 	$this->session->set_userdata($logged_in_sess);
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('Restaurant/User', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('Restaurant/User', 'refresh');
			        	}
					}
		        }
	        }
		}
		else{
			redirect('Auth');
		}
	}

	public function setting()
	{
		if(!in_array('updateSetting', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
				// true case
				if($_FILES['profile_picture']['size'] > 0) {
					$upload_image = $this->upload_image();
					$upload = array('profile_picture' => $upload_image);
					
					$this->model_users->edit($upload, $id, $this->input->post('groups'));
				}
		        if(null==($this->input->post('password')) && null==($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'firstname' => $this->input->post('fname'),
						'lastname' => $this->input->post('lname'),
						'birthday' => $this->input->post('birthday'),
						'phone' => $this->input->post('phone'),
						'gender' => $this->input->post('gender')
		        	);

		        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/setting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/setting/', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
							'password' => $password,
							'email' => $this->input->post('email'),
							'firstname' => $this->input->post('fname'),
							'lastname' => $this->input->post('lname'),
							'birthday' => $this->input->post('birthday'),
							'phone' => $this->input->post('phone'),
							'gender' => $this->input->post('gender')
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/setting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/setting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/setting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	$groups = $this->model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/setting', $this->data);	
	        }	
		}
	}


}