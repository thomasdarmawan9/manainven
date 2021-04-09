<?php

class Vendor extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vendor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Vendor';
        $data['vendor'] = $this->Vendor_model->getAllVendor();
        if($this->input->post('keyword')){
            $data['vendor'] = $this->Vendor_model->searchVendor();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('vendor/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add New Vendor Form';
        $this->form_validation->set_rules('name', 'Vendor Name', 'required');
        $this->form_validation->set_rules('address', 'Vendor Address', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('vendor/add');
            $this->load->view('templates/footer');
        } else{
            $this->Vendor_model->addVendor();
            $this->session->set_flashdata('flash', 'Add');
            redirect('vendor');
        }
    }

    public function delete($id)
    {
        $this->Vendor_model->deleteVendor($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('vendor');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Vendor';
        $data['vendor'] = $this->Vendor_model->getVendorById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('vendor/detail', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data['judul'] = 'Update Vendor Form';
        $data['vendor'] = $this->Vendor_model->getVendorById($id);
        $this->form_validation->set_rules('name', 'Vendor Name', 'required');
        $this->form_validation->set_rules('address', 'Vendor Address', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('vendor/update', $data);
            $this->load->view('templates/footer');
        } else{
            $this->Customer_model->updateVendor();
            $this->session->set_flashdata('flash', 'Update');
            redirect('vendor');
        }
    }
}