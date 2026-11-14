
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Mahasiswa - INAR</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Edit Data Mahasiswa</h5>
        </div>

        <div class="card-body">

            <form action="<?= site_url('MahasiswaController/update/'.rawurlencode($mahasiswa->nim)) ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">NIM</label>

                    <input type="text"
                           name="nim"
                           class="form-control"
                           maxlength="10"
                           value="<?= html_escape($mahasiswa->nim) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           maxlength="50"
                           value="<?= html_escape($mahasiswa->nama) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>

                    <input type="text"
                           name="kelas"
                           class="form-control"
                           maxlength="5"
                           value="<?= html_escape($mahasiswa->kelas) ?>"
                           required>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Perubahan
                </button>

                <a href="<?= site_url('MahasiswaController') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>">
</script>

</body>
</html>
