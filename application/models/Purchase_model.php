<?php

class Purchase_model extends CI_model{
    public function getAllPurchase()
    {
        $this->db->join('vendor', 'vendor.id_vendor = purchaseorder.id_vendor');
        $query = $this->db->get('purchaseorder');  
        return $query->result_array();  
    }

    /*public function addPurchase()
    {
        $data = array(
        "id_vendor" => $this->input->post('id_vendor', true),
        "produk" => $this->input->post('produk', true),
        "jumlah" => $this->input->post('jumlah', true),
        "harga" => $this->input->post('harga', true),
        "tanggal_pengiriman" => $this->input->post('tanggal_pengiriman', true),
        "alamat" => $this->input->post('alamat', true),
        "pembayaran" => $this->input->post('pembayaran', true),
        "create_date" => $this->input->post('create_date', true),
        "create_by" => $this->input->post('create_by', true),
        );
        $this->db->insert('purchaseorder', $data);
    }*/

    function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    public function deletePurchase($id)
    {
        $this->db->where('purchase_id', $id);
        $this->db->delete('purchaseorder');
    }

    public function getPurchaseById($id)
    {
        $this->db->join('vendor', 'vendor.id_vendor = purchaseorder.id_vendor');
        $query = $this->db->get_where('purchaseorder', ['purchase_id' => $id]);
        return $query->row_array();
    }

    public function searchPurchase()
    {
        $this->db->join('vendor', 'vendor.id_vendor = purchaseorder.id_vendor');
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_vendor', $keyword);
        $this->db->or_like('create_date', $keyword);
        return $this->db->get('purchaseorder')->result_array();
    }


}