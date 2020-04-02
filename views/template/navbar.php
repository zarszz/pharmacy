<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="margin-bottom: 30px;">
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="#">@POTIK</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="//codeply.com">Codeply</a>
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
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
      </form>
  </div>
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="#">Right</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url() . 'index.php/admin/obat/hi'; ?>">MANAGE DATA OBAT</a>
                <a class="dropdown-item" href="<?php echo base_url() . 'index.php/admin/jenis_obat/index'; ?>">MANAGE DATA JENIS OBAT</a>
            </div>
          </li>
          <li class="nav-item white">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </li>
      </ul>
  </div>
</nav>