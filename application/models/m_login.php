<?php

class M_login extends CI_Model{
	function cek_login($table,$where){
		return $this->db->select('b.userID, b.name, b.username, b.roles, c.id as branchID, c.name as branch, e.name as warehouse, warehouseID')
		->from('user_has_branch a')
		->join('user b', 'a.userID = b.userID', 'inner')
		->join('branch c', 'a.branchID = c.id', 'left')
		->join('warehouse_has_branch d', 'c.id = d.branchID', 'left')
		->join('warehouse e', 'd.warehouseID = e.id', 'left')
		->where($where)
		->get();
	}
}