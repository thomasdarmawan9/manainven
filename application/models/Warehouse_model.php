<?php

class Warehouse_model extends CI_model{

    public function getAllWarehouse()
    {
        return $this->db->get('warehouse')->result();
    }

    public function getBranchWarehouse(){
        return $this->db->select('a.id as wb_id,
                                b.id as warehouse_id,
                                c.id as branch_id,
                                b.name as warehouse_name,
                                b.description as warehouse_description,
                                c.name as branch,
                                c.location as branch_location
        ')
        ->from('warehouse_has_branch a')
        ->join('warehouse b', 'a.warehouseID = b.id', 'inner')
        ->join('branch c', 'a.branchID = c.id', 'inner')
        ->order_by('a.id', 'desc')
        ->get()
        ->result();
    }


    public function getBranchWarehouseByID($id){
        return $this->db->where('id', $id)->get('warehouse_has_branch');
    }


    public function getBranchWarehouseStock()
    {
        return $this->db->select('a.id as wstock_id,
                                b.id as warehouse_id,
                                d.id as branch_id,
                                e.productID as product_id,
                                b.name as warehouse_name,
                                b.description as warehouse_description,
                                d.name as branch,
                                d.location as branch_location,
                                e.productName as product_name,
                                e.price,
                                e.stock as branch_stock,
                                f.stock as warehouse_stock
        ')
        ->from('warehouse_has_branch a')
        ->join('warehouse b', 'a.warehouseID = b.id', 'inner')
        ->join('branch_has_product c', 'a.branchID = c.branchID', 'inner')
        ->join('branch d', 'c.branchID = d.id', 'inner')
        ->join('product e', 'c.productID = e.productID', 'inner')
        ->join('warehouse_has_stock f', 'e.productID = f.productID')
        ->order_by('a.id', 'desc')
        ->get()
        ->result();
    }

    public function checkExistProductWarehouse($product_id, $warehouse_id){
        return $this->db->where('warehouseID', $warehouse_id)->where('productID', $product_id)->get('warehouse_has_stock');
    }

    public function addWarehouse($table, $data){

        $warehouse = $this->db->insert($table, $data);

        if ($warehouse) {
            $data['results'] = $this->getAllWarehouse();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function updateWarehouse($table, $data, $id)
    {
        $warehouse =  $this->db->where('id', $id)->update($table, $data);

        if ($warehouse) {
            $data['results'] = $this->getAllWarehouse();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function removeWarehouse($table, $id)
    {
        $warehouse = $this->db->where('id', $id)->delete($table);

        if ($warehouse) {
            $data['results'] = $this->getAllWarehouse();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function addBranchWarehouse($table, $data, $warehouse_id){

        $warehouse_exist = $this->getBranchWarehouseByID($warehouse_id);

        if($warehouse_exist->num_rows() == 0){
            $warehouse = $this->db->insert($table, $data);

            if ($warehouse) {
                $data['results'] = $this->getBranchWarehouse();
            } else {
                $data['results'] = 'error';
            }
        }else{
            $data['results'] = 'error';
        }


        return $data;
    }

    public function updateBranchWarehouse($table, $data, $id)
    {
        $warehouse = $this->db->where('id', $id)->update($table, $data);

        if ($warehouse) {
            $data['results'] = $this->getBranchWarehouse();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function removeBranchWarehouse($table, $id){

        $warehouse = $this->db->where('id', $id)->delete($table);

        if ($warehouse) {
            $data['results'] = $this->getBranchWarehouse();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function addWarehouseStock($table, $data, $product_id, $warehouse_id){

        $product_exist = $this->checkExistProductWarehouse($product_id, $warehouse_id);

        if($product_exist->num_rows() == 0){
            $warehouse = $this->db->insert($table, $data);

            if ($warehouse) {
                $data['results'] = $this->getBranchWarehouseStock();
            } else {
                $data['results'] = 'error';
            }
        }else{
            $data['results'] = 'error';
        }


        return $data;
    }

    public function updateWarehouseStock($table, $data, $id)
    {
        $stock = $this->db->where('id', $id)->update($table, $data);

        if ($stock) {
            $data['results'] = $this->getBranchWarehouseStock();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function removeWarehouseStock($table, $id){

        $warehouse = $this->db->where('id', $id)->delete($table);

        if ($warehouse) {
            $data['results'] = $this->getBranchWarehouseStock();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

}