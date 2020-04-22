<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>
<body>
    <?php $this->load->view('template/navbar'); ?>
    <div class="container">
        <h1 class="text-center"><?php echo $action ?></h1>
        <?php
            if(validation_errors()){
                echo '<div class="alert alert-danger alert-dismissible fade show">';
                echo validation_errors();
                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '</div>';
            }
        ?>
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