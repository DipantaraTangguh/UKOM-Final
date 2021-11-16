<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Inventaris</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Daftar Data Supplier' | $title === 'Detail Supplier' | $title === 'Edit Data Supplier') | $title === 'Tambah Data Supplier' ? 'active' : '' ?>" href="/supplier">Supplier</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link <?= ($title === 'Daftar Data Barang' | $title === 'Detail Barang') ? 'active' : '' ?>" href="/barang">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/login">Barang Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>