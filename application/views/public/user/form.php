<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>
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
            <?php
                if(validation_errors()){
                    echo '<div class="alert alert-danger alert-dismissible fade show">';
                    echo validation_errors();
                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '</div>';
                }
            ?>
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
                <input type="hidden" name="role" value="user">
                <button type="submit" name="create" class="btn btn-primary float-right">Register</button>
            </form>
        </div>
    </div>
        </div>
    </div>
    <?php $this->load->view('template/js'); ?>
</body>
</html>