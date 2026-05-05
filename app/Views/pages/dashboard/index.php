<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Dashboard</h2>

    <p>Selamat datang, <?= session()->get('name') ?> 👋</p>

    <a href="/logout" class="btn btn-danger">Logout</a>
</div>

<?= $this->endSection() ?>