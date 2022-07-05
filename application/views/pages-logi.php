<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
   <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
    <!--plugins-->
    <link href="<?php echo base_url();?>assets/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?php echo base_url();?>assets/assets/css/pace.min.css" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url();?>assets/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/icons.css" rel="stylesheet">
    <title>Sistem Peternakan Kecamatan Indralaya</title>
</head>

<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="<?php echo base_url();?>assets/images/logo.png" width="150" alt="" />
                            <BR><h2>SISTEM INFORMASI PETERNAKAN</h2>
                        </div>
                        <div class="card">
                            <div class="card-body">

                                <div class="border p-4 rounded">


                                        <?php if(isset($pesan)){
                       echo "<div class='alert bg-danger alert-dismissible col-12'>
                        <b><font color='white'>$pesan</font></b></div>";
                        }
                        ?>
                        <?php if ($this->session->flashdata('pesan')): ?>
                            <b>
                               <div class='alert bg-danger alert-dismissible col-12'>
                        <font color='white'><?php echo $this->session->flashdata('pesan'); ?></font></div>
                        </b>
                            <?php endif; ?>

                                    <div class="form-body">
                                        <form class="row g-3" action="<?= base_url('login')?>" method="post">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="inputEmailAddress" name="username" placeholder="Masukan Username">
                                                <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" class="form-control border-end-0" placeholder="Masukan Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-light"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?php echo base_url();?>assets/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="<?php echo base_url();?>assets/assets/js/app.js"></script>
</body>

</html>