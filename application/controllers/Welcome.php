<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function ceklogin(){
		if (isset($_POST['login'])){
			$user = $this->input->post('user',true);
			$pass = $this->input->post('pass',true);
			$cek = $this->app_model->proseslogin($user,$pass);
			$hasil = count($cek);
			if($hasil > 0){
				redirect('http://localhost/ci_ims/dashboard');
			}else{
				redirect('http://localhost/ci_ims/index.php/welcome');
			}
			
		}
	}
}

/* End of file welcome.php */
/* Location: /application/controllers/welcome.php */