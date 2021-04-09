<?php

class Payment extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Invoice_model');
        $this->load->model('Sales_model');
        $this->load->model('Delivery_model');
        $this->load->model('Customer_model');
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Payment';
        $data['payment'] = $this->Payment_model->getAllPayment();
        if($this->input->post('keyword')){
            $data['payment'] = $this->Payment_model->searchPayment();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('payment/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add Customer Form';
        $data['data'] = $this->Sales_model->getAllSales();
        $data['data'] = $this->Customer_model->getAllCustomer();
        $data['data'] = $this->Invoice_model->getAllInvoice();
        $this->form_validation->set_rules('salesOrderID', 'Sales Order', 'required');
        $this->form_validation->set_rules('paymentDate', 'Payment Date', 'required');
        $this->form_validation->set_rules('amount', 'Paid Amount', 'required|numeric');
        $this->form_validation->set_rules('paymentMethod', 'Payment Method', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('payment/add');
            $this->load->view('templates/footer');
        } else{
            $this->Payment_model->addPayment();
            $this->session->set_flashdata('flash', 'Add');
            redirect('payment');
        }
    }

    public function delete($id)
    {
        $this->Customer_model->deleteCustomer($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('customer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Customer';
        $data['payment'] = $this->Payment_model->getPaymentById($id);
        $data['invoice'] = $this->Invoice_model->getInvoiceById($id);
        $data['delivery'] = $this->Delivery_model->getDeliveryById($id);
        $data['product'] = $this->Product_model->getProductById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('payment/detail', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data['judul'] = 'Update Customer Form';
        $data['customer'] = $this->Customer_model->getCustomerById($id);
        $this->form_validation->set_rules('name', 'Customer Name', 'required');
        $this->form_validation->set_rules('address', 'Customer Address', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('customer/update', $data);
            $this->load->view('templates/footer');
        } else{
            $this->Customer_model->updateCustomer();
            $this->session->set_flashdata('flash', 'Update');
            redirect('customer');
        }
    }
}