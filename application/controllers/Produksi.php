<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

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
		$this->load->model('requestdao');

		$data = array();
		$data['title'] = 'Luna | Admin Request';
		$data['nav'] = 'Request';
		$data['nav_parent'] = 'Produksi';
		$data['nav_desc'] = 'Request Page Luna CMS';
		$data['request'] = $this->requestdao->get_by_cat('1');

		$this->template->load('template/template', 'produksi/index', $data);
	}

	public function bahan()
	{
		$this->load->model('bahandao');

		$data = array();
		$data['title'] = 'Luna | Admin Request';
		$data['nav'] = 'Bahan';
		$data['nav_parent'] = 'Produksi';
		$data['nav_desc'] = 'Request Page Luna CMS';
		$data['bahan'] = $this->bahandao->get_by_stok();

		$this->template->load('template/template', 'produksi/bahan', $data);
	}

	public function add_bahan()
	{
		$param = $this->input->post();
		$this->load->model('stokmodel');

		$this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        if ($this->form_validation->run() == false) {
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('produksi/bahan');
        } else {
        	$stok = $this->stokmodel->stok_bahan($param['nama']);
        	if($param['nama'] <= $stok[0]->stok){
        		$this->session->set_flashdata('flash_message',warn_msg('Stok not enough'));
				redirect('produksi/bahan');
        	}else{
        		$edit = $this->stokmodel->bahan_out($param);
        		if($edit == true){
        			$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
					redirect('produksi/bahan');
        		}else{
        			$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
					redirect('produksi/bahan');
        		}
        	}
        }
	}

	public function validasi()
	{
		$this->load->model('requestdao');
		$this->load->model('stokmodel');
		
		$id = $this->input->post('id');
		$data = $this->requestdao->get_by_id($id);
		// print_r($data[0]->jumlah);exit;
		$update = $this->requestdao->update_status($id,'1');
		if($update == true){
			$this->stokmodel->produksi_in($data[0]->nama,$data[0]->jumlah);
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}
}