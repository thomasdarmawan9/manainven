<?php

class Product_model extends CI_model{
    public function getAllProduct()
    {
        $query = $this->db->get('product');  
        return $query->result_array();  
    }

    public function add()
    {
        $data = array(
            "productName" => $this->input->post('productID', true),
            "productName" => $this->input->post('productName', true),
            "price" => $this->input->post('price', true),
            "category" => $this->input->post('category', true),
            "stock" => $this->input->post('stock', true),
        );

        $this->db->insert('add', $data);
    }

    public function deleteProduct($id)
    {
        $this->db->where('productID', $id);
        $this->db->delete('product');
    }

    public function getProductById($id)
    {
        return $this->db->get_where('product', ['productID' => $id])->row_array();
    }

    public function detail($id)
    {
        $this->load->view('templates/header.php', $data);
        $this->load->view('product/detail', $data);
        $this->load->view('templates/footer.php');
    }

    public function editProduct()
    {
        $data = array(
            "productID" => $this->input->post('productID', true),
            "productName" => $this->input->post('productName', true),
            "price" => $this->input->post('price', true),
            "category" => $this->input->post('category', true),
            "stock" => $this->input->post('stock', true),
        );

        $this->db->where('productID', $this->input->post('id'));
        $this->db->edit('product', $data);
    }

    public function searchProduct()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('productName', $keyword);
        $this->db->or_like('price', $keyword);
        return $this->db->get('product')->result_array();
    }
}