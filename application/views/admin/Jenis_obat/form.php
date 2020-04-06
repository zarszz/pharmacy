<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?php $this->load->view('template/header'); ?>
</head>
<body>
    <?php echo validation_errors(); ?>
    <?php $this->load->view('template/navbar', $jenis_obat); ?>
    <div class="container">
        <h1 class="text-center"><?php echo $action ?></h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="namaJenisObat">Nama jenis obat</label>
                <?php if ($action == 'TAMBAH JENIS OBAT BARU') : ?>
                    <input type="text" class="form-control" id="namaJenisObat" placeholder="Masukkan nama jenis obat"
                     name="jenis_obat">
                <?php else : ?>
                    <input type="text" class="form-control" id="namaJenisObat" placeholder="Masukkan nama jenis obat"
                     name="jenis_obat" value="<?php echo $jenis; ?>">
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="idJenisObat">Id jenis obat</label>
                <?php if ($action == 'TAMBAH JENIS OBAT BARU') : ?>
                    <input type="text" class="form-control" id="idJenisObat" placeholder="Masukkan id jenis obat"
                     name="id_jenis">
                <?php else : ?>
                    <input type="text" class="form-control" id="idJenisObat" placeholder="Masukkan id jenis obat"
                     name="id_jenis" value="<?php echo $id_jenis; ?>">
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <?php if ($action == 'TAMBAH JENIS OBAT BARU') : ?>
                    <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskipsi obat" name="deskripsi"></textarea>
                <?php else : ?>
                    <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskipsi obat"
                     name="deskripsi"><?php echo $deskripsi; ?></textarea>
                <?php endif ?>
            </div>
            <?php if ($action == 'TAMBAH JENIS OBAT BARU'): ?>
                <button type="submit" class="btn btn-primary">Masukkan data</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary">Update data</button>
            <?php endif ?>
        </form>
    </div>
    <?php $this->load->view('template/js'); ?>
</body>
</html>