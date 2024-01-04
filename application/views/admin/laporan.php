<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Sayur</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Terjual</th>
                        <th scope="col">Total Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($laporan as $data): ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $data['nama_sayur']; ?></td>
                            <td><?= $data['satuan']; ?></td>
                            <td>Rp.<?= $data['harga']; ?></td>
                            <td><?= $data['stok']; ?></td>
                            <td><?= $data['jml_terjual']; ?></td>
                            <td><?php $total = $data['harga'] * $data['jml_terjual'] ?> Rp.<?= $total; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>