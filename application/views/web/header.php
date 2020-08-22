<?php 
    if (!isset($title)){
        $title='Trang chủ';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <meta property="og:url"                content="<?=fullAddress()?>" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="<?=$title?>" />
    <meta property="og:description"        content="<?=$description?>" />
    <meta property="og:image"              content="<?=$img_path?>" />

    <base id="base_url" href="<?=base_url()?>">
    <link rel="stylesheet" href="<?=base_url('upload/slick/slick.css')?>">
    <link rel="stylesheet" href="<?=base_url('upload/slick/slick-theme.css')?>">
    <link rel="stylesheet" href="<?=base_url('upload/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=base_url('upload/font-awesome/css/font-awesome.css')?>">
    <link rel="stylesheet" href="<?=base_url('upload/css/app.css?v='.time())?>">
    <link rel="stylesheet" href="<?=base_url('upload/css/reponsive.css?v='.time())?>">
    <script src="<?=base_url('upload/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('upload/bootstrap/js/bootstrap.js')?>"></script>
    <script src="<?=base_url('upload/slick/slick.min.js')?>"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <style type="text/css">
        .icon-bedroom:before {
            content: url('https://api.iconify.design/zmdi-airline-seat-individual-suite.svg?height=16&inline=true');
            vertical-align: -0.125em;
        }

        .icon-acreage:before {
            content: url('https://api.iconify.design/zmdi-photo-size-select-small.svg?height=16&inline=true');
            vertical-align: -0.125em;
        }

        .main-title {
            font-size: 22px!important;
        }
    </style>
</head>
<body>
<header id="nav-bar" class="app-header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-8">
                <div class="logo">
                   <a href="<?=base_url()?>">
                        <img src="<?=resizeImg($info[0]['logo_img'],165,47,0)?>" alt="">
                   </a>
                </div>
            </div>
            <div class="col-xs-4 hidden-md hidden-lg text-right">
                <a href="#">
                    <span class="btnBar fa fa-bars"></span>
                </a>
            </div>
            <div class="col-md-10">
                <?php include ('menu.php') ?>
            </div>
        </div>
    </div>
</header>
<div id="backtotop"></div>
<script>
window.onscroll = function() {
    addSticky()
};
    var navbar = document.getElementById("nav-bar");
    var sticky = (navbar.offsetTop+50);
    function addSticky() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
        if (window.pageYOffset >200){
            $('#backtotop').show();
        }else{
            $('#backtotop').hide();
        }
    }
</script>
