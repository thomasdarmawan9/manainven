<?php

class Inventory_model extends CI_model{
    public function getAllInventory()
    {
        $query = $this->db->get('inventory');  
        return $query->result_array();  
    }

    public function addAccount()
    {
        $data = array(
            "accountName" => $this->input->post('accountName', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "roles" => $this->input->post('roles', true),
            "createDate" => $this->input->post('createDate', true)
        );

        $this->db->insert('account', $data);
    }

    public function deleteCustomer($id)
    {
        $this->db->where('accountID', $id);
        $this->db->delete('account');
    }

    public function getAccountById($id)
    {
        return $this->db->get_where('account', ['accountID' => $id])->row_array();
    }

    public function UpdateAccount()
    {
        $data = array(
            "accountName" => $this->input->post('accountName', true),
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "roles" => $this->input->post('roles', true)
        );

        $this->db->where('accountID', $this->input->post('id'));
        $this->db->update('account', $data);
    }

    public function searchAccount()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('accountName', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('account')->result_array();
    }
}