<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

class Product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'product');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header.php');
        $this->load->view('product/index');
        $this->load->view('templates/footer.php');
    }

    public function api_index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $product = $this->product->getAllProduct();
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

    public function api_get_product_from_warehouse(){
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $product = $this->product->api_get_product_from_warehouse();
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
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($this->input->post('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else{
                $update = array(
                    'productCode' => $this->input->post('productCode'),
                    'productName' => $this->input->post('productName'),
                    'price' => $this->input->post('price'),
                    'stock' => $this->input->post('stock'),
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $product = $this->product->updateProduct('product', $update, $this->input->post('id'));

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

    public function getProductByPCode()
    {
        $post = json_decode(file_get_contents('php://input'), true);
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $product = 
            $this->db->select('*')
            ->from('product')
            ->where('productCode', $this->input->post('PCODE'))
            ->get();
            $data['data'] = $product->row_array();
			$data['status'] = 200;
			$data['message'] = 'Success';
        }else{
            $data['data'] = 'Failed';
			$data['status'] = 405;
			$data['message'] = 'Method not allowed';
        }

        echo json_encode($data);
    }

    public function getBranchProductByID($id)
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $product = $this->product->getBranchProductByID($id);
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

            if(empty($this->input->post('product'))){
                $results = [];
                $message = 'Product Required';
                $status = 204;
            }elseif(empty($this->input->post('branch'))){
                $results = [];
                $message = 'Branch Required';
                $status = 204;
            }else{
                $insert = array(
                    'productID' => $this->input->post('product'),
                    'productName' => $this->input->post('productName'),
                    'branchID' => $this->input->post('branch'),
                    'stock' => $this->input->post('stock'),
                    'price' => $this->input->post('price'),
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
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($this->input->post('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else if(!empty($this->input->post('stock')) && !empty($this->input->post('price'))){
                $update = array(
                    'stock' => $this->input->post('stock'),
                    'price' => $this->input->post('price'),
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $product = $this->product->updateProductBranch('branch_has_product', $update, $this->input->post('id'));

                if($product['results'] != 'error'){
                    $results = $product['results'];
                    $message = 'Product successfully updated';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Product failed to updated';
                    $status = 400;
                }
            }else{
                $results = [];
                $message = 'Product failed to updated';
                $status = 400;
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