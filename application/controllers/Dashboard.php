<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('Auth');
		}

	}

	public function index()
	{
		$this->template->load('template','dashboard');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}


}	