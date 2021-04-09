<?php

class Product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Product';
        $data['product'] = $this->Product_model->getAllProduct();
        if($this->input->post('keyword')){
            $data['product'] = $this->Product_model->searchProduct();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add Product Form';
        $data['product'] = $this->Product_model->getAllProduct();
        $this->form_validation->set_rules('productID', 'productID', 'required');
        $this->form_validation->set_rules('productName', 'productName', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('stock', 'stock', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('product/add', $data);
            $this->load->view('templates/footer');
        } else{
            $this->Product_model->add();
            $this->session->set_flashdata('flash', 'Add');
            redirect('product');
        }
    }

    public function delete($id)
    {
        $this->Product_model->deleteProduct($id);
        $this->session->set_flashdata('flash', 'delete');
        redirect('product/index');
    }

    public function detail($id)
    {
        $data['judul'] = 'Product Detail';
        $data['product'] = $this->Product_model->getProductById($id);
        $this->load->view('templates/header.php', $data);
        $this->load->view('product/detail.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Product Form';
        $data['product'] = $this->Product_model->getProductById($id);
        $this->form_validation->set_rules('productID', 'productID', 'required');
        $this->form_validation->set_rules('productName', 'productName', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('stock', 'stock', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('product/edit.php', $data);
            $this->load->view('templates/footer.php');
        } else{
            $this->Product_model->editProduct();
            $this->session->set_flashdata('flash', 'Edit');
            redirect('product');
        }
    }
}