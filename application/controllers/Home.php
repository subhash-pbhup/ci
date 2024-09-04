<?php

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library("session");
		$this->load->Model('Student_module');
        $this->load->helper(array('form','url'));


		if(!$this->session->userdata("email")){
			redirect('/login', 'refresh');
		}
	}

	public function index()
	{
		$data['stu_data']=$this->Student_module->getres();
		$data['heading']="Student data";
	
		$this->load->view('student_form',$data);
	}

	public function insert()
	{

		
		if($this->input->post('name'))
    {

		$name = trim($this->input->post('name'));
        $email = trim($this->input->post('email'));
        $mobile = trim($this->input->post('mobile'));
        $address = trim($this->input->post('address'));

		

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

		$data = array(
			'name' => $name,
			'email_id' => $email,
			'mobile' => $mobile,
			'address' => $address,
			'img' => $img
			); 
		$this->Student_module->insert($data);
		redirect("home");
			

	}

}

public function edit()
{


		if($this->input->post('edit_name'))
    {

		$id = trim($this->input->post('edit_id'));
		$name = trim($this->input->post('edit_name'));
        $email = trim($this->input->post('edit_email'));
        $mobile = trim($this->input->post('edit_mobile'));
        $address = trim($this->input->post('edit_address'));
        $old_img = trim($this->input->post('old_img'));
   
		$img=rand(10,100).$_FILES['edit_img']['name'];
		$config['upload_path'] ='images'; 
		$config['allowed_types'] ='gif|jpg|png|bmp|jpeg';
		$config['file_name'] =$img;
		$config['max_size']  = '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['$min_width'] = '0';
		$config['min_height'] = '0';
		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload('edit_img');

		if(empty($_FILES['edit_img']['name']))
            {

		$data = array(
			'name' => $name,
			'email_id' => $email,
			'mobile' => $mobile,
			'address' => $address,
			'img' => $old_img
			);
			}
			else{
	
		$data = array(
			'name' => $name,
			'email_id' => $email,
			'mobile' => $mobile,
			'address' => $address,
			'img' => $img
			);			
			}
				 $this->Student_module->edit($id,$data);
				 redirect("home");


	}

}
	public function delete(){

		if($this->input->post('id'))
    {

		$id = trim($this->input->post('id'));
		echo $this->Student_module->delete($id);

	}

	}

}


