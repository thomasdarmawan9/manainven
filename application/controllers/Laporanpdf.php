<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'WITA FOTO COPY',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR PEMBELIAN',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'Produk',1,0);
        $pdf->Cell(30,6,'Vendor',1,0);
        $pdf->Cell(27,6,'Harga',1,0);
        $pdf->Cell(40,6,'Tanggal Pengiriman',1,0);
        $pdf->Cell(35,6,'Tanggal Dibuat',1,1);

        $pdf->SetFont('Arial','',10);

        $pembelian = $this->db->get('purchaseorder')->result();
        foreach ($pembelian as $row){
            $pdf->Cell(30,6,$row->produk,1,0);
            $pdf->Cell(30,6,$row->id_vendor,1,0);
            $pdf->Cell(27,6,$row->harga,1,0);
            $pdf->Cell(40,6,$row->tanggal_pengiriman,1,0); 
            $pdf->Cell(35,6,$row->create_date,1,1); 
        }

        $pdf->Output();
    }
}