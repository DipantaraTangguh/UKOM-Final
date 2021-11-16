<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card login-form bg-dark text-white mt-3">
        <div class="card-body">
            <h3 class="card-title text-center">Register</h3>
            <div class="card-text">
                <form action="/login/cekRegister" method="POST">
                    <input type="hidden" value="<?= $kodebaru ?>" name="id_user">
                    <div class="form-group my-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control form-control-sm bg-dark text-white" id="nama" name="nama">
                    </div>
                    <div class="form-group my-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-sm bg-dark text-white" id="username" name="username">
                    </div>
                    <div class="form-group my-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm bg-dark text-white" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block mb-3">Register</button>

                    <div class="sign-up">
                        have an account? <a href="/login" class="text-decoration-none">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>