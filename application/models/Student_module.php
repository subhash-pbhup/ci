<?php
class Student_module extends CI_Model {

    public function getres()
    {
        $query=$this->db->get('student');
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert('student',$data);
    }

    public function edit($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('student', $data);       
         return 1;
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('student');

        return 1; 
    }

    // public function login($data)
    // {
        
    //      return $query=$this->db->get_where('student',$data)->result();
    // }

}
?>