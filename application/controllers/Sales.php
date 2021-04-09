<?php

class Sales extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_model');
        $this->load->model('Customer_model');
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Sales';
        $data['sales'] = $this->Sales_model->getAllSales();
        if($this->input->post('keyword')){
            $data['sales'] = $this->Sales_model->searchSales();
        }
        $this->load->view('templates/header.php', $data);
        $this->load->view('sales/index', $data);
        $this->load->view('templates/footer.php');
    }

    public function add()
    {
        $data['judul'] = 'Add Sales Order Form';
        $data['customer'] = $this->Customer_model->getAllCustomer();
        $data['product'] = $this->Product_model->getAllProduct();
        $this->form_validation->set_rules('customerID', 'Customer Name', 'required');
        $this->form_validation->set_rules('orderDate', 'Order Date', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('sales/add');
            $this->load->view('templates/footer');
        } else{
            $this->Sales_model->addSales();
            $this->session->set_flashdata('flash', 'Add');
            redirect('sales');
        }
    }

    public function add_product()
    {
        $data['judul'] = 'Add Sales Order Form';
        $data['sales'] = $this->Sales_model->getSalesById($id);
        $data['product'] = $this->Product_model->getAllProduct();
        $this->form_validation->set_rules('productID', 'Product', 'required');
        $this->form_validation->set_rules('qty', 'Qty', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('sales/add_product');
            $this->load->view('templates/footer');
        } else{
            $this->Sales_model->addSales_Product();
            $this->session->set_flashdata('flash', 'Add');
            redirect('sales');
        }
    }

    public function delete($id)
    {
        $this->Sales_model->deleteSales($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('sales');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Sales Order';
        $data['sales'] = $this->Sales_model->getSalesById($id);
        $data['product'] = $this->Product_model->getProductById($id);
        $data['customer'] = $this->Customer_model->getCustomerById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('sales/detail', $data);
        $this->load->view('templates/footer');
    }
}