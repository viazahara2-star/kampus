
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mahasiswa - INAR</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>"
          rel="stylesheet">

    <style>
        body {
            background-color: #ffffff;
        }

        .navbar {
            margin-bottom: 0;
        }

        .container-fluid {
            padding: 20px;
        }

        .table thead th {
            background-color: #d1e7dd;
            color: #000;
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .judul {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a class="navbar-brand" href="<?= site_url() ?>">
            INAR
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url() ?>">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active"
                       href="<?= site_url('MahasiswaController') ?>">
                        Data Mahasiswa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= site_url('MataKuliahController') ?>">
                        Data Mata Kuliah
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= site_url('JadwalKuliahController') ?>">
                        Data Jadwal Kuliah
                    </a>
                </li>

            </ul>

            <!-- Pencarian -->
            <form class="d-flex" onsubmit="return false;">
                <input class="form-control me-2"
                       type="search"
                       id="cariMahasiswa"
                       placeholder="Search">

                <button class="btn btn-outline-success"
                        type="button"
                        onclick="cariData()">
                    Search
                </button>
            </form>

        </div>
    </div>
</nav>

<div class="container-fluid">

    <!-- Judul dan tombol tambah -->
    <div class="judul">

        <button class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah">
            Tambah
        </button>

    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="<?= site_url('MahasiswaController/tambah') ?>"
                      method="post">

                    <div class="modal-header">
                        <h5 class="modal-title">
                            Tambah Data Mahasiswa
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">NIM</label>

                            <input type="text"
                                   name="nim"
                                   class="form-control"
                                   maxlength="10"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama</label>

                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   maxlength="50"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kelas</label>

                            <input type="text"
                                   name="kelas"
                                   class="form-control"
                                   maxlength="5"
                                   required>
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit"
                                class="btn btn-primary">
                            Simpan
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Tabel Mahasiswa -->
    <div class="table-responsive">

        <table class="table table-bordered table-sm"
               id="tabelMahasiswa">

            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th class="text-center" style="width: 180px;">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($mahasiswas as $m): ?>

                <tr>
                    <td><?= html_escape($m->nim) ?></td>

                    <td><?= html_escape($m->nama) ?></td>

                    <td><?= html_escape($m->kelas) ?></td>

                    <td class="text-center">

                        <!-- Tombol Edit -->
                        
<a href="<?= site_url('MahasiswaController/edit/'.rawurlencode($m->nim)) ?>"
   class="btn btn-success btn-sm">
   Edit
</a>


                        <!-- Tombol Delete -->
                        <form action="<?= site_url('MahasiswaController/delete/'.rawurlencode($m->nim)) ?>"
                              method="post"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')">

                            <button type="submit"
                                    class="btn btn-danger btn-sm">
                                Delete
                            </button>

                        </form>

                    </td>
                </tr>

                <?php endforeach; ?>

                <?php if (empty($mahasiswas)): ?>
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data mahasiswa.
                    </td>
                </tr>
                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>">
</script>

<!-- Fungsi pencarian -->
<script>
function cariData() {
    let input = document.getElementById("cariMahasiswa");
    let filter = input.value.toLowerCase();

    let rows = document.querySelectorAll(
        "#tabelMahasiswa tbody tr"
    );

    rows.forEach(function(row) {
        row.style.display =
            row.innerText.toLowerCase().includes(filter)
            ? ""
            : "none";
    });
}

document.getElementById("cariMahasiswa").addEventListener(
    "keyup", cariData
);
</script>

</body>
</html>
