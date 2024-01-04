<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="margin-bottom: 120px;">
            <div class="card-header">
                Form Edit Data Sayur
            </div>
                <div class="card-body">
                <form action="<?= base_url('admin/simpan_data') ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama Sayur</label>
                    <input type="text" name="id" id="id" value="<?= $sayur['id_sayur']; ?>" hidden>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $sayur['nama_sayur'] ?>">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $sayur['stok'] ?>">
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                     <select class="form-control" id="satuan" name="satuan">
                        <option selected><?= $sayur['satuan'] ?></option>
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
                                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $sayur['harga'] ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>