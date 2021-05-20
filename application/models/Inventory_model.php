<?php

class Inventory_model extends CI_model{

    public function getBranchData($branch_id, $filter){

        if($filter == 'harian' || $filter == 'Harian'){
            $select = 'DATE_FORMAT(a.createdDate, "%e %b %Y") as date, a.unit as unit_sold, a.unit * d.price as total,';
            $group_by = '';
        }else if($filter == 'mingguan' || $filter == 'Mingguan'){
            $select = 'DATE_FORMAT(a.createdDate, "%e %b %Y") as date, a.unit as unit_sold, a.unit * d.price as total,';
            $group_by = 'AND a.createdDate > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY a.createdDate DESC';
        }else{
            $select = 'DATE_FORMAT(a.createdDate, "%e %b %Y") as date, a.unit as unit_sold, a.unit * d.price as total,';
            $group_by = 'AND MONTH(a.createdDate) = MONTH(CURRENT_DATE()) AND YEAR(a.createdDate) = YEAR(CURRENT_DATE())';
        }

        $sql = 'SELECT c.name as branch,
                    d.productCode as product_code,
                    '.$select.'
                    d.productName as product_name,
                    d.price as unit_cost
                FROM transaction a
                LEFT JOIN branch_has_product b ON a.branch_productID = b.id
                INNER JOIN branch c ON b.branchID = c.id
                INNER JOIN product d ON b.productID = d.productCode
                WHERE b.branchID = '.$branch_id.'
                '.$group_by.'
                ';

        return $this->db->query($sql)->result();
    }

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
                            c.stock as warehouse_stock,
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