<?php

class Receive_model extends CI_model{
    public function getAllReceive()
    {
        $this->db->join('purchaseorder', 'purchaseorder.purchase_id = receive.purchase_id');
        $query = $this->db->get('receive');  
        return $query->result_array();  
    }

    public function addReceive()
    {
        $data = array(
            "purchase_id" => $this->input->post('purchase_id', true),
            "nama_produk" => $this->input->post('nama_produk', true),
            "jumlah" => $this->input->post('jumlah', true),
            "kualitas" => $this->input->post('kualitas', true),
        );
        $this->db->insert('receive', $data);
    }

    public function deleteReceive($id)
    {
        $this->db->where('receive_id', $id);
        $this->db->delete('receive');
    }

    public function getReceiveById($id)
    {
        $this->db->join('purchaseorder', 'purchaseorder.purchase_id = receive.purchase_id');
        $query = $this->db->get_where('receive', ['receive_id' => $id]);
        return $query->row_array();
    }

    public function searchReceive()
    {
        $this->db->join('purchaseorder', 'purchaseorder.purchase_id = receive.purchase_id');
        $keyword = $this->input->post('keyword', true);
        $this->db->like('purchase_id', $keyword);
        $this->db->or_like('nama_produk', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('kualitas', $keyword);
        return $this->db->get('receive')->result_array();
    }


}