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
                                        <?php if ($order['status'] == 1) : ?>
                                            <button class="btn btn-info btn-circle">
                                                <i class="fas fa-info-circle">Menunggu Konfirmasi</i>
                                            </button>
                                        <?php elseif ($order['status'] == 2) : ?>
                                            <button class="btn btn-success btn-circle">
                                                <i class="fas fa-check">Selesai</i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
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

</body>

</html>