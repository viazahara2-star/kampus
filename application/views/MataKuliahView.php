<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matakuliahs as $matakuliah): ?>
            <tr>
                <td><?php echo $matakuliah->kode ?></td>
                <td><?php echo $matakuliah->mata_kuliah ?></td>
                <td><?php echo $matakuliah->sks ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>