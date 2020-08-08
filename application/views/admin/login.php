<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <base href="<?=base_url()?>">
  <link rel="icon" href="dist/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .login-card-body{
      border-radius: 0px;
    }
    .form-control {
      height: calc(2.25rem + 10px);
    }
    .btn-login {
      color: #fff;
      background-color: #128a4a !important;
      border-color: #128a4a !important;
    }
  </style>
</head>
<body class="hold-transition login-page" style="background:#EFF0F4">
<div class="login-box">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="text-center">
        <img style="width:150px;margin:10px auto" src="<?=base_url('upload/logo_print.png')?>" alt="">
      </div>
      <form onsubmit="do_login()" action="" method="post">
        <div class="input-groups mb-3">
          <input name="user_name" type="text" class="form-control" placeholder="Tên đăng nhập">
          <div class="input-group-append">
          </div>
        </div>
        <div class="input-groups mb-3">
        <input name="user_password" type="password" class="form-control" placeholder="Mật khẩu">
          <div class="input-group-append">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="social-auth-links text-center mb-3">
              <button name="btn_do_login" type="submit" class="btn btn-block btn-primary btn-login">
                <i id="load" style="display:none" class="fa fa-refresh fa-spin"></i>
                 Đăng nhập
              </button>
              <p style="margin:5px 0px;color:red;font-size:12px"><?php if ($this->session->flashdata('reponse')) {echo $this->session->flashdata('reponse');} ?></p>
            </div>

            <div class="text-center">
              <p>Copyright © 2020 dsoft. All Rights Reserved</p>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
    function do_login(){
       $('#load').show();
    }
</script>
</body>
</html>
