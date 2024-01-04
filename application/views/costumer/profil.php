 <!-- Begin Page Content -->
 <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
                <div class="card" style="margin-bottom: 160px;">
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-8">
                            <?= $this->session->flashdata('message'); ?>
                                <h4 class="mb-3">Selamat Datang!</h4>
                                <h3 class="text-bold" id="nama"><?= $user['nama']; ?></h3>
                                <p id="email"><?= $user['email']; ?></p>
                                <p id="alamat"><?= $user['alamat']; ?></p>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?= base_url('costumer/edit_profil') ?>" class="btn btn-primary tampilModalEditProfil" type="button" data-toggle="modal" data-target="#formEditProfil">Edit</a>
                            </div>
                       </div>
                       <hr class="divider" >
                       <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-bod bg-gradient-info">
                                        <h5 class="text-white p-3">Tagihan</h5>
                                        <h1 class="text-white p-3"><?= $tagihan; ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-bod bg-gradient-info">
                                        <h5 class="text-white p-3">Diproses</h5>
                                        <h1 class="text-white p-3"><?= $diproses; ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-bod bg-gradient-info">
                                        <h5 class="text-white p-3">Selesai</h5>
                                        <h1 class="text-white p-3"><?= $selesai; ?></h1>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="formEditProfil" tabindex="-1" aria-labelledby="formEditProfilLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formEditProfilLabel">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('costumer/edit_profil') ?>" method="post">
            <div class="form-group">
                <input type="text" name="id" id="p_id" hidden value="<?= $user['id_user']; ?>">
                <label for="p_nama">Nama</label>
                <input type="text" class="form-control" id="p_nama" name="nama">
            </div>
            <div class="form-group">
                <label for="p_email">Email</label>
                <input type="text" class="form-control" id="p_email" name="email">
            </div>
            <div class="form-group">
                <label for="p_salamat">Alamat</label>
                <input type="text" class="form-control" id="p_alamat" name="alamat">
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