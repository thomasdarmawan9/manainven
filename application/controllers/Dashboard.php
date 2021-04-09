<?php

class Dashboard extends CI_Controller {

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $this->load->view('templates/header.php', $data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer.php');
        
    }
}