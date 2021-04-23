<?php

class Inventory_model extends CI_model{

    public function getWarehouseData($id)
    {
       $where = '';

       if($id !== 'all'){
            $where .= 'a.warehouseID = '.$id.'';
       }else{
        $where .= 'a.warehouseID IS NOT NULL';
       }

       return $this->db->select('
                            a.id as stock_id,
                            a.stock as warehouse_stock,
                            b.name as warehouse,
                            c.productCode as product_code,
                            c.productName as product_name,
                            c.price as unit_cost
        ')
        ->from('warehouse_has_stock a')
        ->join('warehouse b', 'a.warehouseID = b.id', 'inner')
        ->join('product c', 'a.productID = c.productID', 'inner')
        ->where($where)
        ->order_by('a.id', 'desc')
        ->get()
        ->result();
    }
}