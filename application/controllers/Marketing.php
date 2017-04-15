<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(empty($this->session->userdata('luna'))){
			redirect('authentication');
		}
	}

	public function customer()
	{
		$this->load->model('customerdao');

		$data = array();
		$data['title'] = 'Luna | Admin Dashboard';
		$data['nav'] = 'Customer';
		$data['nav_parent'] = 'Marketing';
		$data['nav_desc'] = 'Home Page Marketing Customer';
		$data['cust'] = $this->customerdao->get_all();

		$this->template->load('template/template', 'marketing/cust_index', $data);
	}

	public function cust_input($id='')
	{
		$this->load->model('customerdao');

		$data = array();
		$data['title'] = 'Luna | Admin Dashboard';
		$data['nav'] = 'Customer';
		$data['nav_parent'] = 'Marketing';
		$data['nav_desc'] = 'Home Page Marketing Customer';
		$data['cust'] = $this->customerdao->get_by_id($id);
		
		if(empty($id)){
			//add new data
			$this->template->load('template/template', 'marketing/cust_input', $data);
		}else{
			//edit data with id
			$this->template->load('template/template', 'marketing/cust_edit', $data);
		}
	}

	public function cust_add()
	{
		$this->load->model('customerdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('marketing/cust_input');
        } else {
        	$input = $this->customerdao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('marketing/customer');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('marketing/cust_input');
        	}
        }
	}

	public function cust_edit($id='')
	{
		$this->load->model('customerdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('marketing/cust_input/'.$id);
        } else {
        	$edit = $this->customerdao->update($id,$param);
        	if($edit == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('marketing/customer');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('marketing/cust_input/'.$id);
        	}
        }
	}

	public function cust_delete()
	{
		$this->load->model('customerdao');
		
		$id = $this->input->post('id');

		$delete = $this->customerdao->delete($id);
		if($delete == true){
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}

	public function pemesanan()
	{
		$this->load->model('produkdao');
		$this->load->model('customerdao');
		$data = array();
		$data['title'] = 'Luna | Admin Dashboard';
		$data['nav'] = 'Pemesanan';
		$data['nav_parent'] = 'Marketing';
		$data['nav_desc'] = 'Home Page Marketing Pemesanan';
		$data['produk'] = $this->produkdao->available();
		$data['cust'] = $this->customerdao->get_all();

		$this->template->load('template/template', 'marketing/pemesanan', $data);
	}

	public function pemesanan_add()
	{
		$this->load->model('invoicedao');
		$this->load->model('stokmodel');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('customer', 'Custmoer', 'required');
		$this->form_validation->set_rules('produk', 'Produk', 'required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required');
		$this->form_validation->set_rules('total', 'total', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('marketing/pemesanan');
        } else {
        	$stok = $this->stokmodel->stok_produk($param['produk']);
        	if($param['produk'] <= $stok[0]->stok){
        		$this->session->set_flashdata('flash_message',warn_msg('Stok not enough'));
				redirect('marketing/pemesanan');
        	}else{
        		$input = $this->invoicedao->insert($param);
        		if($input == true){
        			$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
					redirect('marketing/pemesanan');
        		}else{
        			$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
					redirect('marketing/pemesanan');
        		}
        	}
        }
	}

	public function pembayaran()
	{
		$this->load->model('invoicedao');
		$data = array();
		$data['title'] = 'Luna | Admin Dashboard';
		$data['nav'] = 'Pembayaran';
		$data['nav_parent'] = 'Marketing';
		$data['nav_desc'] = 'Home Page Marketing Pembayaran';
		$data['invoice'] = $this->invoicedao->get_all();

		$this->template->load('template/template', 'marketing/pembayaran', $data);
	}

	public function pembayaran_edit($id='')
	{
		$this->load->model('invoicedao');
		$this->load->model('stokmodel');

		$data = $this->invoicedao->get_by_id($id);
		// print_r($data[0]->jumlah);exit;
		$edit = $this->invoicedao->update_status($id);
        if($edit == true){
        	$this->laporan($data);
        	$this->stokmodel->marketing_out($data[0]->produk,$data[0]->jumlah);
        	$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
			redirect('marketing/pembayaran');
        }else{
        	$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
			redirect('marketing/pembayaran/');
        }
	}

	public function pembayaran_delete()
	{
		$this->load->model('invoicedao');
		
		$id = $this->input->post('id');

		$delete = $this->invoicedao->delete($id);
		if($delete == true){
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}

	public function laporan($value='')
	{
		$this->load->model('keuangandao');
		// print_r($value[0]->total);exit;
		$data['divisi'] = 'M/S';
		$data['total'] = $value[0]->total;
		$data['keperluan'] = 'Penjualan Produk';
		$data['status'] = 0;
		$data['validasi'] = 0;

		$insert = $this->keuangandao->insert($data);
	}
}
