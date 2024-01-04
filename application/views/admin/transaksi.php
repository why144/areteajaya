 <!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php foreach($transaksi as $data): ?>
                <a href="<?= base_url('admin/detail_transaksi/').$data['id_invoice'] ?>">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4>ID Invoice : <?= $data['id_invoice']; ?></h4>
                        </div>
                        <div class="card-body">
                        <h4 class="card-title"><?= $data['nama_sayur']; ?> 1 <?= $data['satuan']; ?></h4>
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="<?= base_url('assets/img/').$data['gambar'] ?>" height="120px" width="200px">
                                    
                                </div>
                                <div class="col-md-7">
                                    <div>
                                    <table class="table-borderless">
                                        <tr>
                                            <td>Nama Pelanggan</td>
                                            <td>: <?= $data['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Order</td>
                                            <td>: <?= date('d-m-Y', strtotime($data['tgl_order'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td>: <?= $data['jumlah']; ?></td>
                                        </tr>
                                        <tr class="alig">
                                            <td>Total Bayar</td>
                                            <td>: Rp.<?= $data['total_bayar']; ?></td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                <table class="table-borderless">
                                    <tr>
                                        <td>Status: </td>
                                        <td> <?= $data['status']; ?></td>
                                    </tr>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>