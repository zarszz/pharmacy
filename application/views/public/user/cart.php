<?php $data['title'] = 'SHOOPING CART'; $this->load->view('template/header', $data); ?>

    <body>
        <?php $this->load->view('template/navbar'); ?>
            <div class="px-4 px-lg-0">
                <!-- For demo purpose -->
                <div class="container py-5 text-center">
                    <h1 class="display-4">Cart Anda</h1>
                </div>
                <!-- End -->
                <?php if(sizeof($cart) > 0): ?>
                    <div class="pb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 p-5 bg-white rounded shadow-lg mb-5">
                                    <!-- Shopping cart table -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="p-2 px-3 text-uppercase">Produk</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Harga</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Action</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($cart as $cart_result): ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="p-2">
                                                                <div class="ml-3 d-inline-block align-middle">
                                                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $cart_result['nama_obat']; ?></a></h5>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td class="border-0 align-middle"><strong><?php echo $cart_result['harga']; ?></strong></td>
                                                        <?php $total += $cart_result['harga']; ?>
                                                            <td class="border-0 align-middle">
                                                                <a href="<?php echo base_url() . 'index.php/public/obat/delete_cart/'.$cart_result['id_cart']; ?>" class="text-dark"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                    <div class="col-lg-6 offset-lg-6 shadow-lg">
                                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase text-center font-weight-bold" style="margin-top: 2%;">Total order</div>
                                        <div class="p-4">
                                            <ul class="list-unstyled mb-4">
                                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                                    <h5 class="font-weight-bold">Rp. <?php echo number_format($total); ?></h5>
                                                </li>
                                                <?php $saldo_after_payment = $_SESSION['saldo'] - $total; ?>
                                                <?php if ($saldo_after_payment < 0): ?>
                                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Saldo saat ini</strong>
                                                        <h5 class="font-weight-bold text-danger">Rp. <?php echo number_format($_SESSION['saldo']); ?></h5>
                                                    </li>
                                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Setelah pembayaran</strong>
                                                        <h5 class="font-weight-bold text-danger">Oopps... Saldo tidak mencukupi</h5>
                                                    </li>
                                                <?php else: ?>
                                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Saldo saat ini</strong>
                                                        <h5 class="font-weight-bold text-primary">Rp. <?php echo number_format($_SESSION['saldo']); ?></h5>
                                                    </li>
                                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Setelah pembayaran</strong>
                                                        <h5 class="font-weight-bold text-success">Rp. <?php echo number_format($saldo_after_payment); ?></h5>
                                                    </li>
                                                    </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Bayar</a>
                                                <?php endif ?>
                                        </div>
                                    </div>
                <?php else: ?>
                    <h1 class="text-center">Ooppsss... Anda belum milik produk</h1>
                <?php endif ?>
                            </div>
                        </div>
                    </div>
            </div>
            <?php $this->load->view('template/js'); ?>
    </body>
    <?php $this->load->view('template/footer'); ?>
