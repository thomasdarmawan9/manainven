<?php

class Receive extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Receive_model');
         $this->load->model('Purchase_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Receive';
        $data['receive'] = $this->Receive_model->getAllReceive();
        if($this->input->post('keyword')){
            $data['receive'] = $this->Receive_model->searchReceive();
        }
        $this->load->view('templates/header.php', $data);
        $this->load->view('receive/index', $data);
        $this->load->view('templates/footer.php');
    }

    public function add()
    {
        $data['judul'] = 'Add Receive Form';
        $data['data'] = $this->Purchase_model->getAllPurchase();
        $this->form_validation->set_rules('purchase_id', 'purchase_id', 'required');
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('kualitas', 'kualitas', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('receive/add');
            $this->load->view('templates/footer');
        } else{
            $this->Receive_model->addReceive();
            $this->session->set_flashdata('flash', 'Add');
            redirect('receive');
        }
    }

    public function delete($id)
    {
        $this->Receive_model->deleteReceive($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('receive');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Receive';
        $data['receive'] = $this->Receive_model->getReceiveById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('receive/detail', $data);
        $this->load->view('templates/footer');
    }
}