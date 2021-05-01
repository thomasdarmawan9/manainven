<?php

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model', 'dashboard');
    }

    public function _remap($method, $param = array()){
		if(method_exists($this, $method)){
			$level = $this->session->userdata('roles');
			if(!empty($level)){
				return call_user_func_array(array($this, $method), $param);
			}else{
				redirect(base_url('login'));				
			}
		}else{
			display_404();
		}
	}

    public function index(){
        $this->load->view('templates/header.php');
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer.php');
    }

    public function index_get()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {

            // Data untuk ngecek product yang sudah terjual dan product yang sudah terjual

            $labels_product = ['Total Barang Yang Sudah Terjual', 'Total Barang Yang Masih Tersedia'];
            $datasets_product = $this->dashboard->getStockProduct();
            $results_product = array(
                'labels' => $labels_product,
                'datasets' => $datasets_product
            );

            // Data untuk ngecek product yang masih ada di warehouse dan di cabang

            $labels_stock = ['Total Barang di Warehouse', 'Total Barang di Cabang'];
            $datasets_stock = $this->dashboard->getWarehouseBranchStock();
            $results_stock = array(
                'labels' => $labels_stock,
                'datasets' => $datasets_stock
            );


            $results = array(
                'stock_product' => $results_product,
                'stock_branch_warehouse' => $results_stock
            );
			$status = 200;
			$message = 'Success';
        }else{
            $results = 'Failed';
			$status = 405;
			$message = 'Method not allowed';
        }

        $data['product'] = $results;
        $data['status'] = $status;
        $data['message'] = $message;

        echo json_encode($data);

    }
}