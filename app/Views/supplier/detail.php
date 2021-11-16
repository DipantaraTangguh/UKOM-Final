<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<h2 class="container text-white my-3">Detail Supplier</h2>
<div class="card mt-3 container bg-dark text-white">
    <div class=" row g-0">
        <div class="col-md-4">
            <img src="/img/<?= $supplier['foto'] ?>" class="img-fluid rounded-start" alt="gambar tak ditemukan">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $supplier['nama_supplier'] ?> (<?= $supplier['id_supplier'] ?>)</h5>
                <p class="card-text"><?= $supplier['alamat_supplier'] ?></p>
                <p class="card-text"><?= $supplier['telp_supplier'] ?></>
                </p>
                <div>
                    <a href="/supplier/edit/<?= $supplier['id_supplier'] ?>" class="btn btn-md btn-secondary">Edit</a>
                    <a href="/supplier/hapus/<?= $supplier['id_supplier'] ?>" onclick="alert('Yakin untuk menghapus?')" class="btn btn-md btn-danger">Hapus</a><br>
                </div><br>
                <a class="text-decoration-none" href="/supplier">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>