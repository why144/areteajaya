<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function index()
    {
        $data['judul'] = "Halaman Login";
        $this->load->view('templates/auth-header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth-footer');
    }

    public function login()
    {
        $this->load->model('Auth_model');

        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'email harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi!'
        ]);

        if($this->form_validation->run() == false) {
            $data['judul'] = "Halaman Login";
            $this->load->view('templates/auth-header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth-footer');
        }else
        {
            $this->Auth_model->login();
        }
    }
    public function registration(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Format email salah',
            'is_unique' => 'Email telah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Password harus diisi!',
            'min_length' => 'Password harus minimal 5 karakter',
            'matches' => 'Konfirmasi password salah',
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password]', [
            'required' => 'Password harus diisi!',
            'matches' => 'Konfirmasi password salah',
        ]);



        if ($this->form_validation->run() == false) {
            
            $data['judul'] = 'Halaman Registrasi Akun';
            $this->load->view('templates/auth-header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth-footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'alamat' => htmlentities($this->input->post('alamat'),true),
                'role_id' => 2,
            ];
           
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Registrasi berhasil, silahkan login!
                  </div>');
            redirect('auth');
            
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Anda telah logout!
	  </div>');
		redirect('auth');
    }

}