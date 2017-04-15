<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(empty($this->session->userdata('luna'))){
			redirect('authentication');
		}
	}

	public function index()
	{
		$data = array();
		$data['title'] = 'Luna | Admin Dashboard';
		$data['nav'] = 'Dashboard';
		$data['nav_desc'] = 'Home Page Luna CMS';

		$this->template->load('template/template', 'dashboard', $data);
	}
}
