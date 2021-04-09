<?php

class Retur_model extends CI_model{
    public function getAllRetur()
    {
        $this->db->join('purchaseorder', 'purchaseorder.purchase_id = retur.purchase_id');
        $query = $this->db->get('retur');  
        return $query->result_array();  
    }

    public function addRetur()
    {
        $data = array(
            "orderDate" => $this->input->post('orderDate', true),
            "purchase_id" => $this->input->post('purchase_id', true),
            "alamat" => $this->input->post('alamat', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            "jumlah" => $this->input->post('jumlah', true),
            "alasan" => $this->input->post('alasan', true),
        );
        $this->db->insert('retur', $data);
    }

    public function deleteRetur($id)
    {
        $this->db->where('retur_id', $id);
        $this->db->delete('retur');
    }

    public function getReturById($id)
    {
        $this->db->join('purchaseorder', 'purchaseorder.purchase_id = retur.purchase_id');
        $query = $this->db->get_where('retur', ['retur_id' => $id]);
        return $query->row_array();
    }

    public function searchRetur()
    {
        $this->db->join('purchaseorder', 'purchaseorder.purchase_id = retur.purchase_id');
        $keyword = $this->input->post('keyword', true);
        $this->db->like('purchase_id', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('nama_produk', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('orderDate', $keyword);
        $this->db->or_like('alasan', $keyword);
        return $this->db->get('retur')->result_array();
    }


}