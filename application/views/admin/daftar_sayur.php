

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row mb-3">
                        <div class="col">
                            <button class="btn btn-primary tampilModalTambahData" data-toggle="modal" data-target="#formModal">Tambah Sayur</button>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                       
                                       
                                        <tbody>
                                            <?php $i = 1 ?>
                                        <?php foreach($sayur as $data): ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><img src="<?= base_url('assets/img/').$data['gambar'] ?>" width="80px" height="80px"></td>
                                                <td><?= $data['nama_sayur']; ?></td>
                                                <td><?= $data['stok']; ?></td>
                                                <td><?= $data['satuan']; ?></td>
                                                <td><?= 'Rp.'.$data['harga']; ?></td>
                                                <td>
                                                <a href="<?= base_url('admin/edit_sayur/').$data['id_sayur'] ?>" class="btn btn-primary"><i class="fas fa-pencil-alt fa-lg"></i></a>
                                                <button class="btn btn-secondary" data-toggle="modal" data-target="#tambahStok"><i class="fas fa-plus fa-lg"></i></button>
                                                <a class="btn btn-danger" href="<?= base_url('admin/hapus_sayur/').$data['id_sayur'] ?>" onclick="return confirm('Yakin ingin menghapus sayur?')"><i class="fas fa-trash fa-lg"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                   </div>

                </div>
                <!-- /.container-fluid -->

                <!-- Modal Tambah Sayur-->
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Formulir Tambah Sayur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('admin/tambah');?>
                        <div class="modal-body">
                    
                                <div class="form-group">
                                    <label for="nama">Nama Sayur</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                    <?= form_error('nama', '<small class="text-danger pl-3" >','</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" class="form-control" id="stok" name="stok">
                                    <?= form_error('stok', '<small class="text-danger pl-3" >','</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <select class="form-control" id="satuan" name="satuan">
                                        <option selected>Pilih Satuan</option>
                                        <option value="Kg">Kilogram</option>
                                        <option value="Gr">Gram</option>
                                        <option value="Ikat">Ikat</option>
                                        <option value="Buah">Buah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                             <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" class="form-control" id="harga" name="harga">
                                        <?= form_error('harga', '<small class="text-danger pl-3" >','</small>') ?>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                                            <label class="custom-file-label" id="label-gambar" for="gambar">Pilih Gambar</label>
                                        </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>

                <!-- Modal Tambah Stok-->
                <div class="modal fade" id="tambahStok" tabindex="-1" aria-labelledby="tambahStokLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahStokLabel">Tambah Stok Sayur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/tambah_stok') ?>" method="post">
                            <div class="modal-body">
                                
                                    <div class="form-group">
                                            <label for="nama">Pilih Sayur</label>
                                            <select class="form-control" id="nama" name="nama" required>
                                                <option selected>Pilih Sayur</option>
                                                <?php foreach($sayur as $data): ?>
                                                <option value="<?= $data['nama_sayur']; ?>"><?= $data['nama_sayur']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Jumlah Stok Tambahan</label>
                                        <input type="text" class="form-control" id="stok" name="stok" required>
                                        <?= form_error('stok', '<small class="text-danger pl-3" >','</small>') ?>
                                    </div>
                            
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                        </form>
                        </div>
                       
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->
