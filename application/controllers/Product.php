<?php

class Product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'product');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $product = $this->product->getAllProduct();
            $data['results'] = $product;
			$data['status'] = 200;
			$data['message'] = 'Success';
        }else{
            $data['results'] = 'Failed';
			$data['status'] = 405;
			$data['message'] = 'Method not allowed';
        }

        echo json_encode($data);
    }

    public function addProduct()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($post['code'])){
                $results = [];
                $message = 'Code Required';
                $status = 204;
            }else if(empty($post['name'])){
                $results = [];
                $message = 'Name Required';
                $status = 204;
            }elseif(empty($post['price'])){
                $results = [];
                $message = 'Price Required';
                $status = 204;
            }elseif(empty($post['stock'])){
                $results = [];
                $message = 'Stock Required';
                $status = 204;
            }else{
                $insert = array(
                    'productCode' => $post['code'],
                    'productName' => $post['name'],
                    'price' => $post['price'],
                    'stock' => $post['stock'],
                    'createdDate' => date('Y-m-d H:i:s'),
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $product = $this->product->addProduct('product', $insert);

                if($product['results'] != 'error'){
                    $results = $product['results'];
                    $message = 'Product successfully added';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Product failed to added';
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

    public function updateProduct()
    {
        if ($this->input->server('REQUEST_METHOD') === 'PUT') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else if(empty($post['code'])){
                $results = [];
                $message = 'Code Required';
                $status = 204;
            }else if(empty($post['name'])){
                $results = [];
                $message = 'Name Required';
                $status = 204;
            }elseif(empty($post['price'])){
                $results = [];
                $message = 'Price Required';
                $status = 204;
            }elseif(empty($post['stock'])){
                $results = [];
                $message = 'Stock Required';
                $status = 204;
            }else{
                $update = array(
                    'productCode' => $post['code'],
                    'productName' => $post['name'],
                    'price' => $post['price'],
                    'stock' => $post['stock'],
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $product = $this->product->updateProduct('product', $update, $this->input->get('id'));

                if($product['results'] != 'error'){
                    $results = $product['results'];
                    $message = 'Product successfully updated';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Product failed to updated';
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

    public function deleteProduct(){
        if ($this->input->server('REQUEST_METHOD') === "DELETE") {
            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else{

                $product = $this->product->removeProduct('product', $this->input->get('id'));

                if($product['results'] != 'error'){
                    $results = $product['results'];
                    $message = 'Product successfully deleted';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Product failed to deleted';
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

    public function getBranchProduct()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $product = $this->product->getBranchProduct();
            $data['data'] = $product;
			$data['status'] = 200;
			$data['message'] = 'Success';
        }else{
            $data['data'] = 'Failed';
			$data['status'] = 405;
			$data['message'] = 'Method not allowed';
        }

        echo json_encode($data);
    }

    public function addBranchProduct()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($post['product'])){
                $results = [];
                $message = 'Product Required';
                $status = 204;
            }elseif(empty($post['branch'])){
                $results = [];
                $message = 'Branch Required';
                $status = 204;
            }else{
                $insert = array(
                    'productID' => $post['product'],
                    'branchID' => $post['branch'],
                    'createdDate' => date('Y-m-d H:i:s'),
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $product = $this->product->addProductBranch($insert, 'branch_has_product');

                if($product['results'] != 'error'){
                    $results = $product['results'];
                    $message = 'Product successfully added';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Product failed to added';
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

    public function updateBranchProduct()
    {
        if ($this->input->server('REQUEST_METHOD') === 'PUT') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else if(empty($post['product'])){
                $results = [];
                $message = 'Product Required';
                $status = 204;
            }elseif(empty($post['branch'])){
                $results = [];
                $message = 'Branch Required';
                $status = 204;
            }else{
                $update = array(
                    'productID' => $post['product'],
                    'branchID' => $post['branch'],
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $product = $this->product->updateProductBranch('branch_has_product', $update, $this->input->get('id'));

                if($product['results'] != 'error'){
                    $results = $product['results'];
                    $message = 'Product successfully updated';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Product failed to updated';
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

    public function deleteBranchProduct(){
        if ($this->input->server('REQUEST_METHOD') === "DELETE") {
            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else{

                $product = $this->product->removeProductBranch('branch_has_product', $this->input->get('id'));

                if($product['results'] != 'error'){
                    $results = $product['results'];
                    $message = 'Product successfully deleted';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Product failed to deleted';
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