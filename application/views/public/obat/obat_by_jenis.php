<?php $data['title'] = 'HOME PAGE'; $this->load->view('template/header', $data); ?>
<body>
<?php $this->load->view('template/navbar', $jenis_obat); ?>
<div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">@POTIK</h1>
                <div class="list-group">
                    <?php foreach($jenis_obat as $data): ?>
                        <a href="<?php echo base_url() . 'public/obat/show_obat_by_jenis/' . $data['id_jenis']; ?>" class="list-group-item"><?php echo $data['jenis_obat'] ?></a>
                    <?php endforeach ?>
                </div>
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-9">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row">
                    <?php if ($total_row > 0): ?>
                        <?php foreach($data_obat as $obat): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                <a href="<?php echo base_url() . 'public/obat/show_obat/' . $obat['id_obat']; ?>"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="<?php echo base_url() . 'public/obat/show_obat/' . $obat['id_obat']; ?>"><?php echo $obat['nama_obat']; ?></a>
                                        </h4>
                                        <h5>Rp.<?php echo number_format($obat['harga']); ?></h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <h2 style="margin-top: 10%" class="mx-auto">Oooppss... Produk tidak ada</h2>
                    <?php endif ?>
                </div>
                <?php
	                echo $this->pagination->create_links();
	            ?>
                <!-- /.row -->
            </div>
            <!-- /.col-lg-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <?php $this->load->view('template/footer'); ?>
    <?php $this->load->view('template/js'); ?>
</body>