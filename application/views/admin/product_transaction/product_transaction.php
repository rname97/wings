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
<form id="formAdd">
            <section class="content">
                <div class="card">

                    <div class="card-body">
                  
                        <!-- ========================== -->
                        
                        <div class="row justify-content-center">
                                <div class="col-sm-6 col-md-6">           
                                        <section class="pricing-section">
                                            <div class="container">
                                                        <div class="row">
                                                                <div class="col">
                                                                        <div class="price-card ">
                                                                            <h2><?=$rowProduct->productName?></h2>
                                                                            
                                                                            <h4 class="price">RP : <?=$rowProduct->price?></h4>
                                                                            <li>Diskon : <?=$rowProduct->discount?> %</li>
                                                                            <li>Dimension : <?=$rowProduct->dimension?></li>
                                                                            <li>Unit : <?=$rowProduct->unit?></li>
                                                                        </div>
                                                                </div>
                                                        </div>
                                            </div>
                                        </section>         
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <h3 class="my-3"><?=$rowProduct->productName?></h3>
                                    
                                    <hr>
                                        <input type="hidden" name="product_id" value="<?=$rowProduct->productID?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <input type="hidden" name="documentCode" value="TRX">
                                        <input type="hidden" name="statusBuy" value="buyNow">
                                        <?php
                                        if($dataTransaction == null){?>
                                        <input type="hidden" name="documentNumber" value="<?=$rowTransactionxx;?>">
                                            
                                           
                                        <?php }else{?>

                                            <input type="hidden" name="documentNumber" value="<?=$rowTransactionxx1;?>">
                                            <?php }
                                        
                                        ?>
                                        
                                    <div class="wrap input-group mb-2 mr-sm-2">
                                        <button type="button" class="sub btn btn-primary input-group-prepend mr-sm-2">-</button>
                                        <input class="count form-control col-lg-1 mr-sm-2" name="qty" type="text" id="count" value="1" min="1" max="100">
                                        <button type="button"  class="add btn btn-primary">+</button>
                                    </div>
                                    <div class="form-group">
                                  
                                        <h4 for="exampleInputEmail1">Discount : Rp<?=$rowProduct->discount?></h4>
                                        <input type="hidden" name="discount" class="form-control" id="discount" value="<?=$rowProduct->discount?>" aria-describedby="emailHelp">
                                      
                                    </div>
                                    <div class="form-group">
                                      
                                        <h4 for="exampleInputEmail1">Sub Total : Rp<?=$rowProduct->price?></h4>
                                        <input type="hidden" name="subTotal" class="form-control" id="subTotal" value="<?=$rowProduct->price?>" aria-describedby="emailHelp">
                                      
                                    </div>

                                    <div class="form-group">
                                        <h4 for="exampleInputEmail1">Total : Rp <span id="totalTextx"><?=$rowProduct->price?></span><span class="totalText" id="totalText"></span></h4>
                                        <input type="hidden" name="total" class="total" id="total">
                                      
                                    </div>
                                    <br>

                                    <button type="submit" id="addCart" class="btn btn-primary"><i class="fas fa-cart-plus fa-lg mr-2"></i>Add To Cart</button>
                                    <button type="submit" id="add" class="btn btn-primary"></i>Buy Now</button>
                                </div>
                        </div>
                                <!-- ======================= -->
                    </div>
                </div>
            </section>
            </form>
        </div>
        <!-- /Main Content -->

        <!-- Footer -->
        <?php $this->load->view('admin/_partials/footer.php');?>
        <!-- /Footer -->
    </div>

    <!-- JS -->
    <?php $this->load->view('admin/_partials/js.php');?>
    <!-- /Js -->
    <script>
        $('.add').click(function () {		
            var th = $(this).closest('.wrap').find('.count');    	
            var subTotal = $('#subTotal').val();
            console.log(subTotal);
            th.val(+th.val() + 1);



            var count = $('#count').val();
            var x = parseFloat(subTotal) * parseFloat(count) ;

            var discountx = $('#discount').val();
            var xx = (subTotal*discountx)/100;
            var zx = x - xx;
            console.log(x);
            $("#totalTextx").hide();
            $('#totalText').html(zx);
            $('#total').val(zx);
        });
        $('.sub').click(function () {
            var th = $(this).closest('.wrap').find('.count');    	
            if (th.val() > 1) th.val(+th.val() - 1);

            var subTotal = $('#subTotal').val();
            console.log(subTotal);


            var count = $('#count').val();
            var x = parseFloat(subTotal) * parseFloat(count) ;


            var discountx = $('#discount').val();
            var xx = (subTotal*discountx)/100;
            var zx = x - xx;
            console.log(x);
            $("#totalTextx").hide();
            $('#totalText').html(zx);
            $('#total').val(zx);
        });


        $(document).ready(function(){
            
            
        $('#add').on('click', function(){
            $.ajax({
                type : "POST",
                url  :"<?php echo base_url('Transaction/addBuyProduct')?>",
                dataType : "JSON",
                data : $('#formAdd').serialize(),
                success: function(data){
                    console.log(data);
                    if(data.status == 'success'){
                        console.log("sukses");
                    
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Di Tambahkan!',
                        
                        }).then(function() {
                            window.location.assign("<?php echo base_url();?>Dashboard");
                        });
                    
                    }else{
                        $('.gejalaCode_error').html(data.gejalaCode);
                        $('.gejalaNama_error').html(data.gejalaNama);
                    } 
                }
            });
            return false;
        });


        $('#addCart').on('click', function(){
            $.ajax({
                type : "POST",
                url  :"<?php echo base_url('Cart/addCart')?>",
                dataType : "JSON",
                data : $('#formAdd').serialize(),
                success: function(data){
                    console.log(data);
                    if(data.status == 'success'){
                        console.log("sukses");
                    
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Di Tambahkan!',
                        
                        }).then(function() {
                            window.location.assign("<?php echo base_url();?>Product");
                        });
                    
                    }else{
                        $('.gejalaCode_error').html(data.gejalaCode);
                        $('.gejalaNama_error').html(data.gejalaNama);
                    } 
                }
            });
            return false;
        });
        }); 
    </script>
</body>
</html>