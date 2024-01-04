<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['email']){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda belum login!
              </div>');
            redirect('auth');
        }
        $this->load->model('admin_model');
    }

    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['sayur'] = $this->admin_model->getSayur();
        $data['transaksi'] = $this->admin_model->getTransaksi();
        $data['costumer'] = $this->admin_model->getCostumer();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/admin_footer');
    }

    public function daftar_sayur()
    {

        $data['judul'] = 'Halaman Daftar Sayur';
        $data['sayur'] = $this->admin_model->getAllSayur();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('admin/daftar_sayur');
        $this->load->view('templates/admin_footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama sayur harus diisi!',
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim', [
            'required' => 'Stok sayur harus diisi!',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'Harga sayur harus diisi!',
            'numeric' => 'Harga harus berupa angka!'
        ]);

        if($this->form_validation->run() == false) {
            redirect('admin/daftar_sayur');
        } else {
            $this->admin_model->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data sayur berhasil ditambahkan
            </div>');
            redirect('admin/daftar_sayur');
        }
    }

    public function tambah_stok(){
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim', [
            'required' => 'stok sayur harus diisi!',
        ]);

        if($this->form_validation->run() == false) {
            redirect('admin/daftar_sayur');
        } else {
            $this->admin_model->tambah_stok();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Stok sayur berhasil di tambah
            </div>');
            redirect('admin/daftar_sayur');
        }
    }
    public function getDataSayurById() {
        echo json_encode($this->admin_model->getDataSayurById($_POST['id']));
    }


    public function transaksi(){
        $data['judul'] = 'Halaman Transakasi';
        $data['transaksi'] = $this->admin_model->getDataTransaksi();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('admin/transaksi',$data);
        $this->load->view('templates/admin_footer');
    }

    public function detail_transaksi($id_invoice) {
        $data['judul'] = 'Halaman Transakasi';
        $data['transaksi'] = $this->admin_model->getDetailDataTransaksi($id_invoice);
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('admin/detail',$data);
        $this->load->view('templates/admin_footer');
    }

    public function action($id_invoice,$status) {
        $this->admin_model->action($id_invoice,$status);
        $url = base_url('admin/detail_transaksi/').$id_invoice;
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Status Berhasil Diperbarui
            </div>');
            redirect($url);
    }

    public function costumer() {
        $data['judul'] = 'Halaman Data Costumer';
        $data['costumers'] = $this->admin_model->getDataCostumer();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('admin/costumer',$data);
        $this->load->view('templates/admin_footer');
    }

    public function hapus_user($id_user){
        $this->admin_model->hapusUser($id_user);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        User Berhasil Dihapus
        </div>');
        redirect('admin/costumer');
    }

    public function laporan() {
        $data['judul'] = 'Halaman Laporan Penjualan';
        $data['laporan'] = $this->admin_model->getDataPenjualan();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar');
        $this->load->view('admin/laporan',$data);
        $this->load->view('templates/admin_footer');
    }

    public function hapus_sayur($id_sayur) {
        $this->admin_model->hapusSayur($id_sayur);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Sayur Berhasil Dihapus
        </div>');
        redirect('admin/daftar_sayur');
    }

    public function edit_sayur($id_sayur) {
       

        
            $data['judul'] = 'Halaman Edit Data Sayur';
            $data['sayur'] = $this->admin_model->getDataSayurById($id_sayur);
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar');
            $this->load->view('admin/edit_sayur',$data);
            $this->load->view('templates/admin_footer');
       
        
    }

    public function simpan_data() {

        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama sayur harus diisi!',
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim', [
            'required' => 'Stok sayur harus diisi!',
        ]);
        if($this->form_validation->run() == false) { 
            $id_sayur = $this->input->post('id');
            $this->edit_sayur($id);
         } else {
            $this->admin_model->edit_sayur();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data sayur berhasil ditambahkan
            </div>');
            redirect('admin/daftar_sayur');
        }

    }

    

}