<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Register</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/register">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-success">Register</button>
    </form>

    <p class="mt-3">
        Sudah punya akun? <a href="/login">Login</a>
    </p>
</div>

<?= $this->endSection() ?>