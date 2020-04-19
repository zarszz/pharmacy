<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>
<body>
    <?php $this->load->view('template/navbar', $jenis_obat) ?>
    <div class="container" style="margin-top: 5%;">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/profile_page'); ?>" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/edit'); ?>" class="nav-link">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/edit_password'); ?>" class="nav-link active">Ganti password</a>
                    </li>
                </ul>
                <div class="container" style="margin-top: 5%">
                    <h1 class="text-center" style="margin-bottom: 5%">Ganti Password</h1>
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
                    <?php if(isset($_SESSION['PASS_ERROR'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show col-md-3 text-center">
                            <?php echo $_SESSION['PASS_ERROR']; ?>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        <?php unset($_SESSION['PASS_ERROR']); ?>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password lama</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="old-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="confirm-new-password">
                            </div>
                        </div>
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