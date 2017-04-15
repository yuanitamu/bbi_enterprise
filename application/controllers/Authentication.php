<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['title'] = 'Luna | Admin Authentication';

		$this->load->view('login', $data);
	}

	public function do_login()
	{
		$param = $this->input->post();
		
        $this->load->model('userdao');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('passwd', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
           	$this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('authentication');
        } else {
        	$user = $this->userdao->get_user($param);
        	if(!empty($user)){
        		$this->session->set_userdata('luna',$user);
        		redirect('home');
        	}else{
        		$this->session->set_flashdata('flash_message', warn_msg('User not exist'));
        		redirect('authentication');
        	}
        }
	}

	public function do_logout()
	{
		$this->session->sess_destroy();
        $this->session->unset_userdata('luna');        
        redirect('home');
	}
}
