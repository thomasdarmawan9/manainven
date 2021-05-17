<?php

class Dashboard_model extends CI_model{

    public function getStockProduct(){

        $sql = 'SELECT b.name as branch,
                COALESCE(SUM(a.stock), 0) as total_branch,
                COALESCE(d.total_sold, 0) as total_unit_sold
                FROM branch_has_product a
                INNER JOIN branch b ON a.branchID = b.id
                -- INNER JOIN product c ON a.productID = c.productCode
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
        $result_branch = $this->db->select('id')
        ->from('branch')
        ->get()
        ->result_array();

        

        if($result_branch){

            $result_stock_trans = $this->db->select('sum(unit) as stock_cb')
            ->from('transaction')
            ->join('branch_has_product', 'transaction.branch_productID = branch_has_product.id', 'inner')
            ->where('branch_has_product.branchID',$result_branch[0]['id'])
            ->get()
            ->result_array();

            if($result_stock_trans){
                $results = $this->db->select('SUM(a.stock) as stock_warehouse, SUM(b.stock) - ' .$result_stock_trans[0]['stock_cb'].' as stock_branch' )
                ->from('product a')
                ->join('branch_has_product b', 'a.productCode = b.productID', 'left')
                ->order_by('b.id', 'desc')
                ->where('branchID',$result_branch[0]['id'])
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
    

    }

    public function getWarehouseBranchStock2(){
        $result_branch = $this->db->select('id')
        ->from('branch')
        ->get()
        ->result_array();

        if($result_branch){
            $result_stock_trans = $this->db->select('sum(unit) as stock_cb')
            ->from('transaction')
            ->join('branch_has_product', 'transaction.branch_productID = branch_has_product.id', 'inner')
            ->where('branch_has_product.branchID',$result_branch[1]['id'])
            ->get()
            ->result_array();

            if($result_stock_trans){
                
                $results = $this->db->select('SUM(a.stock) as stock_warehouse, SUM(b.stock) - ' .$result_stock_trans[0]['stock_cb']. ' as stock_branch')
                ->from('product a')
                ->join('branch_has_product b', 'a.productCode = b.productID', 'left')
                ->order_by('b.id', 'desc')
                ->where('branchID',$result_branch[1]['id'])
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
    
    }

}