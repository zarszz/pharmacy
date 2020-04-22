<?php $data['title'] = 'SEARCH RESULT'; $this->load->view('template/header', $data); ?>
<body>
    <?php $this->load->view('template/navbar'); ?>
    <!-- Page Content -->
    <div class="container">
        <div style="margin: 5% 0 5% 0;">
            <form class="form-inline" method="GET" action="<?php echo base_url() . 'public/obat/search' ?>">
                <input class="typeahead form-control " type="text" placeholder="Search" aria-label="Search" name="query">
            </form>
            <?php if(sizeof($data_obat) > 0): ?>
                <h2 style="margin-top: 2%">Hasil pencarian terhadap keyword <?php echo $keyword ?></h2>
            <?php elseif(sizeof($data_obat) == 0): ?>
                <h2 style="margin-top: 2%">Hasil pencarian terhadap keyword <?php echo $keyword ?> Tidak ditemukan ..</h2>
            <?php endif ?>
        </div>
                <div class="row">
                    <?php foreach($data_obat as $obat): ?>
                        <div class="col-sm-3 shadow-sm">
                            <div class="card">
                            <a href="<?php echo base_url() . 'public/obat/show_obat/' . $obat['id_obat']; ?>">
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
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="<?php echo base_url() . 'public/obat/show_obat/' . $obat['id_obat']; ?>"><?php echo $obat['nama_obat']; ?></a>
                                    </h4>
                                    <h5>Rp.<?php echo number_format($obat['harga']); ?></h5>
                                    <p class="card-text"><?php echo substr($obat['deskripsi'], 0, 82); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php
	                echo $this->pagination->create_links();
	            ?>
                <!-- /.row -->
    </div>
    <!-- /.container -->
    <?php $this->load->view('template/js'); ?>
</body>
<?php $this->load->view('template/footer'); ?>
</html>