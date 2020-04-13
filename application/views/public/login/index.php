<?php $data['title'] = $title; $this->load->view('template/header', $data); ?>
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
                <?php
                    if(validation_errors()){
                        echo '<div class="alert alert-danger alert-dismissible fade show">';
                        echo validation_errors();
                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }
                ?>
            </div>
                <?php if(isset($_SESSION['error'])) :?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?php echo $_SESSION['error']; ?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    <?php unset($_SESSION['error']); ?>
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

