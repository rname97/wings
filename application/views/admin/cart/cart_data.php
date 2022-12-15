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
                        <h3 class="card-title">Data Cart Product</h3>
                        <div class="card-tools">
                            
                        </div>
                    </div>
                    <!-- /Navbar Content -->
                    <!-- Page Content -->
                    <form id="formAdd">
                                <input type="hidden" name="statusBuy" value="buyCart">
                                <input type="hidden" name="total" value="<?=$totalAll?>">
                                <input type="hidden" name="documentCode" value="TRX">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Product</th>
                                    <th>User</th>
                                    <th>qty</th>
                                    <th>total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                  
                                        <?php
                                        if($dataTransaction == null){?>
                                        <input type="hidden" name="documentNumber" value="<?=$rowTransactionxx;?>">
                                            
                                           
                                        <?php }else{?>

                                            <input type="hidden" name="documentNumber" value="<?=$rowTransactionxx1;?>">
                                            <?php }
                                        
                                        ?>
                                <?php 
                                    $i = 1;
                                    $c = 1;
                                    foreach($dataCart as $rowCart){
                                        
                                        ?>
                                       
                                        
                                      
                                        <input type="hidden" name="productcart_id[<?=$i?>]" value="<?=$rowCart->productcart_id?>">
                                        <input type="hidden" name="qty[<?=$i?>]" value="<?=$rowCart->qty?>">
                                        <input type="hidden" name="subTotal[<?=$i?>]" value="<?=$rowCart->total?>">
                                        
                                    <tr>
                                    <td><?=$c++ ?></td>
                                        <td><?= $rowCart->productName?></td>
                                        <td><?= $rowCart->userName?></td>
                                        <td><?= $rowCart->qty?></td>
                                        <td class="text-right"><?= $rowCart->total ?></td>
                                        
                                    </tr>
                                        
                                <?php $i++; } ?>
                                <tr>
                                        <td colspan="5" class="text-right"><h3>Total : <?=$totalAll?></h3></td>
                                        
                                        
                                    </tr>
                              
                                   

                                 
                                
                            </tbody>
                            
                        </table>
                        
                        <div class="d-flex justify-content-end">
                        <button type="submit" id="add" class="btn btn-primary mt-2 "><i class="fas fa-cart-plus fa-lg mr-2"></i>Buy Now</button>
                       
                    </div>
                    </form>
                    </div>
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
    
<script>
$(document).ready(function(){
    $('#cartTable').DataTable();

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

    $('#cartTable').on('click','#btn-delete',function(){
        var id=$(this).attr('value');
        console.log(id);
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            
        if (result.isConfirmed) {
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Cart/deleteCartID')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    console.log('success');
                    if(data.status == 'success'){
                        swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        ).then(function(){
                            location.reload();
                        });  
                    } 
                    else if(data.status == 'gagal'){
                        swalWithBootstrapButtons.fire(
                        'Warning!',
                        'Data Tidak Bisa Di Hapus, Ada Relasi.',
                        'Warning'
                        ).then(function(){
                            location.reload();
                        });  
                    }         
                }    
            });
        return false;
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    });
} );
    </script>
</body>
</html>