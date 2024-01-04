   <!-- Begin Page Content -->
   <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                    
                            <div class="card mb-3" style="width: 20rem;">
                            <img src="<?= base_url('assets/img/').$sayur['gambar'] ?>" class="card-img-top" height="370px">
                            <div class="card-body">
                                <h3 class="card-text"><?= $sayur['nama_sayur']; ?> 1 <?= $sayur['satuan']; ?></h3>
                                <h5>Stok : <?= $sayur['stok']; ?></h5>
                                <h5>Terjual : <?= $sayur['jml_terjual']; ?></h5>
                                <h4 class="text-danger">Harga : Rp.<?= $sayur['harga']; ?></h4>
                            </div>
                            </div>
                       
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h2>Form Pembelian Sayur</h2>
                            <form name="order" method="post">
                                <div class="form-group">
                                    <label for="nama">Nama Penerima</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                                </div>
                                <div class="form-group">
                                    <label for="total_bayar">Total Harga</label>
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                             <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
                                    </div>
                                    <input type="text" name="id_sayur" id="id_sayur" value="<?= $sayur['id_sayur']; ?>" hidden>
                                    <input type="text" name="harga" id="harga" value="<?= $sayur['harga']; ?>" hidden>
                                    <input type="text" name="email" id="email" value="<?= $user['email']; ?>" hidden>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Konfirmasi</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
        
   </div>