<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(empty($this->session->userdata('luna'))){
			redirect('authentication');
		}
	}

	public function validasi()
	{
		$this->load->model('keuangandao');

		$data = array();
		$data['title'] = 'Luna | Admin Dashboard';
		$data['nav'] = 'Validasi';
		$data['nav_parent'] = 'Accounting';
		$data['nav_desc'] = 'Home Page Accounting Validasi';
		$data['keuangan'] = $this->keuangandao->get_by_validasi('0');

		$this->template->load('template/template', 'accounting/validasi', $data);
	}

	public function validasi_pembayaran()
	{
		$this->load->model('keuangandao');
		$id = $this->input->post('id');
		$edit = $this->keuangandao->update_validasi($id);
        if($edit == true){
        	echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}

	public function laporan()
	{
		$this->load->model('keuangandao');

		$data = array();
		$data['title'] = 'Luna | Admin Dashboard';
		$data['nav'] = 'Laporan';
		$data['nav_parent'] = 'Accounting';
		$data['nav_desc'] = 'Home Page Accounting Laporan';
		$data['keuangan'] = $this->keuangandao->get_by_validasi('1');

		$this->template->load('template/template', 'accounting/laporan', $data);
	}
}