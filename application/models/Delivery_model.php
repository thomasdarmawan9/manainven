<?php

class Delivery_model extends CI_model{
    public function getAllDelivery()
    {
        $this->db->join('salesorder', 'salesorder.salesOrderID = deliveryorder.salesOrderID');
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        $this->db->order_by("deliveryOrderID", "desc");
        $query = $this->db->get('deliveryorder');  
        return $query->result_array();  
    }

    public function addDelivery()
    {
        $data = array(
            "salesOrderID" => $this->input->post('salesOrderID', true),
            "deliveryDate" => $this->input->post('deliveryDate', true),
            "productID" => $this->input->post('productID', true),
            "qty" => $this->input->post('qty', true),
        );

        $this->db->insert('deliveryorder', $data);
    }

    public function deleteDelivery($id)
    {
        $this->db->where('deliveryOrderID', $id);
        $this->db->delete('deliveryorder');
    }

    public function getDeliveryById($id)
    {
        $this->db->join('product', 'product.productID = deliveryorder.productID');
        $this->db->join('salesorder', 'salesorder.salesOrderID = deliveryorder.salesOrderID');
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        return $this->db->get_where('deliveryorder', ['deliveryOrderID' => $id])->row_array();
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