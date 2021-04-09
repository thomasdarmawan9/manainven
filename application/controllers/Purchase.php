<?php

class Purchase extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purchase_model');
        $this->load->model('Vendor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Purchase';
        $data['purchase'] = $this->Purchase_model->getAllPurchase();
        if($this->input->post('keyword')){
            $data['purchase'] = $this->Purchase_model->searchPurchase();
        }
        $this->load->view('templates/header.php', $data);
        $this->load->view('purchase/index', $data);
        $this->load->view('templates/footer.php');
    }

    public function add()
    {
        $data['judul'] = 'Add Purchase Order Form';
        $data['data'] = $this->Vendor_model->getAllVendor();
        $this->form_validation->set_rules('id_vendor', 'id_vendor', 'required');
        $this->form_validation->set_rules('produk', 'produk', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('tanggal_pengiriman', 'tanggal_pengiriman', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('pembayaran', 'pembayaran', 'required');
        $this->form_validation->set_rules('create_date', 'create_date', 'required');
        $this->form_validation->set_rules('create_by', 'create_by', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('purchase/add');
            $this->load->view('templates/footer');
        } else{
            $this->Purchase_model->addPurchase();
            $this->session->set_flashdata('flash', 'Add');
            redirect('purchase');
        }



    }

    public function save(){
        echo "<a href='http://localhost/ci_ims/purchase'> Back </a>";
        $id_vendor=$this->input->post('id_vendor');
        $produk=$this->input->post('produk');
        $jumlah=$this->input->post('jumlah');
        $harga=$this->input->post('harga');
        $tanggal_pengiriman=$this->input->post('tanggal_pengiriman');
        $alamat=$this->input->post('alamat');
        $pembayaran=$this->input->post('pembayaran');
        $create_date=$this->input->post('create_date');
        $create_by=$this->input->post('create_by');

         $data = array();
         foreach ($produk as $key => $val) {
            $data[]  = array(
            'id_vendor'=>$id_vendor,
            'produk'=>$produk[$key],
            'jumlah'=>$jumlah,
            'harga'=>$harga,
            'tanggal_pengiriman'=>$tanggal_pengiriman,
            'alamat'=>$alamat,
            'pembayaran'=>$pembayaran,
            'create_date'=>$create_date,
            'create_by'=>$create_by
        );
        }

        return $this->db->insert_batch('purchaseorder', $data);
        redirect('purchase');

    }

    public function delete($id)
    {
        $this->Purchase_model->deletePurchase($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('purchase');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Purchase Order';
        $data['purchase'] = $this->Purchase_model->getPurchaseById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('purchase/detail', $data);
        $this->load->view('templates/footer');
    }

    



    
}
