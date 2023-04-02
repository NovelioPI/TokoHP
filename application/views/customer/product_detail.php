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
                    <h1 class="h3 mb-4 text-gray-800">Detail Produk</h1>
                    <!-- Card Product -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="<?= base_url('customer/product/' . $product['id']) ?>">
                                        <h6 class="m-0 font-weight-bold text-primary"><?= $product['product_name'] ?></h6>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <form class="product" method="post" action="<?= base_url('customer/order') ?>">
                                        <img src="<?= base_url('uploads/product/' . $product['image']) ?>" class="w-100" />
                                        <h6 class="mt-2">Harga : <?= $product['price'] ?></h6>
                                        <h6 class="mt-2">Penjual : <?= $product['admin_name'] ?></h6>
                                        <input type="hidden" name="product" value="<?= $product['id'] ?>">
                                        <?php if ($alreadyOrder) : ?>
                                            <button type="submit" class="btn btn-danger btn-icon-split" name="order" value="delete">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus dari keranjang</span>
                                            </button>
                                        <?php else : ?>
                                            <button type="submit" class="btn btn-success btn-icon-split" name="order" value="insert">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text">Keranjang</span>
                                            </button>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
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