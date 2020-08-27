<br><br>
<?php include ('botchat.php') ?>

<style type="text/css">
    @media screen and (max-width: 990px) {
        .chinh_sach{
            text-align: left;
        }
    }
</style>
<footer class="app-footer font18">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-phone"></span>
                    <span>Hotline</span>
                    <p>(+84) <?=$info[0]['phone']?></p>
                </div>
            </div>

            <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-phone"></span>
                    <span>Khiếu nại, phản hồi</span>
                    <p>(+84) <?=$info[0]['phone']?></p>
                </div>
            </div>

            
            <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-envelope"></span>
                    <span>Email</span>
                    <p><?=$info[0]['email']?></p>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-address-card-o"></span>
                    <span>Địa chỉ</span>
                    <p><?=$info[0]['address']?></p>
                </div>
            </div>
            <!-- <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-envelope"></span>
                    <span>Email</span>
                    <p>(+48) 0383868205</p>
                </div>
            </div> -->
        </div><hr>
        <div class="row">
            <div class="col-md-3">
                <div style="font-weight: bold;font-size: 30px"><?=$info[0]['company']?></div>
                
                <div style="font-weight: bold;font-size: 25px;margin-left: -14px" class="col-md-12">
                    <a href="<?=$info[0]['facebook']?>" style="color: white;"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="<?=$info[0]['youtube']?>" style="color: white;"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="<?=$info[0]['twitter']?>" style="color: white;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="<?=$info[0]['instagram']?>" style="color: white;"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="title-footer">Dự án</div>
                <ul class="list-footer">
                    <?php foreach ($du_an_footer as $key => $daf) {?>
                        <li><a href="<?=base_url('chi-tiet-du-an/'.$daf['project_alias'].'-'.$daf['project_id'])?>"><?=$daf['project_title']?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="title-footer">Blog</div>
                <ul class="list-footer">

                    <?php
                    $blog = $this->Category_M->all(['cate_parent_id'=>11,'cate_is_public'=>1],'asc');
                    foreach ($blog as $key1 => $bl) {
                        if ($key1 <4) {
                    ?>
                        <li><a href="<?=base_url('danh-muc/'.$bl['cate_alias'])?>"><?=$bl['cate_title']?></a></li>
                    <?php } } ?>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="title-footer">Chuyên mục</div>
                <ul class="list-footer">

                    <?php
                    $categories = $this->Category_M->all(['cate_parent_id'=>0,'cate_is_menu'=>1,'cate_is_public'=>1],'asc');
                     foreach ($categories as $key2 => $cate) {
                        if ($key2 <4) {
                    ?>
                        <li><a href="<?=base_url('danh-muc/'.$cate['cate_alias'])?>"><?=$cate['cate_title']?></a></li>
                    <?php } } ?>
                </ul>
            </div>
        </div><hr>
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <span>© <?=$info[0]['coppy_right']?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right chinh_sach">
                    <span>Chính sách bảo mật, Điều khoản sử dụng, Phản hồi</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="hidden-md hidden-lg"><br><br><br></div>
<script src="<?=base_url('upload/js/app.js?v='.time())?>"></script>
<script src="<?=base_url()?>upload/js/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script type="text/javascript">
    $(function() {
    $('#btn_modal').on('click', function() {
      
      $('#form_pass').css("display","block");
      $($(this).data('modal')).modal({
        fadeDuration: 250
      });
      return false;
    });
  });

    // $(function() {
    // $('.container').on('click', '.btn_modal_contact', function() {

    //     console.log('aaaaa');
      
    //   $('#form_contact_modal').css("display","block");
    //   $($(this).data('modal')).modal({
    //     fadeDuration: 250
    //   });
    //   return false;
    // });
  // });
</script>
</body>
</html>