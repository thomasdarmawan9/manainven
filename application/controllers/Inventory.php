<?php

class Inventory extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inventory_model', 'inventory');
    }

    public function index()
    {
        $this->load->view('templates/header.php');
        $this->load->view('inventory/report');
        $this->load->view('templates/footer.php');
    }

    public function getBranchData()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {

            $inventory = $this->inventory->getBranchData($this->input->get('branch'), $this->input->get('filter'));
            $results = $inventory;
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

    public function getWarehouseData()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {

            $inventory = $this->inventory->getWarehouseData($this->input->get('warehouseID'));
            $results = $inventory;
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