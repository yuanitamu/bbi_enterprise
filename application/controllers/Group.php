<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

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
		$this->load->model('groupuserdao');

		$data = array();
		$data['title'] = 'Luna | Admin Group';
		$data['nav'] = 'Group';
		$data['nav_parent'] = 'System';
		$data['nav_desc'] = 'Group Page Luna CMS';
		$data['group'] = $this->groupuserdao->get_all();

		$this->template->load('template/template', 'group/index', $data);
	}

	public function input($id='')
	{
		$this->load->model('groupuserdao');

		$data = array();
		$data['title'] = 'Luna | Admin Group';
		$data['nav'] = 'Group';
		$data['nav_parent'] = 'System';
		$data['nav_desc'] = 'Group Page Luna CMS';
		$data['group'] = $this->groupuserdao->get_by_id($id);
		
		if(empty($id)){
			//add new data
			$this->template->load('template/template', 'group/input', $data);
		}else{
			//edit data with id
			$this->template->load('template/template', 'group/edit', $data);
		}
	}

	public function add()
	{
		$this->load->model('groupuserdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('group', 'Group Name', 'required|min_length[4]');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('group/input');
        } else {
        	$input = $this->groupuserdao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('group');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('group/input');
        	}
        }
	}

	public function edit($id)
	{
		$this->load->model('groupuserdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('group', 'Group Name', 'required|min_length[4]');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('group/input/'.$id);
        } else {
        	$edit = $this->groupuserdao->update($id,$param);
        	if($edit == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('group');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('group/input/'.$id);
        	}
        }
	}

	public function delete()
	{
		$this->load->model('groupuserdao');
		
		$id = $this->input->post('id');

		$delete = $this->groupuserdao->delete($id);
		if($delete == true){
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}
}