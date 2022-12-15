<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Brand Logo -->
    <a href="<?=base_url('admin/Dashboard/')?>" class="brand-link">
    <img src="<?= base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">TEST</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block"><?=$this->fungsi->user_login()->userName?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if($this->fungsi->user_login()->userRules == 1 || $this->fungsi->user_login()->userRules == 2){?>
                <!-- Menu Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('Dashboard')?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php } ?>
                <?php if($this->fungsi->user_login()->userRules == 1 || $this->fungsi->user_login()->userRules == 2 || $this->fungsi->user_login()->userRules == 3){?>
                    <li class="nav-item">
                        <a href="<?= base_url('Product')?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Product</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if($this->fungsi->user_login()->userRules == 1 || $this->fungsi->user_login()->userRules == 2 || $this->fungsi->user_login()->userRules == 3){?>
                    <li class="nav-item">
                        <a href="<?= base_url('Transaction')?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Transaction</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if($this->fungsi->user_login()->userRules == 1 || $this->fungsi->user_login()->userRules == 2 || $this->fungsi->user_login()->userRules == 3){?>
                    <li class="nav-item">
                        <a href="<?= base_url('Cart')?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Cart</p>
                        </a>
                    </li>
                <?php } ?>

                <?php if($this->fungsi->user_login()->userRules == 1 || $this->fungsi->user_login()->userRules == 2 || $this->fungsi->user_login()->userRules == 3){?>
                    <li class="nav-item">
                        <a href="<?= base_url('User')?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>User</p>
                        </a>
                    </li>
                <?php } ?>
               
            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>