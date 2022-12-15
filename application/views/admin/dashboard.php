<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this ->load->view('admin/_partials/head.php');?>
      
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

        <!-- Top Navar -->
        <?php $this->load->view('admin/_partials/navbar.php');?>
        <!-- /Top Navbar -->

        <!-- Left Sidebar -->
        <?php $this->load->view('admin/_partials/sidebar.php');?>
        <!-- /Left Sidebar -->

        <!-- Main Content -->
        <div class="content-wrapper">

        <!-- Breadcrumb -->
        <?php $this->load->view('admin/_partials/breadcrumb.php');?>
        <!-- /Breadcrumb -->

            <section class="content">
                <div class="card">
                    <!-- Navbar Content -->
                    <div class="card-header">
                        <!-- <h3 class="card-title">Data Pertanyaan</h3> -->
                    </div>
                    <!-- /Navbar Content -->
                    <!-- Page Content -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            

                        <!-- ==================== -->
                        
                            <section class="pricing-section">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        
                                            <div class="section-title text-center title-ex1">
                                                <h2>Product</h2>
                                            </div>
                                    
                                    </div>
                                    <!-- Pricing Table starts -->
                                    <div class="row">
                                    <?php foreach($dataProduct as $rowProduct){?>
                                        <div class="col-sm-6 col-md-4 mb-3">
                                            <div class="price-card ">
                                                <h2><?=$rowProduct->productName?></h2>
                                                <!-- <p>The standard version</p> -->
                                                <h2 class="price">Rp <?=$rowProduct->price?></h2>
                                                <ul class="pricing-offers">
                                                    <li>Diskon : <?=$rowProduct->discount?> %</li>
                                                    <li>Dimension : <?=$rowProduct->dimension?></li>
                                                    <li>Unit : <?=$rowProduct->unit?></li>
                                                    
                                                </ul>
                                                <a href="<?=base_url('ProductTransaction/viewTransactionProduct/'.$rowProduct->productCode)?>" class="btn btn-primary btn-mid">Buy Now</a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                       
                                        
                                    </div>
                                </div>
                            </section>
                        <!-- ========================= -->
                           
                            
                        </div>
                        
                        </div>
                    </div>
                    <!-- /Page Content -->
                    <!-- Footer Content -->
                    <!-- <div class="card-footer">
                        Footer
                    </div> -->
                    <!-- /Footer Content -->
                </div>
            </section>
        </div>
        <!-- /Main Content -->

        <!-- Footer -->
        <?php $this->load->view('admin/_partials/footer.php');?>
        <!-- /Footer -->
    </div>

    <!-- JS -->
    <?php $this->load->view('admin/_partials/js.php');?>
    <!-- /Js -->
</body>
</html>