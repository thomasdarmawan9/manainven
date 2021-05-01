<?php

class M_login extends CI_Model{
	function cek_login($table,$where){
		return $this->db->select('b.userID, b.username, b.roles, c.id as branchID, c.name as branch')
		->from('user_has_branch a')
		->join('user b', 'a.userID = b.userID', 'inner')
		->join('branch c', 'a.branchID = c.id', 'inner')
		->where($where)
		->get();
	}
}