<?php 
class Admin_model extends CI_Model{

    public function getAllSayur() {
       return $this->db->get('daftar_sayur')->result_array();

    }

    public function tambah() {
        $upload_gambar = $_FILES['gambar']['name'];
        if($upload_gambar) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('gambar')){
                $new_gambar = $this->upload->data('file_name');
                $data = [
                    'nama_sayur' => htmlspecialchars($this->input->post('nama')),
                    'stok' => htmlspecialchars($this->input->post('stok')),
                    'satuan' => htmlspecialchars($this->input->post('satuan')),
                    'harga' => htmlspecialchars($this->input->post('harga')),
                    'jml_terjual' => 0,
                    'gambar' => $new_gambar
                ];
                $this->db->insert('daftar_sayur', $data);
                
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                   Gambar gagal di upload! Pastikan Gambar Berukuran Maksimal 2Mb dan Berformat JPG/PNG
                    </div>');
                redirect('admin/daftar_sayur');
            }
        }
        
    }

    public function tambah_stok(){
        $nama = $this->input->post('nama');
        $stok_tambahan = $this->input->post('stok');
        $data = $this->db->get_where('daftar_sayur', ['nama_sayur' => $nama])->row_array();
        $stok = $data['stok'];
        $stok_baru = $stok + $stok_tambahan;
        $this->db->set('stok', $stok_baru);
        $this->db->where('nama_sayur', $nama);
        $this->db->update('daftar_sayur');
    }

    public function getDataSayurById($id){
        return $this->db->get_where('daftar_sayur', ['id_sayur' => $id])->row_array();
    }

    public function getSayur() {
        $query = $this->db->get('daftar_sayur');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function edit_sayur() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $stok = $this->input->post('stok');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga');

        $this->db->set('nama_sayur', $nama);
        $this->db->set('stok', $stok);
        $this->db->set('satuan', $satuan);
        $this->db->set('harga', $harga);
        $this->db->where('id_sayur', $id);
        $this->db->update('daftar_sayur');
    }

    public function getTransaksi() {
        $query = $this->db->get('transaksi');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getCostumer() {
        $this->db->where('role_id', 2);
        $query = $this->db->get('user');
        if($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getDataTransaksi() {
        $this->db->select("*");
        $this->db->from('transaksi');
        $this->db->join('daftar_sayur', 'daftar_sayur.id_sayur = transaksi.id_sayur');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDetailDataTransaksi($id_invoice) {
        $this->db->select("*");
        $this->db->from('transaksi');
        $this->db->join('daftar_sayur', 'daftar_sayur.id_sayur = transaksi.id_sayur');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where('transaksi.id_invoice', $id_invoice);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function action($id_invoice, $status) {
        $this->db->set('status', $status);
        $this->db->where('id_invoice', $id_invoice);
        $this->db->update('transaksi');
    }

    public function getDataCostumer() {
        return $this->db->get_where('user', ['role_id' => 2])->result_array();
       
    }

    public function hapusUser($id_user) {
        $this->db->delete('user', ['id_user' => $id_user]);
    }

    public function getDataPenjualan() {
        return $this->db->get('daftar_sayur')->result_array();
    }

    public function hapusSayur($id_sayur) {
        $this->db->delete('daftar_sayur', ['id_sayur' => $id_sayur]);
    }
   
}

?>