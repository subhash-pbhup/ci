<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->library("session");
		$this->load->Model('Admin_module');
        $this->load->helper(array('form','url'));


		if(!$this->session->userdata("email")){
			redirect('/login', 'refresh');
		}
	}


    public function index(){

	 $query = array('email_id' => $this->session->userdata("email"));		
	 $data['admin']=$this->db->get_where('admin',$query)->result();
		
		$this->load->view('profile',$data);
    }


	public function update()
{


		if($this->input->post('name'))
    {

		$name = trim($this->input->post('name'));
        $email = trim($this->input->post('email'));
        $mobile = trim($this->input->post('mobile'));
        $old_img = trim($this->input->post('old_img'));
   
		$img=rand(10,100).$_FILES['img']['name'];
		$config['upload_path'] ='images'; 
		$config['allowed_types'] ='gif|jpg|png|bmp|jpeg';
		$config['file_name'] =$img;
		$config['max_size']  = '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['$min_width'] = '0';
		$config['min_height'] = '0';
		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload('img');

		if(empty($_FILES['img']['name']))
            {

		$data = array(
			'name' => $name,
			'email_id' => $email,
			'mobile' => $mobile,
			'img' => $old_img
			);
			}
			else{
	
		$data = array(
			'name' => $name,
			'email_id' => $email,
			'mobile' => $mobile,
			'img' => $img
			);			
			}
			
		$this->Admin_module->edit($email,$data);
		redirect('/admin', 'refresh');


	}

}
	
}
