<?php

class Customer_model extends CI_model{
    public function getAllCustomer()
    {
        $query = $this->db->get('customer');  
        return $query->result_array();  
    }

    public function addCustomer()
    {
        $data = array(
            "customerName" => $this->input->post('name', true),
            "address" => $this->input->post('address', true),
            "phoneNumber" => $this->input->post('phoneNumber', true),
        );

        $this->db->insert('customer', $data);
    }

    public function deleteCustomer($id)
    {
        $this->db->where('customerID', $id);
        $this->db->delete('customer');
    }

    public function getCustomerById($id)
    {
        return $this->db->get_where('customer', ['customerID' => $id])->row_array();
    }

    public function UpdateCustomer()
    {
        $data = array(
            "customerName" => $this->input->post('name', true),
            "address" => $this->input->post('address', true),
            "phoneNumber" => $this->input->post('phoneNumber', true),
        );

        $this->db->where('customerID', $this->input->post('id'));
        $this->db->update('customer', $data);
    }

    public function searchCustomer()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('customerName', $keyword);
        $this->db->or_like('address', $keyword);
        $this->db->or_like('phoneNumber', $keyword);
        return $this->db->get('customer')->result_array();
    }
}