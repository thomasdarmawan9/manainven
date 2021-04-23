<?php

class Warehouse extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Warehouse_model', 'warehouse');
    }

    public function index()
    {
    }

    public function getWarehouse(){
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $warehouse = $this->warehouse->getAllWarehouse();
            $data['data'] = $warehouse;
			$data['status'] = 200;
			$data['message'] = 'success';
        }else{
            $data['data'] = 'Failed';
			$data['status'] = 405;
			$data['message'] = 'Method not allowed';
        }

        echo json_encode($data);
    }

    public function getBranchWarehouse(){
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $warehouse = $this->warehouse->getBranchWarehouse();
            $data['data'] = $warehouse;
			$data['status'] = 200;
			$data['message'] = 'success';
        }else{
            $data['data'] = 'Failed';
			$data['status'] = 405;
			$data['message'] = 'Method not allowed';
        }

        echo json_encode($data);
    }

    public function getBranchWarehouseStock(){
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $warehouse = $this->warehouse->getBranchWarehouseStock();
            $data['data'] = $warehouse;
			$data['status'] = 200;
			$data['message'] = 'success';
        }else{
            $data['data'] = 'Failed';
			$data['status'] = 405;
			$data['message'] = 'Method not allowed';
        }

        echo json_encode($data);
    }

    public function addWarehouse(){
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);


            if(empty($post['name'])){
                $results = [];
                $message = 'Name Not Found';
                $status = 204;
            }else if(empty($post['description'])){
                $results = [];
                $message = 'Description Required';
                $status = 204;
            }else{
                $insert = array(
                    'name' => $post['name'],
                    'description' => $post['description'],
                    'createdDate' => date('Y-m-d H:i:s'),
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $warehouse = $this->warehouse->addWarehouse('warehouse', $insert);

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Warehouse successfully added';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Warehouse failed to added';
                    $status = 400;
                }
            }
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

    public function updateWarehouse()
    {
        if ($this->input->server('REQUEST_METHOD') === 'PUT') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else if(empty($post['name'])){
                $results = [];
                $message = 'Name Required';
                $status = 204;
            }else if(empty($post['description'])){
                $results = [];
                $message = 'Description Required';
                $status = 204;
            }else{
                $update = array(
                    'name' => $post['name'],
                    'description' => $post['description'],
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $warehouse = $this->warehouse->updateWarehouse('warehouse', $update, $this->input->get('id'));

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Warehouse successfully updated';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Warehouse failed to updated';
                    $status = 400;
                }
            }

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

    public function deleteWarehouse(){
        if ($this->input->server('REQUEST_METHOD') === "DELETE") {
            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else{

                $warehouse = $this->warehouse->removeWarehouse('warehouse', $this->input->get('id'));

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Warehouse successfully deleted';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Warehouse failed to deleted';
                    $status = 400;
                }
            }
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

    public function addBranchWarehouse(){
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);


            if(empty($post['warehouse'])){
                $results = [];
                $message = 'Warehouse Required';
                $status = 204;
            }else if(empty($post['branch'])){
                $results = [];
                $message = 'Branch Required';
                $status = 204;
            }else{
                $insert = array(
                    'warehouseID' => $post['warehouse'],
                    'branchID' => $post['branch'],
                    'createdDate' => date('Y-m-d H:i:s'),
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $warehouse = $this->warehouse->addBranchWarehouse('warehouse_has_branch', $insert, $post['warehouse']);

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Warehouse Branch successfully added';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Warehouse Branch failed to added';
                    $status = 400;
                }
            }
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

    public function updateBranchWarehouse()
    {
        if ($this->input->server('REQUEST_METHOD') === 'PUT') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else if(empty($post['branch'])){
                $results = [];
                $message = 'Branch Required';
                $status = 204;
            }else{
                $update = array(
                    'branchID' => $post['branch'],
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $warehouse = $this->warehouse->updateBranchWarehouse('warehouse_has_branch', $update, $this->input->get('id'));

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Warehouse Branch successfully updated';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Warehouse Branch failed to updated';
                    $status = 400;
                }
            }

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

    public function deleteBranchWarehouse(){
        if ($this->input->server('REQUEST_METHOD') === "DELETE") {
            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else{

                $warehouse = $this->warehouse->removeBranchWarehouse('warehouse_has_branch', $this->input->get('id'));

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Warehouse Branch successfully deleted';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Warehouse Branch failed to deleted';
                    $status = 400;
                }
            }
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

    public function addWarehouseStock(){
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);


            if(empty($post['warehouse'])){
                $results = [];
                $message = 'Warehouse Required';
                $status = 204;
            }else if(empty($post['product'])){
                $results = [];
                $message = 'Product Required';
                $status = 204;
            }else if(empty($post['stock'])){
                $results = [];
                $message = 'Stock Required';
                $status = 204;
            }else{
                $insert = array(
                    'warehouseID' => $post['warehouse'],
                    'productID' => $post['product'],
                    'stock' => $post['stock'],
                    'createdDate' => date('Y-m-d H:i:s'),
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $warehouse = $this->warehouse->addWarehouseStock('warehouse_has_stock', $insert, $post['product'], $post['warehouse']);

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Stock successfully added';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Stock failed to added';
                    $status = 400;
                }
            }
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

    public function updateWarehouseStock()
    {
        if ($this->input->server('REQUEST_METHOD') === 'PUT') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else if(empty($post['warehouse'])){
                $results = [];
                $message = 'Warehouse Required';
                $status = 204;
            }else if(empty($post['product'])){
                $results = [];
                $message = 'Product Required';
                $status = 204;
            }else if(empty($post['stock'])){
                $results = [];
                $message = 'Stock Required';
                $status = 204;
            }else{
                $update = array(
                    'warehouseID' => $post['warehouse'],
                    'productID' => $post['product'],
                    'stock' => $post['stock'],
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $warehouse = $this->warehouse->updateWarehouseStock('warehouse_has_stock', $update, $this->input->get('id'));

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Stock successfully updated';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Stock failed to updated';
                    $status = 400;
                }
            }

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

    public function deleteWarehouseStock(){
        if ($this->input->server('REQUEST_METHOD') === "DELETE") {
            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else{

                $warehouse = $this->warehouse->removeWarehouseStock('warehouse_has_stock', $this->input->get('id'));

                if($warehouse['results'] != 'error'){
                    $results = $warehouse['results'];
                    $message = 'Stock successfully deleted';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Stock failed to deleted';
                    $status = 400;
                }
            }
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