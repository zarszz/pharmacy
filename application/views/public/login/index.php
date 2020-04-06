<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <?php $this->load->view('template/header'); ?>
</head>
<body>
    <?php $this->load->view('template/navbar'); ?>
    <div class="container">
        <div class="card text-white bg-dark col-md-6 mx-auto">
            <div class="card-header">
                <center>
                @potik Login
                <center>
            </div>
            <div class="card-body">
                <?php if($this->session->flashdata('flash')) :?>
                    <div class="row mt-3">
                        <div class="col-md-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Create Account <strong>Sucessfully</strong>
                        <?= $this->session->flashdata('flash'); ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" name="create" class="btn btn-primary float-right">Log in</button>
                    <center>
                        <p>doesnt have account? <a href="<?php echo base_url() . 'index.php/public/user/create_account'; ?>">Signup Here</a> </p>
                    <center>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/js'); ?>
</body>
</html>

