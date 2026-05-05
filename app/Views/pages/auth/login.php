
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Login</h2>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/login">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary">Login</button>
    </form>

    <p class="mt-3">
        Belum punya akun? <a href="/register">Register</a>
    </p>
</div>

<?= $this->endSection() ?>