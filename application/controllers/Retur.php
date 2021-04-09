<?php

class Retur extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Retur_model');
        $this->load->model('Purchase_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Retur';
        $data['retur'] = $this->Retur_model->getAllRetur();
        if($this->input->post('keyword')){
            $data['retur'] = $this->Retur_model->searchRetur();
        }
        $this->load->view('templates/header.php', $data);
        $this->load->view('retur/index', $data);
        $this->load->view('templates/footer.php');
    }

    public function add()
    {
        $data['judul'] = 'Add Retur Form';
        $data['data'] = $this->Purchase_model->getAllPurchase();
        $this->form_validation->set_rules('orderDate', 'orderDate', 'required');
        $this->form_validation->set_rules('purchase_id', 'purchase_id', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('alasan', 'alasan', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('retur/add');
            $this->load->view('templates/footer');
        } else{
            $this->Retur_model->addRetur();
            $this->session->set_flashdata('flash', 'Add');
            redirect('retur');
        }
    }

    public function delete($id)
    {
        $this->Retur_model->deleteRetur($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('retur');
    }

    public function detail()
    {
        $data['judul'] = 'Detail Retur';
        $data['retur'] = $this->Retur_model->getReturById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('retur/detail', $data);
        $this->load->view('templates/footer');
    }
}