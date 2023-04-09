<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('customer/_partials/head') ?>
</head>

<body id="page-top">
    <div id="wrapper">

        <?php $this->load->view('customer/_partials/sidenav') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php $this->load->view('customer/_partials/navbar') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Keranjang</h1>
                    <!-- Basket List -->
                    <form id="checkoutForm" method="post" action="<?= base_url('customer/checkout') ?>">
                    <div class="row">
                        <?php foreach ($orders as $order) : ?>
                            <div class="col-lg-4">
                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <a href="<?= base_url('customer/product/' . $order['id']) ?>">
                                            <h6 class="m-0 font-weight-bold text-primary"><?= $order['product_name'] ?></h6>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <img src="<?= base_url('uploads/product/' . $order['image']) ?>" class="w-100" />
                                        <h6 class="mt-2">Harga : <?= $order['price'] ?></h6>
                                        <h6 class="mt-2">Penjual : <?= $order['admin_name'] ?></h6>
                                        <?php if ($order['status'] == 0) : ?>
                                            <div class="mt-2">
                                                <input type="checkbox" value="<?= $order['id'] ?>" name="product[]" >
                                            </div>
                                        <?php elseif ($order['status'] == 1) : ?>
                                            <div class="btn btn-info">
                                                <i class="fas fa-info-circle"></i>
                                                <p class="d-inline">Menunggu Konfirmasi</p>
                                            </div>
                                        <?php elseif ($order['status'] == 2) : ?>
                                            <div class="btn btn-success">
                                                <i class="fas fa-check"></i>
                                                <p class="d-inline">Selesai dikirim</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    </form>
                    <button type="submit" form="checkoutForm" class="btn btn-success mr-auto" name="order" value="checkout" disabled>Check Out</button>
                    <?php if (isset($checkouts)) : ?>
                    <h1 class="h3 mb-4 text-gray-800 mt-4">Checkout</h1>
                    <div class="row mt-4">
                        <?php foreach ($checkouts as $checkout) : ?>
                            <div class="col-lg-4">
                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <a href="<?= base_url('customer/product/' . $checkout['id']) ?>">
                                            <h6 class="m-0 font-weight-bold text-primary"><?= $checkout['product_name'] ?></h6>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <img src="<?= base_url('uploads/product/' . $checkout['image']) ?>" class="w-100" />
                                        <h6 class="mt-2">Harga : <?= $checkout['price'] ?></h6>
                                        <h6 class="mt-2">Penjual : <?= $checkout['admin_name'] ?></h6>
                                        <?php if ($checkout['admin_confirmation'] == 0 && $checkout['user_confirmation'] == 0) : ?>
                                            <div class="btn btn-info">
                                                <i class="fas fa-info-circle"></i>
                                                <p class="d-inline">Menunggu Konfirmasi</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            let checked = [];

            $(":checkbox").change(function() {
                this.checked ? checked.push(this.value) : checked.pop();

                if (checked.length) {
                    $('button:submit').removeAttr('disabled');

                } else {
                    $('button:submit').attr('disabled', 'disabled');;
                }
            });

        })
    </script>
</body>

</html>