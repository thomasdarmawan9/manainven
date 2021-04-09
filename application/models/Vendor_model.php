<?php

class Vendor_model extends CI_model{
    public function getAllVendor()
    {
        $query = $this->db->get('vendor');  
        return $query->result_array();  
    }

    public function addNewVendor()
    {
        $data = array(
            "nama_vendor" => $this->input->post('name', true),
            "alamat" => $this->input->post('address', true),
            "no_tlp" => $this->input->post('phoneNumber', true),
        );

        $this->db->insert('vendor', $data);
    }

    public function deleteVendor($id)
    {
        $this->db->where('id_vendor', $id);
        $this->db->delete('vendor');
    }

    public function getVendorById($id)
    {
        return $this->db->get_where('vendor', ['id_vendor' => $id])->row_array();
    }

    public function UpdateVendor()
    {
        $data = array(
            "nama_vendor" => $this->input->post('name', true),
            "alamat" => $this->input->post('address', true),
            "no_tlp" => $this->input->post('phoneNumber', true),
        );

        $this->db->where('id_vendor', $this->input->post('id'));
        $this->db->update('vendor', $data);
    }

    public function searchVendor()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_vendor', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('no_tlp', $keyword);
        return $this->db->get('vendor')->result_array();
    }
}