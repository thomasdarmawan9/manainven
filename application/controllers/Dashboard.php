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

            // Data untuk ngecek product yang masih ada di warehouse dan di cabang 1

            $labels_stock1 = ['Total Barang di Warehouse Cabang Jakarta Timur', 'Total Barang di Cabang Jakarta Timur'];
            $datasets_stock1 = $this->dashboard->getWarehouseBranchStock();
            $results_stock1 = array(
                'labels' => $labels_stock1,
                'datasets' => $datasets_stock1
            );

             // Data untuk ngecek product yang masih ada di warehouse dan di cabang 2

             $labels_stock2 = ['Total Barang di Warehouse Cabang Jakarta Selatan', 'Total Barang di Cabang Jakarta Selatan'];
             $datasets_stock2 = $this->dashboard->getWarehouseBranchStock2();
             $results_stock2 = array(
                 'labels' => $labels_stock2,
                 'datasets' => $datasets_stock2
             );
 

            $results = array(
                'stock_product' => $results_product,
                'stock_branch_warehouse_cb_jt' => $results_stock1,
                'stock_branch_warehouse_cb_js' => $results_stock2
            );
			$status = 200;
			$message = 'Success';
        }else{
            $results = 'Failed';
			$status = 405;
			$message = 'Method not allowed';
        }

        $data['data'] = $results;
        $data['status'] = $status;
        $data['message'] = $message;

        echo json_encode($data);

    }
}