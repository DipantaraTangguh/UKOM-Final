<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-white my-3">Form Edit Barang</h1>
            <form class="text-white my-3" action="/barang/update" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $id_barang ?> " name="img_lama">
                <div class="mb-3">
                    <label for="id_barang" class="form-label">ID Barang</label>
                    <input type="text" class="form-control bg-dark text-white" id="id_barang" name="id_barang" value="<?= $id_barang ?>" readonly required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control bg-dark text-white" id="nama_supplier" name="nama_barang" required autocomplete="off" autofocus value="<?= $old['nama_barang'] ?>">
                </div>
                <div class="mb-3">
                    <label for="spesifikasi" class="form-label">Spesifikasi</label>
                    <input type="text" class="form-control bg-dark text-white" id="spesifikasi" name="spesifikasi" required autocomplete="off" value="<?= $old['spesifikasi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control bg-dark text-white" id="lokasi" name="lokasi" required autocomplete="off" value="<?= $old['lokasi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <input type="text" class="form-control bg-dark text-white" id="kondisi" name="kondisi" required autocomplete="off" value="<?= $old['kondisi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="text" class="form-control bg-dark text-white" id="jumlah_barang" name="jumlah_barang" required autocomplete="off" value="<?= $old['jumlah_barang'] ?>">
                </div>
                <div class="mb-3">
                    <label for="sumber_dana" class="form-label">Sumber Dana</label>
                    <input type="text" class="form-control bg-dark text-white" id="sumber_dana" name="sumber_dana" required autocomplete="off" value="<?= $old['sumber_dana'] ?>">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Barang</label>
                    <div class="input-group">
                        <input type="file" class="form-control bg-dark text-white" id="foto" name="gambar">
                    </div>
                </div>
                <button type="submit" class="btn btn-md btn-dark text-white">Edit Data Barang</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>