<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="margin-bottom: 30px;">
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>">@POTIK</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kategori
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach ($jenis_obat as $data): ?>
                <a class="dropdown-item" href="#"><?php echo $data['jenis_obat']; ?></a>
              <?php endforeach ?>
            </div>
          </li>
      </ul>
  </div>
  <div class="mx-auto order-0">
      <form class="form-inline">
        <input class="form-control mr-sm-6" type="search" placeholder="Search" aria-label="Search">
      </form>
  </div>
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
          <?php if(!isset($_SESSION['logged_in'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/public/user/create_account') ?>">Register</a>
            </li>
          <?php endif ?>
          <?php if(isset($_SESSION['logged_in'])): ?>
            <?php if($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'pegawai'): ?>
              <li class="nav-item dropdown">
                <button class="nav-link dropdown-toggle btn btn-outline-primary my-2 my-sm-0" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  MANAGE
                </button>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url() . 'index.php/admin/obat/index'; ?>">MANAGE DATA OBAT</a>
                    <a class="dropdown-item" href="<?php echo base_url() . 'index.php/admin/jenis_obat/index'; ?>">MANAGE DATA JENIS OBAT</a>
                    <?php if ($_SESSION['role'] == 'admin') : ?>
                      <a class="dropdown-item" href="<?php echo base_url() . 'index.php/public/user/manage_user'; ?>">MANAGE DATA USER</a>
                    <?php endif ?>
                </div>
              </li>
            <?php endif ?>
            <li class="nav-item white">
              <a class="btn btn-outline-success my-2 my-sm-0" href="<?php echo base_url('index.php/public/user/profile_page'); ?>">Your Profile</a>
            </li>
            <li class="nav-item white">
              <a class="btn btn-outline-danger my-2 my-sm-0" href="<?php echo base_url('index.php/public/login/logout'); ?>">Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item white">
              <a class="btn btn-outline-success my-2 my-sm-0" href="<?php echo base_url('index.php/public/login/index'); ?>">Login</a>
            </li>
          <?php endif ?>
      </ul>
  </div>
</nav>