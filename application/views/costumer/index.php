

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg">
                            <div class="card mb-3 center">
                                <div class="card-body bg-info text-white text-center">
                                    <h4>Selamat datang di toko kami, Selamat berbelanja✨</h4>
                                <p>Toko kami menyediakan berbagai macam sayur dan buah segar, serta makanan pokok lainnya.🚛 Only in JABODETABEK</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                    <?php foreach($sayur as $data) : ?>
                        <div class="col-md-3">
                            <a href="<?= base_url('costumer/order/').$data['id_sayur']; ?>">
                                <div class="card mb-3" style="width: 20rem;">
                                <img src="<?= base_url('assets/img/').$data['gambar'] ?>" height="160px" class="card-img-top" >
                                <div class="card-body">
                                <h5 class="card-title"><?= $data['nama_sayur'].' 1 '.$data['satuan']; ?></h5>
                                <p>Stok <?= $data['stok']; ?></p>
                                <hr class="divider my-0">
                                            <p class="card-text text-danger mt-3"><?= 'Rp.'.$data['harga'].'/'.$data['satuan']; ?></p>
                                    <a href="<?= base_url('costumer/order/').$data['id_sayur']; ?>" class="btn btn-primary float-right">Beli Sekarang</a>
                                </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                   </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
