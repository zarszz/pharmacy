<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>">@POTIK</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kategori
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php $jenis_obat = $this->load->Jenis_obat_model->get_jenis_obat(); ?>
              <?php foreach ($jenis_obat as $data): ?>
                <a class="dropdown-item" href="<?php echo base_url('public/obat/show_obat_by_jenis/') . $data['id_jenis']; ?>">
                  <?php echo $data['jenis_obat']; ?>
                </a>
              <?php endforeach ?>
            </div>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('public/obat/search'); ?>">Search</a>
          </li>
      </ul>
  </div>
  <div class="mx-auto order-0">
      <form class="form-inline" method="GET" action="<?php echo base_url() . 'public/obat/search' ?>">
        <input class="typeahead form-control " type="text" placeholder="Search" aria-label="Search" name="query">
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
              <li><a class="btn btn-outline-primary " href="<?php echo base_url('/admin'); ?>">ADMIN</a></li>
            <?php endif ?>
            <li class="nav-item dropdown">
              <!-- <a class="btn btn-outline-success my-2 my-sm-0" href="<?php echo base_url('index.php/public/user/profile_page'); ?>">Profile</a> -->
              <button class="nav-link dropdown-toggle btn btn-outline-success" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Akun
              </button>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url('index.php/public/user/profile_page'); ?>"><i class="fa fa-user"></i> Your Profile</a>
                <a class="dropdown-item" href="<?php echo base_url() . 'index.php/public/Obat/show_cart'; ?>"><i class="fa fa-shopping-cart"></i> Your Cart</a>
              </div>
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