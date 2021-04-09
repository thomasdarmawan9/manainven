<?php

class Payment_model extends CI_model{
    public function getAllPayment()
    {
        $this->db->join('salesorder', 'salesorder.salesOrderID = payment.salesOrderID');
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        $this->db->order_by("paymentID", "desc");
        $query = $this->db->get('payment');  
        return $query->result_array();  
    }

    public function addPayment()
    {
        $data = array(
            "salesOrderID" => $this->input->post('salesOrderID', true),
            "invoiceID" => $this->input->post('invoiceID', true),
            "paymentDate" => $this->input->post('paymentDate', true),
            "amount" => $this->input->post('amount', true),
            "paymentMethod" => $this->input->post('paymentMethod', true),
        );

        $this->db->insert('payment', $data);
    }

    public function getPaymentById($id)
    {
        $this->db->join('salesorder', 'salesorder.salesOrderID = payment.salesOrderID');
        $this->db->join('deliveryorder', 'deliveryorder.deliveryorderID = salesorder.salesOrderID');
        $this->db->join('product', 'product.productID = deliveryorder.productID');
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        return $this->db->get_where('payment', ['paymentID' => $id])->row_array();
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

    public function searchPayment()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('customerName', $keyword);
        $this->db->or_like('address', $keyword);
        $this->db->or_like('phoneNumber', $keyword);
        return $this->db->get('payment')->result_array();
    }
}