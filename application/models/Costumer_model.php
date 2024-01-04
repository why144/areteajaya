<?php 
class Costumer_model extends CI_Model{

    public function getUser() {
       return  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getAllSayur() {
        return $this->db->get('daftar_sayur')->result_array();
        
    }

    public function getSayurById($id) {
        return $this->db->get_where('daftar_sayur', ['id_sayur'=> $id])->row_array();
    }

    public function order($id) {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'id_invoice' => $id,
            'id_sayur' => $this->input->post('id_sayur', true),
            'id_user' => $user['id_user'],
            'nama_pelanggan' => htmlspecialchars($this->input->post('nama', true)),
            'email' => $this->input->post('email', true),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'jumlah' => htmlspecialchars($this->input->post('jumlah'),true),
            'tgl_order' => date('Y-m-d'),
            'total_bayar' => $this->input->post('total_bayar', true),
            'bukti_bayar' => '',
            'status' => 'Belum Bayar'
        ];
        $this->db->insert('transaksi', $data);
    }

    public function getDataTransaksi($id) {
       $this->db->select('*');
       $this->db->from('transaksi');
       $this->db->join('daftar_sayur','daftar_sayur.id_sayur = transaksi.id_sayur');
       $this->db->where('transaksi.id_invoice', $id);
       $query = $this->db->get()->row_array();
       return $query;
    }

    public function konfirmasiPembayaran(){
        $upload_bukti_bayar = $_FILES['bukti_bayar']['name'];

        if($upload_bukti_bayar) {
            $id_invoice = $this->input->post('id_invoice');
            $data = $this->db->get_where('transaksi', ['id_invoice' => $id_invoice])->row_array();
            $jumlah_beli = $data['jumlah'];
            $id_sayur = $data['id_sayur'];
            $data_sayur = $this->db->get_where('daftar_sayur', ['id_sayur' => $id_sayur])->row_array();
            $jml_terjual = $data_sayur['jml_terjual'];
            $stok = $data_sayur['stok'];
            $new_jml_terjual = $jumlah_beli + $jml_terjual;
            $new_stok = $stok - $jumlah_beli;
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('bukti_bayar')){
                $new_bukti_bayar = $this->upload->data('file_name');
                $this->db->set('bukti_bayar', $new_bukti_bayar);
                $this->db->set('status', 'Menunggu Konfirmasi Pembayaran');
                $this->db->where('id_invoice', $id_invoice);
                $this->db->update('transaksi');

                $this->db->set('jml_terjual', $new_jml_terjual);
                $this->db->set('stok', $new_stok);
                $this->db->where('id_sayur', $id_sayur);
                $this->db->update('daftar_sayur');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Upload Bukti Bayar Gagal! Pastikan ukuran maksimal 2mb dan file berformat JPG/PNG
                    </div>');
                return $id_invoice;
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Bukti Pembayaran Berhasil Di Upload! Harap menunggu konfirmasi admin!
                  </div>');
            redirect('costumer');

        }
    }

    public function edit_profil() {
        $id = $this->input->post('id');
        $nama = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));

        $this->db->set('nama', $nama);
        $this->db->set('email', $email);
        $this->db->set('alamat', $alamat);
        $this->db->where('id_user', $id);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Profil berhasil di edit!
          </div>');
        redirect('costumer/profil');
    }

    public function getDataTagihan() {
        $this->db->where('status', 'Belum Bayar');
        $query = $this->db->get('transaksi');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    
    public function getDataDiProses() {
        $this->db->where('status', 'Diproses');
        // $this->db->where('status', 'Dikirim');
        $query = $this->db->get('transaksi');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    
    public function getDataSelesai() {
        $this->db->where('status', 'Selesai');
        $query = $this->db->get('transaksi');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getTransaksi() {
       $email = $this->session->userdata('email');
       $this->db->select('*');
       $this->db->from('transaksi');
       $this->db->join('daftar_sayur','daftar_sayur.id_sayur = transaksi.id_sayur');
       $this->db->where('transaksi.email', $email);
       $query = $this->db->get()->result_array();
       return $query;
    }
}