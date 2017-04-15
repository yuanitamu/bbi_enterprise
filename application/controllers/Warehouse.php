<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(empty($this->session->userdata('luna'))){
			redirect('authentication');
		}
	}

	public function stok()
	{
		$this->load->model('bahandao');
		$this->load->model('produkdao');
		$data = array();
		$data['title'] = 'Luna | Admin Group';
		$data['nav'] = 'Stok';
		$data['nav_parent'] = 'Warehouse';
		$data['nav_desc'] = 'Warehouse Page Luna CMS';
		$data['bahan'] = $this->bahandao->get_all();
		$data['produk'] = $this->produkdao->get_all();

		$this->template->load('template/template', 'warehouse/stok', $data);
	}

	public function input_stok_produk($id='')
	{
		$this->load->model('produkdao');

		$data = array();
		$data['title'] = 'Luna | Admin Group';
		$data['nav'] = 'Group';
		$data['nav_parent'] = 'System';
		$data['nav_desc'] = 'Group Page Luna CMS';
		$data['produk'] = $this->produkdao->get_by_id($id);
		
		if(empty($id)){
			//add new data
			$this->template->load('template/template', 'warehouse/input_stok_produk', $data);
		}else{
			//edit data with id
			$this->template->load('template/template', 'warehouse/edit_stok_produk', $data);
		}
	}

	public function add_stok_produk()
	{
		$this->load->model('produkdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_messageP', warn_msg(validation_errors()));
           	redirect('warehouse/input_stok_produk');
        } else {
        	$input = $this->produkdao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_messageP',succ_msg('Success save data'));
				redirect('warehouse/stok');
        	}else{
        		$this->session->set_flashdata('flash_messageP',err_msg('Failed to save data'));
				redirect('warehouse/input_stok_produk');
        	}
        }
	}

	public function edit_stok_produk($id='')
	{
		$this->load->model('produkdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_messageP', warn_msg(validation_errors()));
           	redirect('warehouse/input_stok_produk/'.$id);
        } else {
        	$edit = $this->produkdao->update($id,$param);
        	if($edit == true){
        		$this->session->set_flashdata('flash_messageP',succ_msg('Success save data'));
				redirect('warehouse/stok');
        	}else{
        		$this->session->set_flashdata('flash_messageP',err_msg('Failed to save data'));
				redirect('warehouse/input_stok_produk/'.$id);
        	}
        }
	}

	public function delete_stok_produk()
	{
		$this->load->model('produkdao');
		
		$id = $this->input->post('id');

		$delete = $this->produkdao->delete($id);
		if($delete == true){
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}

	public function input_stok_bahan($id='')
	{
		$this->load->model('bahandao');

		$data = array();
		$data['title'] = 'Luna | Admin Group';
		$data['nav'] = 'Group';
		$data['nav_parent'] = 'System';
		$data['nav_desc'] = 'Group Page Luna CMS';
		$data['bahan'] = $this->bahandao->get_by_id($id);
		
		if(empty($id)){
			//add new data
			$this->template->load('template/template', 'warehouse/input_stok_bahan', $data);
		}else{
			//edit data with id
			$this->template->load('template/template', 'warehouse/edit_stok_bahan', $data);
		}
	}

	public function add_stok_bahan()
	{
		$this->load->model('bahandao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_messageB', warn_msg(validation_errors()));
           	redirect('warehouse/input_stok_bahan');
        } else {
        	$input = $this->bahandao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_messageB',succ_msg('Success save data'));
				redirect('warehouse/stok');
        	}else{
        		$this->session->set_flashdata('flash_messageB',err_msg('Failed to save data'));
				redirect('warehouse/input_stok_bahan');
        	}
        }
	}

	public function edit_stok_bahan($id='')
	{
		$this->load->model('bahandao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok Produk', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_messageB', warn_msg(validation_errors()));
           	redirect('warehouse/input_stok_bahan/'.$id);
        } else {
        	$edit = $this->bahandao->update($id,$param);
        	if($edit == true){
        		$this->session->set_flashdata('flash_messageB',succ_msg('Success save data'));
				redirect('warehouse/stok');
        	}else{
        		$this->session->set_flashdata('flash_messageB',err_msg('Failed to save data'));
				redirect('warehouse/input_stok_bahan/'.$id);
        	}
        }
	}

	public function delete_stok_bahan()
	{
		$this->load->model('bahandao');
		
		$id = $this->input->post('id');

		$delete = $this->bahandao->delete($id);
		if($delete == true){
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}

	public function bahan()
	{
		$this->load->model('bahandao');
		$data = array();
		$data['title'] = 'Luna | Admin Group';
		$data['nav'] = 'Bahan';
		$data['nav_parent'] = 'Warehouse';
		$data['nav_desc'] = 'Warehouse Page Luna CMS';
		$data['bahan'] = $this->bahandao->get_all();

		$this->template->load('template/template', 'warehouse/bahan', $data);
	}

	public function request_bahan($value='')
	{
		$this->load->model('requestdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Produk', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('warehouse/bahan');
        } else {
        	$input = $this->requestdao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('warehouse/bahan');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('warehouse/bahan');
        	}
        }
	}

	public function produksi()
	{
		$this->load->model('produkdao');
		$data = array();
		$data['title'] = 'Luna | Admin Group';
		$data['nav'] = 'Produksi';
		$data['nav_parent'] = 'Warehouse';
		$data['nav_desc'] = 'Warehouse Page Luna CMS';
		$data['produk'] = $this->produkdao->get_all();

		$this->template->load('template/template', 'warehouse/produksi', $data);
	}

	public function request_produksi($value='')
	{
		$this->load->model('requestdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Produk', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('warehouse/produksi');
        } else {
        	$input = $this->requestdao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('warehouse/produksi');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('warehouse/produksi');
        	}
        }
	}
}