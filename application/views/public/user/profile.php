<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>
<body>
    <?php $this->load->view('template/navbar', $jenis_obat) ?>
    <div class="container" style="margin-top: 5%;">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/profile_page'); ?>" class="nav-link active">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/edit'); ?>" class="nav-link">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('public/User/edit_password'); ?>" class="nav-link">Ganti password</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                    <div class="jumbotron jumbotron-fluid" style="background-color:transparent !important;">
                        <div class="container">
                            <h1 class="display-4">Hallo, <?php echo $user_data['nama']; ?> </h1>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Informasi akun</strong>
                                <hr class="my6">
                                <div class="row">
                                    <div class="col-lg-3">Email</div>
                                    <div class="col-lg-9"><?php echo $user_data['email']; ?></div>
                                </div>
                                <hr class="my6">
                                <div class="row">
                                    <div class="col-lg-3">Nama</div>
                                    <div class="col-lg-9"><?php echo $user_data['nama']; ?></div>
                                </div>
                                <hr class="my6">
                                <div class="row">
                                    <div class="col-lg-3">Alamat</div>
                                    <div class="col-lg-9"><?php echo $user_data['alamat']; ?></div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer'); ?>
    <?php $this->load->view('template/js'); ?>
</body>
</html>