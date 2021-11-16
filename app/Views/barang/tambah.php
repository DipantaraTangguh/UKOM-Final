<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-white my-3">Form Tambah Barang</h1>
            <form class="text-white my-3" action="/barang/save" enctype="multipart/form-data" method="POST">
                <div class="mb-3">
                    <label for="id_barang" class="form-label">ID Barang:</label>
                    <input type="text" class="form-control bg-dark text-white" id="id_supplier" name="id_barang" value="<?= $newid ?>" readonly required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang:</label>
                    <input type="text" class="form-control bg-dark text-white" id="nama_barang" name="nama_barang" required autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <label for="spesifikasi" class="form-label">Spesifikasi:</label>
                    <input type="text" class="form-control bg-dark text-white" id="spesifikasi" name="spesifikasi" required autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi:</label>
                    <input type="text" class="form-control bg-dark text-white" id="lokasi" name="lokasi" required autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi:</label>
                    <input type="text" class="form-control bg-dark text-white" id="kondisi" name="kondisi" required autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang:</label>
                    <input type="text" class="form-control bg-dark text-white" id="jumlah_barang" name="jumlah_barang" required autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <label for="sumber_dana" class="form-label">Sumber Dana:</label>
                    <input type="text" class="form-control bg-dark text-white" id="sumber_dana" name="sumber_dana" required autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Gambar Barang: </label>
                    <div class="input-group">
                        <input type="file" class="form-control bg-dark text-white" id="gambar" name="gambar">
                    </div>
                </div>
                <button type="submit" class="btn btn-md btn-dark text-white">Tambah Data Barang</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>