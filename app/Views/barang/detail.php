<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<h2 class="container text-white my-3">Detail Barang</h2>
<div class="card mt-3 container bg-dark text-white">
    <div class=" row g-0">
        <div class="col-md-4">
            <img src="/img/<?= $barang['gambar'] ?>" class="img-fluid rounded-start" alt="gambar tak ditemukan">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $barang['nama_barang'] ?> (<?= $barang['id_barang'] ?>)</h5>
                <p class="card-text">Spesifikasi: <?= $barang['spesifikasi'] ?></p>
                <p class="card-text">Lokasi: <?= $barang['lokasi'] ?></>
                <p class="card-text">Kondisi: <?= $barang['kondisi'] ?></>
                <p class="card-text">Jumlah Barang: <?= $barang['jumlah_barang'] ?></>
                <p class="card-text">Sumber Dana: <?= $barang['sumber_dana'] ?></>
                </p>
                <div>
                    <a href="/barang/edit/<?= $barang['id_barang'] ?>" class="btn btn-md btn-secondary">Edit</a>
                    <a href="/barang/hapus/<?= $barang['id_barang'] ?>" onclick="alert('Yakin untuk menghapus?')" class="btn btn-md btn-danger">Hapus</a><br>
                </div><br>
                <a class="text-decoration-none" href="/barang">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>