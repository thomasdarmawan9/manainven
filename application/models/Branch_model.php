<?php

class Branch_model extends CI_model{


    public function getAllBranch(){
        return $this->db->get('branch')->result();
    }

    public function addBranch($table, $data){
        $branch = $this->db->insert($table, $data);

        if($branch){
            return $this->getAllBranch();
        }else{
            return $branch;
        }
    }

    public function updateBranch($table, $data, $id){
        $branch = $this->db->where('id', $id)->update($table, $data);

        if($branch){
            return $this->getAllBranch();
        }else{
            return $branch;
        }
    }

    public function removeBranch($table,$id){
        $branch = $this->db->where('id', $id)->delete($table);

        if($branch){
            return $this->getAllBranch();
        }else{
            return $branch;
        }
    }
}