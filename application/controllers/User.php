<?php

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'User Manager';
        $data['user'] = $this->User_model->getAllUser();
        if($this->input->post('keyword')){
            $data['user'] = $this->User_model->searchUser();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Add Account Form';
        $this->form_validation->set_rules('name', 'Account Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('pass', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('roles', 'Roles', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('user/add');
            $this->load->view('templates/footer');
        } else{
            $this->User_model->addUser();
            $this->session->set_flashdata('flash', 'Add');
            redirect('user');
        }
    }

    public function delete($id)
    {
        $this->User_model->deleteUser($id);
        $this->session->set_flashdata('flash', 'Delete');
        redirect('user');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['user'] = $this->User_model->getUserById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data['judul'] = 'Update Account Form';
        $data['user'] = $this->User_model->getUserById($id);
        $this->form_validation->set_rules('name', 'Account Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('pass', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('roles', 'Roles', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('user/update', $data);
            $this->load->view('templates/footer');
        } else{
            $this->User_model->updateUser();
            $this->session->set_flashdata('flash', 'Update');
            redirect('user');
        }
    }
}