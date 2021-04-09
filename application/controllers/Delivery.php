<?php

class Delivery extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Delivery_model');
        $this->load->model('Product_model');
        $this->load->model('Sales_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Delivery Order';
        $data['delivery'] = $this->Delivery_model->getAllDelivery();
        if($this->input->post('keyword')){
            $data['delivery'] = $this->Delivery_model->searchDelivery();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('delivery/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add Customer Form';
        $data['sales'] = $this->Sales_model->getAllSales();
        $data['product'] = $this->Product_model->getAllProduct();
        $this->form_validation->set_rules('salesOrderID', 'Sales Order', 'required');
        $this->form_validation->set_rules('deliveryDate', 'Delivery Date', 'required');
        $this->form_validation->set_rules('productID', 'Product', 'required');
        $this->form_validation->set_rules('qty', 'Qty', 'required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('delivery/add');
            $this->load->view('templates/footer');
        } else{
            $this->Delivery_model->addDelivery();
            $this->session->set_flashdata('flash', 'Add');
            redirect('delivery');
        }
    }

    public function delete($id)
    {
        $this->Delivery_model->deleteDelivery($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('delivery');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Delivery';
        $data['delivery'] = $this->Delivery_model->getDeliveryById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('delivery/detail', $data);
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