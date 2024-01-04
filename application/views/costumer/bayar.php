 <!-- Begin Page Content -->
 <div class="container-fluid">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
           
                <div class="card-body">
                    <H2>Alamat Pengiriman</H2>
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama Penerima</td>
                            <td>: <?= $transaksi['nama_pelanggan']; ?></td>
                        </tr>
                        <tr>
                            <td>No Handphone</td>
                            <td>: <?= $transaksi['no_hp']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $transaksi['alamat']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card mt-4 mb-5">
                <div class="card-body">
                    <h2>Detail Produk</h2>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?= base_url('assets/img/').$transaksi['gambar'] ?>" width="250" height="180">
                        </div>
                        <div class="col-md-7">
                            <div>
                                <h3><?= $transaksi['nama_sayur']; ?> 1 <?= $transaksi['satuan']; ?></h3>
                                <p>Jumlah Beli : <?= $transaksi['jumlah']; ?></p>
                                <p>Total Bayar : Rp.<?= $transaksi['total_bayar']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
            <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <h3>Pembayaran</h3>
                    <table class="table table-borderless">
                         <tr>
                            <td>Id Invoice</td>
                            <td id="invoice">: <?= $transaksi['id_invoice']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Rekening</td>
                            <td>: Bank Mandiri</td>
                        </tr>
                        <tr>
                            <td>Nomor Rekening</td>
                            <td>: 8889383338</td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>: Arateajaya    </td>
                        </tr>
                
                        <tr>
                            <td>Total</td>
                            <td>: Rp.<?= $transaksi['total_bayar']; ?></td>
                        </tr>
                <?php if($transaksi['status'] == 'Belum Bayar'):  ?>     
                <?= form_open_multipart('costumer/konfirmasiPembayaran');?>
                
                        <tr>
                            <td>Bukti Bayar</td>
                            <td>
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="bukti_bayar" name="bukti_bayar" required>
                                <label class="custom-file-label" id="label-bukti-bayar" for="bukti_bayar">Upload Bukti Bayar</label>
                                </div>
                            </td>
                        </tr>
                        <input type="text" name="id_invoice" id="id_invoice" value="<?= $transaksi['id_invoice'] ?>" hidden>
                    </table>
                    <p class="text-warning">Sudah Melakukan Pembayaran? Silahkan Klik Tombol Dibawah!</p>
                    <button class="btn btn-primary float-right" type="submit">Konfirmasi</button> 
                <?php else: ?>
                    <tr>
                        <td>Status</td>
                        <td>: <?= $transaksi['status']; ?></td>
                    </tr>
                   
                </form> 
                <?php endif; ?> 
                         
                </div>
            </div>
        </div>
    </div>

 </div>