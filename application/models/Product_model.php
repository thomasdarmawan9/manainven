<?php

class Product_model extends CI_model
{

    public function getAllProduct()
    {
        return $this->db->order_by('productID', 'desc')->get('product')->result();
    }

    public function getProductByID($id)
    {
        return $this->db->where('productID', $id)->get('product')->row();
    }

    public function getLastProduct()
    {
        return $this->db->order_by('productID', 'desc')->get('product')->row();
    }

    public function addProduct($table, $data)
    {
        $product = $this->db->insert($table, $data);

        if ($product) {
            $data['results'] = $this->getAllProduct();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function updateProduct($table, $data, $id)
    {
        $product =  $this->db->where('productID', $id)->update($table, $data);

        if ($product) {
            $data['results'] = $this->getAllProduct();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function removeProduct($table, $id)
    {
        $product = $this->db->where('productID', $id)->delete($table);

        if ($product) {
            $data['results'] = $this->getAllProduct();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function getBranchProduct()
    {
        return $this->db->select('a.id as productBranchID, b.productID, b.productName, c.id as branchID')
            ->from('branch_has_product a')
            ->join('product b', 'a.productID = b.productID', 'left')
            ->join('branch c', 'a.branchID = c.id', 'left')
            ->order_by('a.id', 'desc')
            ->get()
            ->result();
    }

    public function api_get_product_from_warehouse()
    {
        return $this->db->select('warehouse_has_stock.productID, productName, productCode, warehouse.name as warehouse, branchID, product.price')
            ->from('warehouse')
            ->join('warehouse_has_branch', 'warehouse.id = warehouse_has_branch.warehouseID', 'inner')
            ->join('warehouse_has_stock', 'warehouse.id = warehouse_has_stock.warehouseID', 'inner')
            ->join('product', 'product.productID = warehouse_has_stock.productID', 'inner')
            ->where('warehouse_has_stock.warehouseID', $this->session->userdata('warehouseID'))
            ->get()
            ->result();
    }

    public function getBranchProductByID($id)
    {
        return $this->db->select('a.id as productBranchID, a.productID, a.productName, a.stock, a.price, c.id as branchID')
            ->where('branchID', $id)
            ->from('branch_has_product a')
            ->join('branch c', 'a.branchID = c.id', 'left')
            ->order_by('a.id', 'desc')
            ->get()
            ->result();
    }


    public function addProductBranch($data, $table)
    {
        $product = $this->db->insert($table, $data);

        if ($product) {
            $data['results'] = 'success';
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }

    public function updateProductBranch($table, $data, $id)
    {
        $update = $this->db->where('id', $id)->update($table, $data);

        if($update){
            $data['results'] = $this->getBranchProduct();
        }else{
            $data['results'] = 'error';
        }

        return $data;
    }

    public function removeProductBranch($table, $id)
    {
        $remove = $this->db->where('id', $id)->delete($table);

        if ($remove) {
            $data['results'] = $this->getBranchProduct();
        } else {
            $data['results'] = 'error';
        }

        return $data;
    }
}
