<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">

                
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($costumers as $data): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><a href="<?= base_url('admin/hapus_user/').$data['id_user'] ?>" onclick="return confirm('Yakin ingin menghapus user?')"><i class="fas fa-trash fa-lg"></i></a></td>
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