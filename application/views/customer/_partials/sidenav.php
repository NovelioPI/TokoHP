<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion justify-content-between" id="accordionSidebar">
    <div>
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('customer') ?>">
            <div class="sidebar-brand-text mx-3">Customer</div>
        </a>
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Produk</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('customer/product') ?>">Lihat Produk Dijual</a>
                    <a class="collapse-item" href="<?= base_url('customer/basket') ?>">Keranjang</a>
                </div>
            </div>
        </li>
    </div>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>