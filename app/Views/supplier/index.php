<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="/login/logout" class="btn btn-md btn-dark mt-3" style="float: right; background-color: #3c373e;">Logout</a>
            <h1 class="text-white my-3">List Data Supplier</h1>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-dark" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif ?>
            <a href="/supplier/tambah" class="btn btn-md btn-dark">Tambah Data Supplier</a>
        </div>
    </div>
</div>
</div>

<table class="table table-dark table-hover container my-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID Supplier</th>
            <th scope="col">Nama Supplier</th>
            <th scope="col">Telepon Supplier</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $d['id_supplier'] ?></td>
                <td><?= $d['nama_supplier'] ?></td>
                <td><?= $d['telp_supplier'] ?></td>
                <td>
                    <a href="/supplier/detail/<?= $d['id_supplier'] ?>" class="btn btn-sm btn-secondary">Detail</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>