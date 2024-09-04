<?php

class Login extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library("session");
		$this->load->Model('Admin_module');
        $this->load->helper(array('form','url'));
	}

	public function index()
	{
			if($this->session->userdata("email")){
			redirect('/home', 'refresh');
		}
		
		$data['heading']="Admin form";
		$this->load->view('login',$data);
	}

	public function login(){


		if($this->input->post('email')){
			
			$data=array("email_id"=>$this->input->post("email"),"pwd"=>$this->input->post('pwd'));
			$query=$this->Admin_module->login($data);
			if($query){
				echo "1";
				$the_session = array("email" => $this->input->post("email"));
				$this->session->set_userdata($the_session);
                // redirect('home');
			}

		}

	
	}

	public function logout(){
		$this->session->unset_userdata('email');
		redirect('/login', 'refresh');
	}

}


