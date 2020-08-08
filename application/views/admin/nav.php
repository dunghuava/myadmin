<style>
  .search-box{
    padding: 5px;
    background: white;
    width: 200%;
    position: absolute;
    top: 145%;
    border: 1px solid #cccccc69;
    border-top: 0px;
    display:none;
    z-index:999;
    -webkit-box-shadow: 0 6px 6px -6px #ccc;
  }
  .search-box .search-list{padding:0px;}
  .search-box .search-list .search-item{
    list-style:none;
    display:block;
    width:100%;
    padding:5px;
    cursor:pointer;
  }
  .search-box .search-list .search-item::before{
    font-family:'Font Awesome 5 Free';
    content:"\f1da";
    padding-right:5px;
    font-weight: 900;
    font-size: 12px;
  }
  .search-box .search-list .search-item:hover{
    background:#1A73E8;
    color:#fff;
  }
</style>

<?php include ('modal.php') ?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item xs-only">
        <a class="nav-link " data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item md-only">
        <a class="nav-link " href="<?=base_url()?>"><i class="fas fa-home"></i></a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('customer/list')?>" class="nav-link">Menu</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a data-toggle="modal" data-target="#aboutModal" href="javascript:void(0)" class="nav-link">
           <span class="fa fa-bell"></span>
        </a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form onsubmit="return false" class="form-inline ml-3" style="position:relative">
      <div class="input-group input-group-sm">
        <input id="search-area" class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
      <!-- search -->
        <div id="search-box" class="search-box">
            <ul class="search-list">
                <li class="search-item">Documentation</li>
            </ul>
        </div>
      <!-- search -->
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="custom-control custom-switch">
          <input style="cursor:pointer" <?=$setting['sibar_mode']==1 ? 'checked':''?> type="checkbox" class="custom-control-input" id="customSwitch">
          <label class="custom-control-label" for="customSwitch">&nbsp;&nbsp;&nbsp;</label>
        </div>
    </ul>
  </nav>

  <script>
    $(document).ready(function () {
        $('#search-area').focus(function (e) { 
            $('#search-box').slideDown();
        });
        $('#search-area').focusout(function (e) { 
            $('#search-box').hide();
        });

        $('#customSwitch').change(function (e) { 
            var swicth = $(this);
            var sibar=0;
            if (swicth.is(':checked')){
              sibar=1;
              $('.sidebar-mini.layout-fixed').addClass('sidebar-collapse');
            }else{
              sibar=0;
              $('.sidebar-mini.layout-fixed').removeClass('sidebar-collapse');
            }
            $.ajax({
              type: "post",
              url: "setting/sibar/"+sibar,
              success: function (response) {
                
              }
            });
        });
    });
  </script>