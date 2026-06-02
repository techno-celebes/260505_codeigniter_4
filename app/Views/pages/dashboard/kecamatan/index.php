<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Manajemen Kecamatan</h2>
    
    <!-- Tombol Tambah Kecamatan -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#kecamatanModal" onclick="resetForm()">
        + Tambah Kecamatan
    </button>
    
    <!-- Tabel Kecamatan -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kecamatan</th>
                    <th>Nama Kecamatan</th>
                    <th>Kode Kabupaten</th>
                    <th>Nama Kabupaten</th>
                    <th>Kode Provinsi</th>
                    <th>Nama Provinsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 + (($currentPage - 1) * 10); ?>
                <?php foreach ($kecamatan as $k): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k['kode_kecamatan'] ?></td>
                    <td><?= $k['nama_kecamatan'] ?></td>
                    <td><?= $k['kode_kabupaten'] ?></td>
                    <td><?= $k['nama_kabupaten'] ?></td>
                    <td><?= $k['kode_provinsi'] ?></td>
                    <td><?= $k['nama_provinsi'] ?></td>
                    <td>
                        <span class="badge bg-<?= $k['status'] == 'aktif' ? 'success' : 'danger' ?>">
                            <?= $k['status'] ?>
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editKecamatan(<?= $k['id'] ?>)">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteKecamatan(<?= $k['id'] ?>)">
                            Hapus
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
<div class="d-flex justify-content-center">
    <?php if ($pager->getPageCount() > 1): ?>
    <nav>
        <ul class="pagination">
            <!-- First -->
            <li class="page-item <?= $pager->getCurrentPage() == 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $pager->getFirst() ?>">First</a>
            </li>
            
            <!-- Previous -->
            <li class="page-item <?= $pager->getCurrentPage() == 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $pager->getPrevious() ?>">«</a>
            </li>
            
            <!-- Numbers -->
            <?php for ($i = 1; $i <= $pager->getPageCount(); $i++): ?>
                <li class="page-item <?= $i == $pager->getCurrentPage() ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $pager->getPage($i) ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            
            <!-- Next -->
            <li class="page-item <?= $pager->getCurrentPage() == $pager->getPageCount() ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $pager->getNext() ?>">»</a>
            </li>
            
            <!-- Last -->
            <li class="page-item <?= $pager->getCurrentPage() == $pager->getPageCount() ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $pager->getLast() ?>">Last</a>
            </li>
        </ul>
    </nav>
    <?php endif; ?>
</div>
</div>

<!-- Modal Form Tambah/Edit Kecamatan -->
<div class="modal fade" id="kecamatanModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Kecamatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="kecamatanForm">
                    <input type="hidden" id="kecamatanId" name="id">
                    
                    <div class="mb-3">
                        <label>Kode Kecamatan</label>
                        <input type="text" class="form-control" id="kode_kecamatan" name="kode_kecamatan" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Nama Kecamatan</label>
                        <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Kode Kabupaten</label>
                        <input type="text" class="form-control" id="kode_kabupaten" name="kode_kabupaten" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Nama Kabupaten</label>
                        <input type="text" class="form-control" id="nama_kabupaten" name="nama_kabupaten" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Kode Provinsi</label>
                        <input type="text" class="form-control" id="kode_provinsi" name="kode_provinsi" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Nama Provinsi</label>
                        <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="saveKecamatan()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
function resetForm() {
    document.getElementById('modalTitle').innerText = 'Tambah Kecamatan';
    document.getElementById('kecamatanForm').reset();
    document.getElementById('kecamatanId').value = '';
    document.querySelectorAll('.is-invalid').forEach(el => {
        el.classList.remove('is-invalid');
    });
}

function saveKecamatan() {
    const id = document.getElementById('kecamatanId').value;
    const url = id ? `/kecamatan/update/${id}` : '/kecamatan/store';
    const formData = new FormData(document.getElementById('kecamatanForm'));
    
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            if (data.errors) {
                for (let key in data.errors) {
                    const input = document.querySelector(`[name="${key}"]`);
                    if (input) {
                        input.classList.add('is-invalid');
                        input.nextElementSibling.innerText = data.errors[key];
                    }
                }
            } else {
                alert(data.message || 'Terjadi kesalahan');
            }
        }
    })
    .catch(error => console.error('Error:', error));
}

function editKecamatan(id) {
    fetch(`/kecamatan/edit/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modalTitle').innerText = 'Edit Kecamatan';
            document.getElementById('kecamatanId').value = data.id;
            document.getElementById('kode_kecamatan').value = data.kode_kecamatan;
            document.getElementById('nama_kecamatan').value = data.nama_kecamatan;
            document.getElementById('kode_kabupaten').value = data.kode_kabupaten;
            document.getElementById('nama_kabupaten').value = data.nama_kabupaten;
            document.getElementById('kode_provinsi').value = data.kode_provinsi;
            document.getElementById('nama_provinsi').value = data.nama_provinsi;
            document.getElementById('status').value = data.status;
            
            new bootstrap.Modal(document.getElementById('kecamatanModal')).show();
        });
}

function deleteKecamatan(id) {
    if (confirm('Apakah Anda yakin ingin menghapus kecamatan ini?')) {
        fetch(`/kecamatan/delete/${id}`, {
            method: 'DELETE',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message);
            }
        });
    }
}
</script>

<?= $this->endSection() ?>