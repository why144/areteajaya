<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('costumer_model');
    }

    public function index() {
        $data['judul'] = 'Areteajaya Store';
        $data['sayur'] = $this->costumer_model->getAllSayur();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('index');
        $this->load->view('templates/footer');
    }

    public function tentang() {
        $data['judul'] = 'Tentang Areateajaya';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tentang');
        $this->load->view('templates/footer');
    }
}