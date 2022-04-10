<?php

class Dashboard_user extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Halaman Dashboard | USER";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar_user');
        $this->load->view('administrator/Dashboard_user');
        $this->load->view('templates_administrator/footer');
    }
}
