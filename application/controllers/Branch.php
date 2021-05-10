<?php

class Branch extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Branch_model', 'branch');
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

    // public function index(){
    //     $this->load->view('templates/header.php');
    //     $this->load->view('branch/index');
    //     $this->load->view('templates/footer.php');
    // }

    public function index(){
        $this->load->view('templates/header.php');
        $this->load->view('branch/cabang');
        $this->load->view('templates/footer.php');
    }

    public function api_index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $branch = $this->branch->getAllBranch();
            $data['data'] = $branch;
			$data['status'] = 200;
			$data['message'] = 'Success';
        }else{
            $data['data'] = 'Failed';
			$data['status'] = 405;
			$data['message'] = 'Method not allowed';
        }

        echo json_encode($data);
    }

    public function addBranch()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            date_default_timezone_set('Asia/Jakarta');
            $post = json_decode(file_get_contents("php://input"),true);

            if(empty($post['name'])){
                $results = [];
                $message = 'Name Required';
                $status = 204;
            }elseif(empty($post['location'])){
                $results = [];
                $message = 'Location Required';
                $status = 204;
            }else{
                $insert = array(
                    'name' => $post['name'],
                    'location' => $post['location'],
                    'createDate' => date('Y-m-d H:i:s'),
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $branch = $this->branch->addBranch('branch', $insert);

                if($branch){
                    $results = $branch;
                    $message = 'Branch successfully added';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Branch failed to added';
                    $status = 400;
                }
            }

        }else{
            $results = 'Failed';
			$status = 405;
			$message = 'Method not allowed';
        }

        $data['results'] = $results;
        $data['status'] = $status;
        $data['message'] = $message;

        echo json_encode($data);
    }

    public function updateBranch(){

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
            }elseif(empty($post['location'])){
                $results = [];
                $message = 'Location Required';
                $status = 204;
            }else{
                $update = array(
                    'name' => $post['name'],
                    'location' => $post['location'],
                    'updateAt' => date('Y-m-d H:i:s')
                );

                $branch = $this->branch->updateBranch('branch', $update, $this->input->get('id'));

                if($branch){
                    $results = $branch;
                    $message = 'Branch successfully updated';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Branch failed to updated';
                    $status = 400;
                }
            }

        }else{
            $results = 'Failed';
			$status = 405;
			$message = 'Method not allowed';
        }

        $data['results'] = $results;
        $data['status'] = $status;
        $data['message'] = $message;

        echo json_encode($data);
    }

    public function deleteBranch(){
        if ($this->input->server('REQUEST_METHOD') === "DELETE") {
            if(empty($this->input->get('id'))){
                $results = [];
                $message = 'ID Not Found';
                $status = 204;
            }else{

                $branch = $this->branch->removeBranch('branch', $this->input->get('id'));

                if($branch){
                    $results = $branch;
                    $message = 'Branch successfully deleted';
                    $status = 200;
                }else{
                    $results = [];
                    $message = 'Branch failed to deleted';
                    $status = 400;
                }
            }
        }else{
            $results = 'Failed';
			$status = 405;
			$message = 'Method not allowed';
        }

        $data['results'] = $results;
        $data['status'] = $status;
        $data['message'] = $message;

        echo json_encode($data);
    }

}