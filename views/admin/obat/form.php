<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
    <?php $this->load->view('template/header'); ?>
    <?php $this->load->view('template/navbar', $jenis_obat); ?>    
    <div class="container">
        <h1 class="text-center"><?php echo $action ?></h1>
        <?php echo validation_errors(); ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="namaObat">Nama obat</label>
                <?php if ($action == 'TAMBAH OBAT BARU') : ?>
                    <input type="text" class="form-control" id="namaObat" placeholder="Masukkan nama obat" name="nama_obat">
                <?php else : ?>
                    <input type="text" class="form-control" id="namaObat" placeholder="Masukkan nama obat" 
                     name="nama_obat" value="<?php echo $nama_obat; ?>">
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="inputJenis">Jenis obat</label>
                <select id="inputJenis" class="form-control" name="id_jenis">
                    <?php foreach ($jenis_obat_complete as $data): ?>
                        <option value="<?php echo $data['id_jenis'] ?>"><?php echo $data['jenis_obat']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="hargaObat">Harga</label>
                <?php if ($action == 'TAMBAH OBAT BARU') : ?>
                    <input type="number" class="form-control" id="hargaObat" placeholder="Masukkan harga obat" name="harga">
                <?php else : ?>
                    <input type="number" class="form-control" id="hargaObat" placeholder="Masukkan harga obat" name="harga" 
                     value="<?php echo $harga; ?>">
                <?php endif ?>
            </div>                                     
            <div class="form-group">
                <label for="stokObat">Stok</label>
                <?php if ($action == 'TAMBAH OBAT BARU') : ?>
                    <input type="number" class="form-control" id="stokObat" placeholder="Masukkan stok obat" name="stok">
                <?php else: ?>
                    <input type="number" class="form-control" id="stokObat" placeholder="Masukkan stok obat" name="stok"
                     value="<?php echo $stok; ?>">
                <?php endif ?>
            </div>
            <?php if ($action == 'TAMBAH OBAT BARU'): ?>
                <button type="submit" class="btn btn-primary">Masukkan data</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary">Update data</button>
            <?php endif ?>
        </form>
    </div>
    <?php $this->load->view('template/js'); ?>
</body>
</html>