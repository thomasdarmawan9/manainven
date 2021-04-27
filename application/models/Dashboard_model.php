<?php

class Dashboard_model extends CI_model{

    public function getStockProduct(){

        $sql = 'SELECT b.name as branch,
                COALESCE(SUM(c.stock), 0) as total_branch,
                COALESCE(d.total_sold, 0) as total_unit_sold
                FROM branch_has_product a
                INNER JOIN branch b ON a.branchID = b.id
                INNER JOIN product c ON a.productID = c.productID
                LEFT JOIN (SELECT SUM(f.unit) as total_sold,
                            f.branch_productID
                            FROM branch_has_product e
                            LEFT JOIN transaction f ON f.branch_productID = e.id
                            GROUP BY e.branchID
                            ORDER BY e.id DESC
                        ) as d
                        ON a.id = d.branch_productID
                GROUP BY a.branchID
                ORDER BY a.id DESC
        ';
        $results = $this->db->query($sql)->result();

        $stock = array();

        foreach($results as $row){
            $data = array(
                'label' => $row->branch,
                'stack' => $row->branch,
                'data' => [$row->total_unit_sold, $row->total_branch]
            );

            array_push($stock, $data);
        }

        return $stock;
    }

    public function getWarehouseBranchStock(){
        $results = $this->db->select('SUM(a.stock) as stock_branch, SUM(b.stock) as stock_warehouse')
        ->from('product a')
        ->join('warehouse_has_stock b', 'a.productID = b.productID', 'left')
        ->order_by('b.id', 'desc')
        ->get()
        ->result();

        $stock = array();

        foreach($results as $row){
            $data = array(
                'label' => 'Total Barang',
                'data' => [$row->stock_warehouse, $row->stock_branch]
            );

            array_push($stock, $data);
        }

        return $stock;

    }

}