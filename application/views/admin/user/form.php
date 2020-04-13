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
                <label for="nama">Jenis Kelamin</label>
                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('jenis_kelamin') ?>   </small>
            </div>
            <?php if ($action == 'TAMBAH USER BARU') : ?>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
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