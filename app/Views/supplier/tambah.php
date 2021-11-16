<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-white my-3">Form Tambah Supplier</h1>
            <form class="text-white my-3" action="/supplier/save" enctype="multipart/form-data" method="POST">
                <div class="mb-3">
                    <label for="id_supplier" class="form-label">ID Supplier</label>
                    <input type="text" class="form-control bg-dark text-white" id="id_supplier" name="id_supplier" value="<?= $newid ?>" readonly required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control bg-dark text-white" id="nama_supplier" name="nama_supplier" required autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                    <input type="text" class="form-control bg-dark text-white" id="alamat_supplier" name="alamat_supplier" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="telepon_supplier" class="form-label">Telepon Supplier</label>
                    <input type="text" class="form-control bg-dark text-white" id="telepon_supplier" name="telp_supplier" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Supplier</label>
                    <div class="input-group">
                        <input type="file" class="form-control bg-dark text-white" id="foto" name="foto">
                    </div>
                </div>
                <button type="submit" class="btn btn-md btn-dark text-white">Tambah Data Supplier</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>