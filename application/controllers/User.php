<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('userdao');

		$data = array();
		$data['title'] = 'Luna | Admin User';
		$data['nav'] = 'User';
		$data['nav_parent'] = 'System';
		$data['nav_desc'] = 'User Page Luna CMS';
		$data['user'] = $this->userdao->get_all();

		$this->template->load('template/template', 'user/index', $data);
	}

	public function input($id='')
	{
		$this->load->model('userdao');
		$this->load->model('groupuserdao');

		$data = array();
		$data['title'] = 'Luna | Admin User';
		$data['nav'] = 'User';
		$data['nav_parent'] = 'System';
		$data['nav_desc'] = 'User Page Luna CMS';
		$data['group'] = $this->groupuserdao->get_all();
		$data['user'] = $this->userdao->get_by_id($id);
		
		if(empty($id)){
			//add new data
			$this->template->load('template/template', 'user/input', $data);
		}else{
			//edit data with id
			$this->template->load('template/template', 'user/edit', $data);
		}
	}

	public function add()
	{
		$this->load->model('userdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('new_passwd', 'Password', 'required|min_length[4]|matches[cf_passwd]');
		$this->form_validation->set_rules('cf_passwd', 'Password Confirmation', 'required|min_length[4]');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('user/input');
        } else {
        	$input = $this->userdao->insert($param);
        	if($input == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('user');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('user/input');
        	}
        }
	}

	public function edit($id)
	{
		$this->load->model('userdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('user/input/'.$id);
        } else {
        	$edit = $this->userdao->update($id,$param);
        	if($edit == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success save data'));
				redirect('user');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to save data'));
				redirect('user/input/'.$id);
        	}
        }
	}

	public function edit_pass($id='')
	{
		$this->load->model('userdao');
		$this->load->library('form_validation');

		$param = $this->input->post();

		$this->form_validation->set_rules('new_passwd', 'Password', 'required|min_length[4]|matches[cf_passwd]');
		$this->form_validation->set_rules('cf_passwd', 'Password Confirmation', 'required|min_length[4]');
		
		if ($this->form_validation->run() == FALSE) {
			//
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
           	redirect('user/input/'.$id);
        } else {
        	$edit_pass = $this->userdao->update_pass($id,$param);
        	if($edit_pass == true){
        		$this->session->set_flashdata('flash_message',succ_msg('Success Change Password'));
				redirect('user');
        	}else{
        		$this->session->set_flashdata('flash_message',err_msg('Failed to change password'));
				redirect('user/input/'.$id);
        	}
        }
	}

	public function delete()
	{
		$this->load->model('userdao');
		
		$id = $this->input->post('id');

		$delete = $this->userdao->delete($id);
		if($delete == true){
			echo '1|'.succ_msg('Data success deleted');
		}else{
			echo '0|'.err_msg('System eror, please try again');
		}
	}
}