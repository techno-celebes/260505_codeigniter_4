<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Dashboard</h2>

    <p>Selamat datang, <?= session()->get('name') ?> 👋</p>

    <!-- Tombol menuju halaman kecamatan -->
    <a href="/kecamatan" class="btn btn-primary">Kelola Kecamatan</a>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>

<?= $this->endSection() ?>