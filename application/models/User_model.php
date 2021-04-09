<?php

class User_model extends CI_model{
    public function getAllUser()
    {
        $query = $this->db->get('user');  
        return $query->result_array();  
    }

    public function addUser()
    {
        $data = array(
            "name" => $this->input->post('name', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "roles" => $this->input->post('roles', true),
            "createDate" => $this->input->post('createDate', true)
        );

        $this->db->insert('user', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('userID', $id);
        $this->db->delete('user');
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['userID' => $id])->row_array();
    }

    public function UpdateUser()
    {
        $data = array(
            "name" => $this->input->post('name', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "roles" => $this->input->post('roles', true)
        );

        $this->db->where('userID', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function searchUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('name', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('user')->result_array();
    }
}