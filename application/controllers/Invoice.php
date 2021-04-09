<?php

class Invoice extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');
        $this->load->model('Sales_model');
        $this->load->model('Delivery_model');
        $this->load->model('Customer_model');
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Invoice';
        $data['invoice'] = $this->Invoice_model->getAllInvoice();
        if($this->input->post('keyword')){
            $data['invoice'] = $this->Invoice_model->searchInvoice();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('invoice/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add Invoice Form';
        $data['sales'] = $this->Sales_model->getAllSales();
        $this->form_validation->set_rules('salesOrderID', 'Sales Order', 'required');
        $this->form_validation->set_rules('invoiceDate', 'Invoice Date', 'required');
        $this->form_validation->set_rules('dueDate', 'Due Date', 'required');
        $this->form_validation->set_rules('invoiceAmount', 'Amount', 'required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('invoice/add');
            $this->load->view('templates/footer');
        } else{
            $this->Invoice_model->addInvoice();
            $this->session->set_flashdata('flash', 'Add');
            redirect('invoice');
        }
    }

    public function delete($id)
    {
        $this->Invoice_model->deleteInvoice($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('invoice');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Sales Order';
        $data['invoice'] = $this->Invoice_model->getInvoiceById($id);
        $data['delivery'] = $this->Delivery_model->getDeliveryById($id);
        $data['product'] = $this->Product_model->getProductById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('invoice/detail', $data);
        $this->load->view('templates/footer');
    }
}