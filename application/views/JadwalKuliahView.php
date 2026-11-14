
<?php $this->load->view('layout') ?>

<div class="container-fluid">

    <!-- Tombol Tambah -->
    <button class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalTambah">
        Tambah
    </button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="<?= base_url('jadwalkuliah/tambah') ?>"
                    method="post">

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>NIM</label>
                            <input type="text" name="nim"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Kelas</label>
                            <input type="text" name="kelas"
                                class="form-control" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Data Mahasiswa -->
    <table class="table table-success table-bordered table-sm mt-0">

        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($jadwalkuliah as $jadwalkuliah): ?>

            <tr>
                <td><?= html_escape($jadwalkuliah->nim) ?></td>
                <td><?= html_escape($jadwalkuliah->nama) ?></td>
                <td><?= html_escape($jadwalkuliah->kelas) ?></td>

                <td>
                    <!-- Tombol Edit -->
                    <a href="<?= base_url('jadwalkuliah/edit/'.$jadwalkuliah->nim) ?>"
                        class="btn btn-success btn-sm">
                        Edit
                    </a>

                    <!-- Tombol Delete -->
                    <form action="<?= base_url('jadwalkuliah/delete/'.$jadwalkuliah->nim) ?>"
                        method="post" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>

                    </form>
                </td>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
