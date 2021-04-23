<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){

		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$username = $this->input->get('username');
			$password = md5($this->input->get('password'));

			$where = array(
				'username' => $username,
				'password' => $password
				);

			$user = $this->m_login->cek_login("user",$where);
			if($user->num_rows() > 0){

				$this->session_set($user->row());

				$data['results'] = $user->row();
				$data['message'] = 'Berhasil Login';
				$data['status'] = 200;

			}else{
				$data['results'] = [];
				$data['message'] = 'Username atau Password Salah';
				$data['status'] = 200;
			}
		 }else{
			$data['results'] = 'Failed';
			$data['status'] = 405;
			$data['message'] = 'Method not allowed';
		 }

		 echo json_encode($data);
	}

	function session_set($user){
		$this->session->set_userdata('id', $user->userID);
		$this->session->set_userdata('username', $user->username);
		$this->session->set_userdata('roles', $user->roles);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}