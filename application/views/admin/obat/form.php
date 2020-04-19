<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>
<body>
    <?php $this->load->view('template/navbar', $jenis_obat); ?>
    <div class="container">
        <h1 class="text-center"><?php echo $action ?></h1>
        <?php
            if(validation_errors()){
                echo '<div class="alert alert-danger alert-dismissible fade show">';
                echo validation_errors();
                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '</div>';
            }
            if(isset($_SESSION['UPLOAD_ERROR'])){
                echo '<div class="alert alert-danger alert-dismissible fade show col-md-3 text-center">';
                echo $_SESSION['UPLOAD_ERROR'];
                echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                echo '</div>';
                unset($_SESSION['UPLOAD_ERROR']);
            }
            if(isset($_SESSION['SUCCESS'])){
                echo '<div class="alert alert-success alert-dismissible fade show col-md-3 text-center">';
                echo $_SESSION['SUCCESS'];
                echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                echo '</div>';
                unset($_SESSION['SUCCESS']);
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
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
                <label for="inputDeskripsi">Deskripsi Obat</label>
                <?php if ($action == 'TAMBAH OBAT BARU') : ?>
                    <textarea class="form-control" name="deskripsi" id="inputDeskripsi" rows="5"></textarea>
                <?php else : ?>
                    <textarea class="form-control" name="deskripsi" id="inputDeskripsi" rows="5"><?php echo $deskripsi; ?></textarea>
                <?php endif ?>
            </div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Foto obat</span>
				</div>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputFotoObat" name="foto-obat" accept='image/*' required>
					<label class="custom-file-label text-left" for="inputFotoObat">Choose file</label>
				</div>
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