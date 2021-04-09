<?php

class Sales_model extends CI_model{
    private $table;
	private $select_default;
	function __construct(){
        parent::__construct();
		$this->table = "salesorder";
		$this->select_default = 'salesorder.salesOrderID, salesorder.customerID, salesorder.orderDate, customer.customerName, salesorder.statusOrder';
	}
    
    public function getAllSales()
    {
        $this->db->select($this->select_default);
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        $this->db->order_by("salesOrderID", "desc");
        $query = $this->db->get('salesorder');  
        return $query->result_array();  
    }

    public function addSales()
    {
        $data = array(
            "customerID" => $this->input->post('customerID', true),
            "orderDate" => $this->input->post('orderDate', true),
            "amount" => $this->input->post('amount', true),
            "statusOrder" => $this->input->post('statusOrder', true),
        );
        $this->db->insert('salesorder', $data);
    }

    public function addSales_Product()
    {
        $data = array(
            "productID" => $this->input->post('productID', true),
            "qty" => $this->input->post('qty', true),
        );
        $this->db->insert('sales_product', $data);
    }

    public function deleteSales($id)
    {
        $this->db->where('salesOrderID', $id);
        $this->db->delete('salesorder');
    }

    public function getSalesById($id)
    {
        $this->db->join('sales_product', 'sales_product.salesOrderID = salesorder.salesOrderID');
        $this->db->join('product', 'product.productID = sales_product.productID');
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        $query = $this->db->get_where('salesorder', ['salesorder.salesOrderID' => $id]);
        return $query->row_array();
    }

    public function searchSales()
    {
        $this->db->join('customer', 'customer.customerID = salesorder.customerID');
        $keyword = $this->input->post('keyword', true);
        $this->db->like('salesOrderID', $keyword);
        $this->db->or_like('customerName', $keyword);
        return $this->db->get('salesorder')->result_array();
    }


}