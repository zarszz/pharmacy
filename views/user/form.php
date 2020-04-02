<div class="container">

<div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="margin-bottom: 30px;">
<a class="navbar-brand" >Create Account</a>
  </div>

    <div class="row mt-3">
        <div class="col-md-6">

        <div class="card">
            <div class="card-header">
            Create Account Form
        </div>
        <div class="card-body">

        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('nama') ?>   </small>
            </div>

            <div class="form-group">
                <label for="nama">Id User</label>
                <input type="text" class="form-control" id="id_user" name="id_user">
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('id_user') ?>   </small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('email') ?> </small>
            </div>
 

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small id="emailHelp" class="form-text text-danger"> <?= form_error('password') ?> </small>
            </div>

            <button type="submit" name="create" class="btn btn-primary float-right">Create Account</button>

            </form>
        </div>
    </div>
        </div>
    </div>