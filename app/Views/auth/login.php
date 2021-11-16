<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card login-form bg-dark text-white mt-3">
        <div class="card-body">
            <h3 class="card-title text-center">Log In</h3>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-dark my-3" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif ?>
            <div class="card-text">
                <form action="/login/cekLogin" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-sm bg-dark text-white" id="username" name="username" autofocus autocomplete="off">
                    </div>
                    <div class="form-group my-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm bg-dark text-white" id="password" name="password" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block mb-3">Sign in</button>

                    <div class="sign-up">
                        Don't have an account? <a href="/login/register" class="text-decoration-none">Create One</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>