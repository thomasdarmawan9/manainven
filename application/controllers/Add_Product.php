<?php

class Add_Product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Add_Product_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'addProduct';
        $data['addproduct'] = $this->Add_Product_model->getAllProduct();
        if($this->input->post('keyword')){
            $data['product'] = $this->Add_Product_model->searchProduct();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('addproduct/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add Product';
        $data['addproduct'] = $this->Add_Product_model->getAllProduct();
        $this->form_validation->set_rules('productID', 'productID', 'required');
        $this->form_validation->set_rules('productName', 'productName', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('stock', 'stock', 'required');
        $this->form_validation->set_rules('werehouse', 'werehouse', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('addproduct/add', $data);
            $this->load->view('templates/footer');
        } else{
            $this->Add_Product_model->add();
            $this->session->set_flashdata('flash', 'Add');
            redirect('addproduct');
        }
    }

}