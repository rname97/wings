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
                <div class="container-fluid">
                    <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Product</h3>
                            </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <form id="formAdd" novalidate="novalidate">
                                <div class="card-body">
                                <input type="text" class="form-control" name="productID" value="<?=$rowProduct->productID?>" placeholder="Masukan Product">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">productCode</label>
                                        <input type="text" class="form-control" name="productCode" value="<?=$rowProduct->productCode?>" placeholder="Masukan Product">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">productName</label>
                                        <input type="text" class="form-control" name="productName" value="<?=$rowProduct->productName?>" placeholder="Masukan product Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">price</label>
                                        <input type="text" class="form-control" name="price"  value="<?=$rowProduct->price?>" placeholder="Masukan price">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">currency</label>
                                        <input type="text" class="form-control" name="currency"  value="<?=$rowProduct->currency?>" placeholder="Masukan currency">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">discount</label>
                                        <input type="text" class="form-control" name="discount"  value="<?=$rowProduct->discount?>" placeholder="Masukan discount">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">dimension</label>
                                        <input type="text" class="form-control" name="dimension"  value="<?=$rowProduct->dimension?>" placeholder="Masukan dimension">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">unit</label>
                                        <input type="text" class="form-control" name="unit"  value="<?=$rowProduct->unit?>" placeholder="Masukan unit">
                                    </div>
                                  
                                   
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" id="add" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                        </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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

    <script>
        $(document).ready(function(){
           
            
        $('#add').on('click', function(){
            $.ajax({
                type : "POST",
                url  :"<?php echo base_url('Product/editProduct')?>",
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