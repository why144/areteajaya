<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        
        <div class="col">
        <?php foreach($transaksi as $data): ?>
            <a href="<?= base_url('costumer/bayar/').$data['id_invoice'] ?>">
            <div class="card mb-3">
            <div class="card-header">
                <h5>Id Invoice : <?= $data['id_invoice']; ?></h5>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= base_url('assets/img/').$data['gambar'] ?>" width="150px" height="120px">
                        </div>
                        <div class="col-md-6">
                            <h4><?= $data['nama_sayur']; ?> 1 <?= $data['satuan']; ?></h4>
                            <p>jumlah : <?= $data['jumlah']; ?></p>
                            <p>Total Bayar : Rp.<?= $data['total_bayar']; ?></p>
                            <p>Tanggal Order : <?= date('d-m-Y', strtotime($data['tgl_order'])); ?></p>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <h5>Status : <?= $data['status']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>