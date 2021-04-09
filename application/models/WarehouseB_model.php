<?php

class WarehouseB_model extends CI_model{
    public function getAllWarehouse()
    {
        $query = $this->db->get('warehouse');  
        return $query->result_array();  
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

}