<?php

class Invoice_model extends CI_model{
    public function getAllInvoice()
    {
        $this->db->join('salesorder', 'salesorder.salesOrderID = invoice.salesOrderID');
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        $this->db->order_by("invoiceID", "desc");
        $query = $this->db->get('invoice');  
        return $query->result_array();  
    }

    public function addInvoice()
    {
        $data = array(
            "salesOrderID" => $this->input->post('salesOrderID', true),
            "invoiceDate" => $this->input->post('invoiceDate', true),
            "dueDate" => $this->input->post('dueDate', true),
            "invoiceAmount" => $this->input->post('invoiceAmount', true),
            "details" => $this->input->post('details', true),
        );
        $this->db->insert('invoice', $data);
    }

    public function deleteInvoice($id)
    {
        $this->db->where('invoiceID', $id);
        $this->db->delete('invoice');
    }

    public function getInvoiceById($id)
    {
        $this->db->join('salesorder', 'salesorder.salesOrderID = invoice.salesOrderID');
        $this->db->join('deliveryorder', 'deliveryorder.deliveryorderID = salesorder.salesOrderID');
        $this->db->join('product', 'product.productID = deliveryorder.productID');
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        $query = $this->db->get_where('invoice', ['invoiceID' => $id]);
        return $query->row_array();
    }

    public function searchInvoice()
    {
        $this->db->join('salesorder', 'salesorder.salesOrderID = invoice.salesOrderID');
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        $keyword = $this->input->post('keyword', true);
        $this->db->like('invoiceID', $keyword);
        $this->db->or_like('customerName', $keyword);
        return $this->db->get('invoice')->result_array();
    }


}