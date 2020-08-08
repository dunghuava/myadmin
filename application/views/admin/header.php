<!DOCTYPE html>
<html>
<head>
<head>
  <meta charset="utf-8">
  <base href="<?=base_url()?>">
  <link rel="icon" href="<?=base_url('upload/img/'.$setting['favicon'])?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$setting['app_name']?></title>
  <!-- meta tag -->
  <meta property="og:url"                content="https://pkmatbaoan.com" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="Bảo An Eyeclinic" />
  <meta property="og:description"        content="Phòng khám chuyên khoa mắt Bảo An" />
  <meta property="og:image"              content="https://pkmatbaoan.com/upload/meta.png" />
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/custom.css?<?=time()?>">
  <link rel="stylesheet" href="plugins/select2/css/select2.css">
  <link rel="stylesheet" href="plugins/datetimepicker/datetimepicker.css">
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<script src="plugins/jquery/jquery.min.js"></script>

  <style type="text/css">/* Chart.js */
  *{
    font-family: 'Roboto', sans-serif;
  }
  @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
</head>
<body class="sidebar-mini layout-fixed <?=$setting['sibar_mode']==0 ? '':'sidebar-collapse'?>" style="height: auto;">
  <div class="wrapper">

      <?php include 'nav.php' ?>
      <?php include 'sibar.php' ?>
      <?php 
        if(!isset($page_name)){
          $page_name='(unknow)';
        }
        if(!isset($page_name)){
          $page_menu='';
        }
      ?>
        <div class="content-wrapper" style="min-height: 434px;">
          <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6 col-md-12">
                    <h2 class="m-0 text-dark" style="font-weight: bold;"><?=$page_name?></h2>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->