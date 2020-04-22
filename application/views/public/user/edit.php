<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>
<body>
    <?php $this->load->view('template/navbar') ?>
    <div class="container" style="margin-top: 5%;">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/profile_page'); ?>" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/edit'); ?>" class="nav-link active">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/edit_password'); ?>" class="nav-link">Ganti password</a>
                    </li>
                </ul>
                <div class="container" style="margin-top: 5%">
                    <h1 class="text-center" style="margin-bottom: 5%">UPDATE PROFILE</h1>
                    <?php
                        if(validation_errors()){
                            echo '<div class="alert alert-danger alert-dismissible fade show">';
                            echo validation_errors();
                            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                            echo '</div>';
                        }
                    ?>
                    <?php if(isset($_SESSION['UPDATE_SUCCESS'])) :?>
                        <div class="alert alert-success alert-dismissible fade show col-md-3 text-center">
                            <?php echo $_SESSION['UPDATE_SUCCESS']; ?>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        <?php unset($_SESSION['UPDATE_SUCCESS']); ?>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nama</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="nama" value="<?php echo $user_data['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email" value="<?php echo $user_data['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Alamat</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="alamat"><?php echo $user_data['alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Jenis Kelamin</label>
                            <div class="col-lg-9">
                                <div class="form-check">
                                    <?php if ($user_data['jenis_kelamin'] == 'L'): ?>
                                        <input type="radio" class="form-check-input" id="priaForm" name="jenis_kelamin" value="L" checked>
                                    <?php else: ?>
                                        <input type="radio" class="form-check-input" id="priaForm" name="jenis_kelamin" value="L">
                                    <?php endif ?>
                                    <label for="priaForm" class="form-check-label">
                                        Pria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <?php if ($user_data['jenis_kelamin'] == 'P'): ?>
                                        <input type="radio" class="form-check-input" id="wanitaForm" name="jenis_kelamin" value="P" checked>
                                    <?php else: ?>
                                        <input type="radio" class="form-check-input" id="priaForm" name="jenis_kelamin" value="P">
                                    <?php endif ?>
                                    <label for="priaForm" class="form-check-label">
                                        Wanita
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <div class="form-group row" style="margin-top: 5%">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer'); ?>
    <?php $this->load->view('template/js'); ?>
</body>
</html>