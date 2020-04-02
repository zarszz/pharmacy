<div class="container">

<div class="card text-white bg-dark mb-3">
            <div class="card-header">
           <center> @potik Login <center>
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
    <label for="id_user">id user</label>
    <input type="text" class="form-control" id="id_user_login" name="id_user_login">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="passowrd_login" name="password_login">
  </div>
  <button type="submit" name="create" class="btn btn-primary float-right">Log in</button>

  <center> <h5>doesnt have account? <a href="<?php echo base_url() . 'index.php/user/user/create_account'; ?>">Signup Here</a> </h5> <center>
</form>
</div>