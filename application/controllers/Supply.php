<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supply extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(empty($this->session->userdata('luna'))){
			redirect('authentication');
		}
	}

	public function laporan()
	{
		$this->load->model('requestdao');

		$data = array();
		$data['title'] = 'Luna | Admin Supply';
		$data['nav'] = 'Laporan';
		$data['nav_parent'] = 'Supply';
		$data['nav_desc'] = 'Supply Page Luna CMS';
		$data['supply'] = $this->requestdao->get_by_cat('2');

		$this->template->load('template/template', 'supply/laporan', $data);
	}

	public function pembelian()
	{
		$this->load->model('pembeliandao');

		$data = array();
		$data['title'] = 'Luna | Admin Supply';
		$data['nav'] = 'Pembelian';
		$data['nav_parent'] = 'Supply';
		$data['nav_desc'] = 'Supply Page Luna CMS';
		$data['pembelian'] = $this->pembeliandao->get_all();

		$this->template->load('template/template', 'supply/pembelian', $data);
	}

	public function input_pembelian()
	{
		$this->load->model('supplierdao');
		$data = array();
		$data['title'] = 'Luna | Admin Supply';
		$data['nav'] = 'Pembelian';
		$data['nav_parent'] = 'Supply';
		$data['nav_desc'] = 'Supply Page Luna CMS';
		$data['supplier'] = $this->supplierdao->get_all();

		$this->template->load('template/template', 'supply/input_pembelian', $data);
	}

	public function add_pembelian()
	{
		$this->load->model('pembeliandao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Barang', 'required');
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('supply/input_pembelian');
        } else {
        	$input = $this->pembeliandao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('supply/pembelian');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('supply/input_pembelian');
        	}
        }
	}

	public function tender()
	{

		$data = array();
		$data['title'] = 'Luna | Admin Supply';
		$data['nav'] = 'OpenTender';
		$data['nav_parent'] = 'Supply';
		$data['nav_desc'] = 'Supply Page Luna CMS';

		$this->template->load('template/template', 'supply/tender', $data);
	}

	public function add_tender()
	{
		$this->load->model('opentenderdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama Barang', 'required');
		$this->form_validation->set_rules('start', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('end', 'Waktu Berakhir', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('supply/tender');
        } else {
        	$input = $this->opentenderdao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('supply/tender');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('supply/tender');
        	}
        }
	}

	public function penawaran()
	{
		$this->load->model('penawarandao');
		$data = array();
		$data['title'] = 'Luna | Admin Supply';
		$data['nav'] = 'Penawaran';
		$data['nav_parent'] = 'Supply';
		$data['nav_desc'] = 'Supply Page Luna CMS';
		$data['penawaran'] = $this->penawarandao->get_all();

		$this->template->load('template/template', 'supply/penawaran', $data);
	}

	public function input_penawaran()
	{
		$this->load->model('supplierdao');
		$this->load->model('opentenderdao');
		$data = array();
		$data['title'] = 'Luna | Admin Supply';
		$data['nav'] = 'Penawaran';
		$data['nav_parent'] = 'Supply';
		$data['nav_desc'] = 'Supply Page Luna CMS';
		$data['supplier'] = $this->supplierdao->get_all();
		$data['tender'] = $this->opentenderdao->get_by_status('0');

		$this->template->load('template/template', 'supply/input_penawaran', $data);
	}

	public function add_penawaran()
	{
		$this->load->model('penawarandao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('tender', 'Nama Tender', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('supply/input_penawaran');
        } else {
        	$input = $this->penawarandao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('supply/penawaran');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('supply/input_penawaran');
        	}
        }
	}

	public function validasi_penawaran($id='',$tender='')
	{
		$this->load->model('penawarandao');
		$data = $this->penawarandao->get_by_id($id);
		$validate = $this->penawarandao->validasi($id,$tender);
        if($validate == true){
        	$this->laporan_keuangan($data);
        	$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
			redirect('supply/penawaran');
        }else{
        	$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
			redirect('supply/penawaran/');
        }
	}

	public function validasi($value='')
	{
		$this->load->model('requestdao');
		$this->load->model('stokmodel');
		
		$id = $this->input->post('id');
		$data = $this->requestdao->get_by_id($id);

		$update = $this->requestdao->update_status($id,'2');
		if($update == true){
			$this->stokmodel->supply_in($data[0]->nama,$data[0]->jumlah);
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}

	public function supplier()
	{
		$this->load->model('supplierdao');

		$data = array();
		$data['title'] = 'Luna | Admin Supply';
		$data['nav'] = 'Supply';
		$data['nav_parent'] = 'Supply';
		$data['nav_desc'] = 'Supply Page Luna CMS';
		$data['supplier'] = $this->supplierdao->get_all();

		$this->template->load('template/template', 'supply/index_supplier', $data);
	}

	public function input_supplier($id='')
	{
		$this->load->model('supplierdao');

		$data = array();
		$data['title'] = 'Luna | Admin Supplier';
		$data['nav'] = 'Supplier';
		$data['nav_parent'] = 'System';
		$data['nav_desc'] = 'Supplier Page Luna CMS';
		$data['supplier'] = $this->supplierdao->get_by_id($id);
		
		if(empty($id)){
			//add new data
			$this->template->load('template/template', 'supply/input_supplier', $data);
		}else{
			//edit data with id
			$this->template->load('template/template', 'supply/edit_supplier', $data);
		}
	}

	public function add_supplier()
	{
		$this->load->model('supplierdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
		$this->form_validation->set_rules('kordinator', 'Kordinator Supplier', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon Supplier', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('supply/input_supplier');
        } else {
        	$input = $this->supplierdao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('supply/supplier');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('supply/input_supplier');
        	}
        }
	}

	public function edit_supplier($id='')
	{
		$this->load->model('supplierdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
		$this->form_validation->set_rules('kordinator', 'Kordinator Supplier', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon Supplier', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('supply/input_supplier/'.$id);
        } else {
        	$edit = $this->supplierdao->update($id,$param);
        	if($edit == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('supply/supplier');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('supply/input_supplier/'.$id);
        	}
        }
	}

	public function delete_supplier()
	{
		$this->load->model('supplierdao');
		
		$id = $this->input->post('id');

		$delete = $this->supplierdao->delete($id);
		if($delete == true){
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}

	public function laporan_keuangan($value='')
	{
		$this->load->model('keuangandao');
		// print_r($value[0]->total);exit;
		$data['divisi'] = 'SCM';
		$data['total'] = $value[0]->harga;
		$data['keperluan'] = 'Open Tender';
		$data['status'] = 0;
		$data['validasi'] = 0;

		$insert = $this->keuangandao->insert($data);
	}
}