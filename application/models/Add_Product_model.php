<?php

class Add_Product_model extends CI_model{
    public function getAllProduct()
    {
        $query = $this->db->get('addproduct');  
        return $query->result_array();  
    }

    public function add()
    {
        $data = array(
            "productID" => $this->input->post('productID', true),
            "productName" => $this->input->post('productName', true),
            "price" => $this->input->post('price', true),
            "category" => $this->input->post('category', true),
            "stock" => $this->input->post('stock', true),
            "werehouse" => $this->input->post('werehouse', true),
        );
        $this->db->insert('addproduct', $data);
    }
}