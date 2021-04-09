<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model {

	public function proseslogin($user,$pass){
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		return $this->db->get('tbuser')->row();
	}
	
}

/* End of file welcome.php */
/* Location: /application/controllers/welcome.php */