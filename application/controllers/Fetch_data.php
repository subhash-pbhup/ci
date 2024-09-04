<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fetch_data extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->library("session");
        $this->load->helper(array('form','url','user_helper'));


		if(!$this->session->userdata("email")){
			redirect('/login', 'refresh');
		}
	}


    public function index(){

		$this->load->view('search');
    }
	
}
