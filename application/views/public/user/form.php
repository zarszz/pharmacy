<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('template/header', $title); ?>
</head>
<body>
<?php $this->load->view('template/navbar', $jenis_obat); ?>
<div class="container">

    <div class="row mt-3">
        <div class="col-md-6 mx-auto">

        <div class="card">
            <div class="card-header bg-dark text-light text-center">
            Registrasi
        </div>
        <div class="card-body">

        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('email') ?> </small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('password') ?> </small>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('nama') ?>   </small>
            </div>
            <div class="form-group">
                <label for="nama">Jenis Kelamin</label>
                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('jenis_kelamin') ?>   </small>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat"></textarea>
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('alamat') ?>   </small>
            </div>

            <?php if(isset($_SESSION['role'])): ?>
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
                <?php endif ?>
            <?php else: ?>
                <input type="hidden" name="role" value="user">
            <?php endif ?>
            <button type="submit" name="create" class="btn btn-primary float-right">Register</button>
            </form>
        </div>
    </div>
        </div>
    </div>
    <?php $this->load->view('template/js'); ?>
</body>
</html>