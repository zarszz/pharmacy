<?php $data['title'] = "SHOW OBAT - " . $obat['nama_obat']; $this->load->view('template/header', $data); ?>
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/obat_detail.css' ?>">
    <body>
        <?php $this->load->view('template/navbar'); ?>
        <!-- source : https://bootsnipp.com/snippets/orOGB -->
        <div class="container product-container">
            <div class="card">
                <div class="row">
                    <aside class="col-sm-5 border-right">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <div>
                                    <a href="#">
                                        <?php if (isset($obat['foto_obat'])): ?>
                                        <?php
                                            $url = base_url() . 'assets/public/produk/' . $obat['foto_obat'];
                                            $headers = get_headers($url);
                                            if(stripos($headers[0], "200 OK")){
                                                echo '<img class="card-img-top" src="'. $url .'" alt="">';
                                            } else {
                                                echo '<img class="card-img-top" src="http://placehold.it/700x400" alt="">';
                                            }
                                        ?>
                                        <?php else: ?>
                                            <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                                        <?php endif ?>
                                    </a>
                                </div>
                            </div>
                            <!-- slider-product.// -->
                            <div class="img-small-wrap">
                                <?php if (isset($obat['foto_obat'])): ?>
                                <?php
                                    $url = base_url() . 'assets/public/produk/' . $obat['foto_obat'];
                                    $headers = get_headers($url);
                                    if(stripos($headers[0], "200 OK")){
                                        echo '<div class="item-gallery"> <img src="'. $url .'"> </div>';
                                        echo '<div class="item-gallery"> <img src="'. $url .'"> </div>';
                                        echo '<div class="item-gallery"> <img src="'. $url .'"> </div>';
                                    } else {
                                        echo'<div class="item-gallery"> <img src="http://placehold.it/450x450"> </div>';
                                        echo'<div class="item-gallery"> <img src="http://placehold.it/450x450"> </div>';
                                        echo'<div class="item-gallery"> <img src="http://placehold.it/450x450"> </div>';
                                    }
                                ?>
                                <?php else: ?>
                                    <div class="item-gallery"> <img src="http://placehold.it/450x450"> </div>
                                    <div class="item-gallery"> <img src="http://placehold.it/450x450"> </div>
                                    <div class="item-gallery"> <img src="http://placehold.it/450x450"> </div>
                                <?php endif ?>
                            </div>
                            <!-- slider-nav.// -->
                        </article>
                        <!-- gallery-wrap .end// -->
                    </aside>
                    <aside class="col-sm-7">
                        <article class="card-body p-5">
                            <h3 class="title mb-3"><?php echo $obat['nama_obat']; ?></h3>

                            <p class="price-detail-wrap">
                                <span class="price h3 text-warning">
                                    <span class="currency">Rp.</span>
                                    <span class="num"><?php echo number_format($obat['harga']); ?></span>
                                </span>
                            </p>
                            <!-- price-detail-wrap .// -->
                            <dl class="item-property">
                                <dt>Deskripsi</dt>
                                <dd>
                                    <p><?php echo $obat['deskripsi']; ?></p>
                                </dd>
                            </dl>
                            <dl class="param param-feature">
                                <dt>Jenis</dt>
                                <dd><?php echo $jenis['jenis_obat'] ?></dd>
                            </dl>
                            <!-- item-property-hor .// -->
                            <div class="row">
                                <div class="col-md-6">
                                <dl class="param param-feature">
                                <dt>Id Produk</dt>
                                <dd><?php echo $obat['id_obat']; ?></dd>
                            </dl>
                                </div>
                            </div>
                            <!-- item-property-hor .// -->
                            <dl class="param param-feature">
                                <dt>Stok</dt>
                                <dd><?php echo $obat['stok']; ?></dd>
                            </dl>
                            <!-- item-property-hor .// -->

                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <dl class="param param-inline">
                                        <dt>Quantity: </dt>
                                        <dd>
                                            <select class="form-control form-control-sm" style="width:70px;">
                                                <option> 1 </option>
                                                <option> 2 </option>
                                                <option> 3 </option>
                                            </select>
                                        </dd>
                                    </dl>
                                    <!-- item-property .// -->
                                </div>
                                <!-- col.// -->
                                <div class="col-sm-7">
                                    <dl class="param param-inline">
                                        <dt>Size: </dt>
                                        <dd>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <span class="form-check-label">SM</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <span class="form-check-label">MD</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <span class="form-check-label">XXL</span>
                                            </label>
                                        </dd>
                                    </dl>
                                    <!-- item-property .// -->
                                </div>
                                <!-- col.// -->
                            </div>
                            <!-- row.// -->
                            <hr>
                            <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
                            <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
                        </article>
                        <!-- card-body.// -->
                    </aside>
                    <!-- col.// -->
                </div>
                <!-- row.// -->
            </div>
            <!-- card.// -->
        </div>
        <!--container.//-->
        </article>
        <?php $this->load->view('template/footer'); ?>
        <?php $this->load->view('template/js'); ?>
    </body>