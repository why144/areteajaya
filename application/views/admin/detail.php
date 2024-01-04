  <!-- Begin Page Content -->
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 200px;">
                <div class="card-body">
                    <h4 class="card-title">Detail Pesanan</h4>
                    <hr class="divider">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                   
                        <div class="col-md-10">
                       
                            <table class="table-borderless">
                                <tr>
                                    <td>ID Invoice</td>
                                    <td>: <?= $transaksi['id_invoice']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Sayur</td>
                                    <td>: <?= $transaksi['nama_sayur']; ?> 1 <?= $transaksi['satuan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Satuan</td>
                                    <td>: Rp.<?= $transaksi['harga']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>: <?= $transaksi['jumlah']; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Bayar</td>
                                    <td>: Rp.<?= $transaksi['total_bayar']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Pembeli</td>
                                    <td>: <?= $transaksi['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <?= $transaksi['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>No Handphone</td>
                                    <td>: <?= $transaksi['no_hp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>: <?= $transaksi['status']; ?></td>
                                </tr>
                                <tr>
                                    <?php if($transaksi['status'] == 'Belum Bayar'): ?>
                                        <td>Bukti Bayar</td>
                                        <td>: -</td>
                                    <?php else: ?>
                                        <td>Bukti Bayar</td>
                                        <td>: <a class="badge badge-primary" href="<?= base_url('assets/img/').$transaksi['bukti_bayar'] ?>" target="_blank">Lihat</a></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <?php if($transaksi['status'] == 'Belum Bayar'): ?>
                                        <td>Action</td>
                                        <td>:</td>
                                    <?php elseif($transaksi['status'] == 'Menunggu Konfirmasi Pembayaran'): ?>
                                        <td>Action</td>
                                        <td>: <a class="badge badge-success" href="<?= base_url('admin/action/').$transaksi['id_invoice'].'/'.'Diproses' ?>" onclick="return confirm('Yakin ingin konfirmasi pembayaran?')">Konfimasi</a></td>
                                    <?php elseif($transaksi['status'] == 'Diproses'): ?>
                                        <td>Action</td>
                                        <td>: <a class="badge badge-success" href="<?= base_url('admin/action/').$transaksi['id_invoice'].'/'.'Dikirim' ?>" onclick="return confirm('Yakin ingin mengirim sayur?')">Kirim</a></td>
                                    <?php elseif($transaksi['status'] == 'Dikirim'): ?>
                                        <td>Action</td>
                                        <td>: <a class="badge badge-success" href="<?= base_url('admin/action/').$transaksi['id_invoice'].'/'.'Selesai' ?>" onclick="return confirm('Yakin ingin memperbarui status order menjadi selesai?')">Selesai</a></td>
                                    <?php elseif($transaksi['status'] == 'Selesai'): ?>
                                        <td>Action</td>
                                        <td>: -</td>
                                    <?php endif; ?>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <img src="<?= base_url('assets/img/').$transaksi['gambar'] ?>" height="120px" width="120px">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  </div>