<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>
<body>
    <?php $this->load->view('template/navbar', $jenis_obat); ?>
    <div class="col-md-6 mx-auto">
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
                <label for="nama">Nama</label>
                <?php if ($action == 'TAMBAH USER BARU') : ?>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama">
                <?php else : ?>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama"
                     name="nama" value="<?php echo $nama; ?>">
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <?php if ($action == 'TAMBAH USER BARU') : ?>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan email" name="email">
                <?php else : ?>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan email" name="email"
                     value="<?php echo $email; ?>">
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <?php if ($action == 'TAMBAH USER BARU') : ?>
                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat">
                <?php else : ?>
                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat"
                     value="<?php echo $alamat; ?>">
                <?php endif ?>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <?php if ($action == "TAMBAH USER BARU"): ?>
                    <label for="nama">Jenis kelamin</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="priaForm" name="jenis_kelamin" value="L">
                        <label for="priaForm" class="form-check-label">Pria</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="wanitaForm" name="jenis_kelamin" value="P">
                        <label for="priaForm" class="form-check-label">Wanita</label>
                    </div>
                <?php else: ?>
                    <div class="form-check">
                        <?php if ($jenis_kelamin == 'L'): ?>
                            <input type="radio" class="form-check-input" id="priaForm"name="jenis_kelamin" value="L" checked>
                        <?php else: ?>
                            <input type="radio" class="form-check-input" id="priaForm"name="jenis_kelamin" value="L">
                        <?php endif ?>
                        <label for="priaForm" class="form-check-label">
                            Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <?php if ($jenis_kelamin == 'P'): ?>
                            <input type="radio" class="form-check-input" id="wanitaForm"name="jenis_kelamin" value="P" checked>
                        <?php else: ?>
                            <input type="radio" class="form-check-input" id="priaForm"name="jenis_kelamin" value="P">
                        <?php endif ?>
                        <label for="priaForm" class="form-check-label">
                            Wanita
                        </label>
                    </div>
                <?php endif ?>
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('jenis_kelamin') ?>   </small>
            </div>
            <?php if ($action == 'TAMBAH USER BARU') : ?>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
                </div>
            <?php endif ?>
            <?php if ($action == 'UPDATE USER') : ?>
                <div class="form-group">
                    <label for="saldo">Saldo User</label>
                    <p class="text-danger">Saldo user saat ini : Rp.<?php echo number_format($saldo); ?></p>
                    <input type="number" class="form-control" id="saldo" placeholder="Masukkan saldo" name="saldo">
                </div>
            <?php endif ?>
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <div class="form-group">
                    <label for="nama">Jenis Role</label>
                    <select id="jenis_kelamin" class="form-control" name="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="pegawai">Pegawai</option>
                    </select>
                    <small id="emailHelp" class="form-text text-danger"> <?= form_error('jenis_kelamin') ?>   </small>
                </div>
            <?php else: ?>
                <input type="hidden" name="role" value="user">
            <?php endif ?>
            <?php if ($action == 'TAMBAH USER BARU'): ?>
                <button type="submit" class="btn btn-primary">Masukkan data</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary">Update data</button>
            <?php endif ?>
            </div>
        </form>
    </div>
    <?php $this->load->view('template/js'); ?>
</body>
</html>