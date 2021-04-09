<?php

class WarehouseB extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('WarehouseB_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Warehouse B';
        $data['inventory'] = $this->WarehouseB_model->getAllWarehouseB();
        if($this->input->post('keyword')){
            $data['inventory'] = $this->WarehouseB_model->searchProduct();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('inventory/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add Product';
        $data['inventory'] = $this->WarehouseB_model->getAllProduct();
        $this->form_validation->set_rules('productID', 'productID', 'required');
        $this->form_validation->set_rules('productName', 'productName', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('stock', 'stock', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('inventory/add', $data);
            $this->load->view('templates/footer');
        } else{
            $this->WarehouseB_model->add();
            $this->session->set_flashdata('flash', 'Add');
            redirect('inventory');
        }
    }

    public function delete($id)
    {
        $this->WarehouseB_model->deleteProduct($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('inventory');
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
        $data['inventory'] = $this->Product_model->getProductById($id);
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
            $this->WarehouseB_model->editWarehouse();
            $this->session->set_flashdata('flash', 'Edit');
            redirect('inventory');
        }
    }
}