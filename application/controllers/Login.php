<?php

class Login extends MY_Controller 
{
	public function index()
		{
			if($this->session->userdata('id'))
			{ // if user is login this condition return him on dashboard not on login page again
				return redirect('index.php/admin/dashboard');
			} 
			$this->load->helper('form');
			$this->load->view('public/admin_login');
		}

	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname','User Name','required|alpha');
		$this->form_validation->set_rules('pass','Password','required');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run())
		{
			$username = $this->input->post('uname');
			$password = $this->input->post('pass');
			//echo "Username: $username and Password: $password";

			$this->load->model('login_model','login');

			$login_id = $this->login->valid_login($username,$password);
			if($login_id)
			{
				
				$this->session->set_userdata('id',$login_id);

				return redirect('index.php/admin/dashboard');
				//authenticaiton valid
			}
			else
			{
				$this->session->set_flashdata('login_failed','Invalid Username/password'); // if username of password is incorrect display alert
				return redirect('index.php/login');
				//authentication InValid
			}
		}
	else
	{
		$this->load->view('public/admin_login');
		// echo "Failed";
		//  echo validation_errors();
	}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		return redirect('index.php/login');
	}
}