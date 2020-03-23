<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('login');
	}


	public function authentication()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == false){
			redirect('Auth');
		}else{

			$username = htmlspecialchars($this->input->post('username'),true);
			$password = htmlspecialchars($this->input->post('password'),true); 

			$cek = $this->db->get_where('admin',['username' => $username])->row_array();
			if($cek['username'] == $username){
				if($password == $cek['password']){
					$data = [
						'email' => $cek['email'],
						'username' => $username
					];
					$this->session->set_userdata($data);
					redirect('Dashboard');
				}else{
					redirect('Auth');
				}
			}else{
				redirect('Auth');
			}
		}
	}




}
