<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/login/logout" class="btn btn-md btn-dark mt-3" style="float: right; background-color: #3c373e;">Logout</a>
            <h1 class="text-white my-3">List Data barang</h1>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-dark" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif ?>
            <a href="/barang/tambah" class="btn btn-md btn-dark ">Tambah Data Barang</a>
        </div>
    </div>
</div>
</div>

<table class="table table-dark table-hover container my-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Spesifikasi</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Jumlah barang</th>
            <th scope="col">Sumber Dana</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $d['id_barang'] ?></td>
                <td><?= $d['nama_barang'] ?></td>
                <td><?= $d['spesifikasi'] ?></td>
                <td><?= $d['lokasi'] ?></td>
                <td><?= $d['kondisi'] ?></td>
                <td><?= $d['jumlah_barang'] ?></td>
                <td><?= $d['sumber_dana'] ?></td>
                <td>
                    <a href="barang/detail/<?= $d['id_barang'] ?>" class="btn btn-sm btn-secondary">Detail</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>