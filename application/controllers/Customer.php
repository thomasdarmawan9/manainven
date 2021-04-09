<?php

class Customer extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Customer';
        $data['customer'] = $this->Customer_model->getAllCustomer();
        if($this->input->post('keyword')){
            $data['customer'] = $this->Customer_model->searchCustomer();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('customer/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add Customer Form';
        $this->form_validation->set_rules('name', 'Customer Name', 'required');
        $this->form_validation->set_rules('address', 'Customer Address', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('customer/add');
            $this->load->view('templates/footer');
        } else{
            $this->Customer_model->addCustomer();
            $this->session->set_flashdata('flash', 'Add');
            redirect('customer');
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
        $data['customer'] = $this->Customer_model->getCustomerById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('customer/detail', $data);
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