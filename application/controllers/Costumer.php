<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costumer extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['role_id']){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda belum login!
              </div>');
            redirect('auth');
        } 
        $this->load->model('costumer_model');
    }

    public function index(){
        $data['judul'] = 'Areteajaya Store';
        $data['user'] = $this->costumer_model->getUser();
        $data['sayur'] = $this->costumer_model->getAllSayur();
        $this->load->view('templates/costumer_header', $data);
        $this->load->view('templates/costumer_sidebar', $data);
        $this->load->view('templates/costumer_topbar', $data);
        $this->load->view('costumer/index');
        $this->load->view('templates/costumer_footer');
    }

    public function order($id) {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'NO HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if($this->form_validation->run() == false) 
        {
            $data['judul'] = 'Halaman Order';
            $data['user'] = $this->costumer_model->getUser();
            $data['sayur'] = $this->costumer_model->getSayurById($id);
            $this->load->view('templates/costumer_header', $data);
            $this->load->view('templates/costumer_sidebar', $data);
            $this->load->view('templates/costumer_topbar', $data);
            $this->load->view('costumer/order');
            $this->load->view('templates/costumer_footer');
        } else {
            $id = date('Y') . mt_rand(100,1000);
            $this->costumer_model->order($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Order Berhasil Diproses, Selanjutnya Selesaikan Pembayaran!
            </div>');
            $this->bayar($id);
            
        }
        
    }

    public function bayar($id) {
       
        $data['judul'] = 'Halaman Pembayaran';
        $data['user'] = $this->costumer_model->getUser();
        $data['transaksi'] = $this->costumer_model->getDataTransaksi($id);
        $this->load->view('templates/costumer_header', $data);
        $this->load->view('templates/costumer_sidebar', $data);
        $this->load->view('templates/costumer_topbar', $data);
        $this->load->view('costumer/bayar');
        $this->load->view('templates/costumer_footer');
    }

    public function konfirmasiPembayaran() {
        $this->costumer_model->konfirmasiPembayaran();
        $this->bayar($id_invoice);
    }

    public function profil(){
        $data['judul'] = 'Halaman Pembayaran';
        $data['user'] = $this->costumer_model->getUser();
        $data['tagihan'] = $this->costumer_model->getDataTagihan();
        $data['diproses'] = $this->costumer_model->getDataDiProses();
        $data['selesai'] = $this->costumer_model->getDataSelesai();
        $this->load->view('templates/costumer_header', $data);
        $this->load->view('templates/costumer_sidebar', $data);
        $this->load->view('templates/costumer_topbar', $data);
        $this->load->view('costumer/profil');
        $this->load->view('templates/costumer_footer');
    }

    public function edit_profil() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        
        if($this->form_validation->run() == false) {
            $this->profil();
        } else {
            $this->costumer_model->edit_profil();
        }
    }

    public function transaksi() {
        $data['judul'] = 'Halaman Pembayaran';
        $data['user'] = $this->costumer_model->getUser();
        $data['transaksi'] = $this->costumer_model->getTransaksi();
        $this->load->view('templates/costumer_header', $data);
        $this->load->view('templates/costumer_sidebar', $data);
        $this->load->view('templates/costumer_topbar', $data);
        $this->load->view('costumer/transaksi');
        $this->load->view('templates/costumer_footer');
    }

}