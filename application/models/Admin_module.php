<?php
class Admin_module extends CI_Model {

    public function login($data)
    {
        return $query=$this->db->get_where('admin',$data)->result();
    }

    public function edit($email,$data){

            $this->db->where('email_id', $email);
            $this->db->update('admin', $data);  
    }
}