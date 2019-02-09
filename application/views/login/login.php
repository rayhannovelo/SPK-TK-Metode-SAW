<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SPK | Login</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown" style="padding-top: 100px; width: 350px">
        
        <div class="ibox-content">
            <h3>Sistem Pendukung Keputusan Pemilihan Taman Kanak-Kanak Di Kota Palembang</h3>
            <hr>
            <?php
                if($this->session->flashdata('sukses')) {
                  echo $this->session->flashdata('sukses');
                }
            ?>
            <form class="m-t" role="form" action="<?php echo site_url('login')?>" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Log In</button>
            </form>
            <hr/>
            <a href="<?php echo site_url('beranda'); ?>"><strong>Copyright</strong> Sistem Pendukung Keputusan TK <small>© 2018</small></a>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

</body>

</html>
