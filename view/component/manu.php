    <div class="wrapper">
        <!-- Navbar TOP ด้านบน -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top" aria-label="">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><em class="fas fa-bars"></em></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Type</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">News</a>
                </li>
            </ul>
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                    </a>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Navbar TOP ด้านบน -->

        <!-- Navbar Left ด้านซ้าย-->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../../assets/theme/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <section class="sidebar" style="height: auto;">
                <!-- User -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../assets/theme/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>
                <!-- User -->
                <!-- Sidebar Menu -->
                <nav class="mt-2" aria-label="">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <em class="nav-icon fas fa-th"></em>
                                <p>Home</p>
                            </a>
                        </li>
                        <!-- menu Dropdown -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Inventory
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../view/inventory/inventory_list.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../view/inventory/inventory_form.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- menu Dropdown -->

                        <!-- menu Dropdown -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Customers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../view/customers/customers_list.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../view/customers/customers_form.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- menu Dropdown -->

                        <!-- menu Dropdown -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Suppliers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../view/suppliers/suppliers_list.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>list</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../view/suppliers/suppliers_form.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- menu Dropdown -->

                        <!-- หัวข้อย่อย -->
                        <li class="nav-header">หัวข้อย่อย</li>
                        <!-- หัวข้อย่อย -->

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <em class="nav-icon fas fa-sign-out-alt"></em>
                                <p>Log out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Sidebar-menu -->
            </section>
            <!-- Sidebar -->
        </aside>
        <!-- Navbar Left ด้านซ้าย-->

        <!-- Header Content  -->
        <div class="content-wrapper mt-5">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Content  -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">