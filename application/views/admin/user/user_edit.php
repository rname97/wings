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
                                <h3 class="card-title">Tambah Petugas</h3>
                            </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <form id="formAdd" novalidate="novalidate">
                                <div class="card-body">
                                <input type="hidden" class="form-control" name="userID" value="<?=$rowUser->userID?>">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" class="form-control" name="userName" value="<?=$rowUser->userName?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="text" class="form-control" name="password" value="<?=$rowUser->userPassword?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Rules</label>
                                        <select name="userRules" id="" class="form-control">
                                            <option value="1" <?=$rowUser->userRules == 1 ? 'selected' : ''?>>Admin</option>
                                            <option value="2" <?=$rowUser->usersRules == 2 ? 'selected' : ''?>>User/option>

                                        </select>
                                        <!-- <input type="text" class="form-control" name="petugasRules" value=""> -->
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
                url  :"<?php echo base_url('User/editUser')?>",
                dataType : "JSON",
                data : $('#formAdd').serialize(),
                success: function(data){
                    console.log(data);
                    if(data.status == 'success'){
                        console.log("sukses");
                    
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Di Update!',
                        
                        }).then(function() {
                            window.location.assign("<?php echo base_url();?>User");
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