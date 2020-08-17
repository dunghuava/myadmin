<style>
.detail-more {
    width: 100%;
    overflow: auto;
    padding-bottom: 15px;
}
.detail-more li {
    display: inline-block;
    border-bottom: 1px dotted #dedede;
    padding: 7px 0;
    float: left;
    margin-right: 4%;
    width: 45%;
}
.detail-more li .left {
    float: left;
    color: rgba(68,76,89,.76);
    font-size: 16px;
    line-height: 24px;
}
.detail-more li .right {
    float: right;
    color: #444c59;
    font-size: 15px;
    font-weight: bold;
    max-width: 48%;
    overflow: hidden;
    height: 24px;
    text-align: right;
}
.detail-commodities {
    width: 100%;
    overflow: auto;
}
.detail-commodities li {
    display: block;
    padding: 7px 0;
    float: left;
    width: 33.33%;
    padding-right: 10px;
}
.detail-commodities li::before {
    content: "•";
    padding-right: 10px;
    color: rgb(34, 145, 160);
}

.overview-toolbar ul li a {
    font-size: 18px!important;
}

</style>
<?php 
    $duan_img = $this->Project_Images_M->all(['project_id'=>$duan['project_id']]);
    $cdt = $this->Investor_M->find_row(['investor_id'=>$duan['project_investor']]);
    $arr_project = $duan_lancan;
?>
<div class="product-detailt font18">
    <!-- begin -->
    <!-- detailt -->
    <section class="project-slider">
        <div class="item-slider">
            <img src="<?=base_url('upload/images/'.$duan['project_img'])?>" alt="">
        </div>
        <?php foreach ($duan_img as $img){  ?>
            <div class="item-slider">
                <img src="<?=base_url('upload/images/'.$img['project_images'])?>" alt="">
            </div>
        <?php } ?>
    </section>
    <!-- detailt -->
    <section id="small-thumb">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="project-small-slider">
                        <div class="item-slider">
                            <img src="<?=resizeImg($duan['project_img'],85,70,1)?>" alt="<?=$duan['project_title']?>">
                        </div>
                    <?php
                     foreach ($duan_img as $img){  ?>
                        <div class="item-slider">
                            <img src="<?=resizeImg($img['project_images'],85,70,1)?>" alt="<?=$duan['project_title']?>">
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
    <section class="sec-head">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="title-prj"><?=$duan['project_title']?></h3>
                    <p><span class="fa fa-map-marker"></span>&nbsp; <?=$duan['project_address']?></p>
                </div>
                <div class="col-md-3"><br><br>
                    <p>Giá: <b style="font-size:18px"><?=$duan['project_price']?></b></p>
                </div>
            </div>
        </div>
    </section><br>
    <section class="container">
        <div class="row">
        <div class="col-md-12">
                <!-- detail -->
                <ul class="detail-more-top font18_all">
                    <li>
                        <p class="left">Số block</p>
                        <p class="right"><?=$duan['number_blocks']?$duan['number_blocks']:'Đang cập nhập';?></p>
                    </li>
                    <li>
                        <p class="left">Số tầng</p>
                        <p class="right"><?=$duan['number_floors']?$duan['number_floors']:'Đang cập nhập';?></p>
                    </li>
                    <li>
                        <p class="left">Số căn hộ</p>
                        <p class="right"><?=$duan['number_units']?$duan['number_units']:'Đang cập nhập';?></p>
                    </li>
                    <li>
                        <p class="left">Số toles</p>
                        <p class="right"><?=$duan['number_tolet']?$duan['number_tolet']:'Đang cập nhập';?></p>
                    </li>
                    <li>
                        <p class="left">Số phòng ngủ</p>
                        <p class="right"><?=$duan['number_bedroom']?$duan['number_bedroom']:'Đang cập nhập';?></p>
                    </li>
                    <li>
                        <p class="left">Diện tích căn hộ</p>
                        <p class="right"><?=$duan['project_acreage']?$duan['project_acreage']:'Đang cập nhập';?></p>
                    </li>
                    <li>
                        <p class="left">Chủ đầu tư</p>
                        <p class="right">
                            <span class="comma">
                                <?php if ($cdt['investor_id']!='') {?>
                                    <a href="<?=base_url()?>/chu-dau-tu/<?=$cdt['investor_alias'].'-'.$cdt['investor_id']?>">
                                        <?=$cdt['investor_title']?>
                                    </a>
                                <?php }else{ ?>
                                    Đang cập nhật
                                <?php } ?>
                            </span>
                        </p>
                    </li>
                </ul>
                <!-- detail -->
                </div>
        </div>
    </section>
    <!-- overview-toolbar -->
    <div id="toolbar" class="overview-toolbar hidden-xs" style="border-bottom:0px solid #dcdcdc">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li style="padding-left:0px"><a href="<?=fullAddress().'#p_overview'?>">Tổng quan</a></li>
                        <li><a href="<?=fullAddress().'#p_location'?>">Vị trí</a></li>
                        <li><a href="<?=fullAddress().'#p_forent'?>">Bán & cho thuê</a></li>
                        <li><a href="<?=fullAddress().'#p_orther'?>">Dự án lân cận</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onscroll = function() {addSticky()};
        var navbar = document.getElementById("toolbar");
        var sticky = (navbar.offsetTop)/10;
        function addSticky() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
    <!-- overview-toolbar -->
    <section class="sec-body">
        <div class="container">
            <div class="row">
                <div id="p_overview" class="col-md-8">
                    <h3>Giới thiệu</h3>
                    <div id="read01" class="font18_all readmore closed"><span><?=$duan['project_introduce']?></span></div>
                    <p><a class="font18" style="color:#65BA69;cursor:pointer"  parent="#read01" onclick="readmore(this)">Xem thêm <span class="fa fa-angle-down"></span></a></p>
                    <div id="mycollapse">
                        <div class="item-collapse">
                            <div class="head-collapse">
                                <p>Thông tin chi tiết</p>
                            </div>
                            <div class="content-collapse">
                                <!-- detail -->
                                <ul class="detail-more font18_all">
                                    <li>
                                        <p class="left">Số block</p>
                                        <p class="right"><?=$duan['number_blocks']?$duan['number_blocks']:'Đang cập nhập';?></p>
                                    </li>
                                    <li>
                                        <p class="left">Số tầng</p>
                                        <p class="right"><?=$duan['number_floors']?$duan['number_floors']:'Đang cập nhập';?></p>
                                    </li>
                                    <li>
                                        <p class="left">Số căn hộ</p>
                                        <p class="right"><?=$duan['number_units']?$duan['number_units']:'Đang cập nhập';?></p>
                                    </li>
                                    <li>
                                        <p class="left">Số toles</p>
                                        <p class="right"><?=$duan['number_tolet']?$duan['number_tolet']:'Đang cập nhập';?></p>
                                    </li>
                                    <li>
                                        <p class="left">Số phòng ngủ</p>
                                        <p class="right"><?=$duan['number_bedroom']?$duan['number_bedroom']:'Đang cập nhập';?></p>
                                    </li>
                                    <li>
                                        <p class="left">Diện tích căn hộ</p>
                                        <p class="right"><?=$duan['project_acreage']?$duan['project_acreage']:'Đang cập nhập';?></p>
                                    </li>
                                    <li>
                                        <p class="left">Chủ đầu tư</p>
                                        <p class="right">
                                            <span class="comma">
                                                <?php if ($cdt['investor_id']!='') {?>
                                                    <a href="<?=base_url()?>/chu-dau-tu/<?=$cdt['investor_alias'].'-'.$cdt['investor_id']?>">
                                                        <?=$cdt['investor_title']?>
                                                    </a>
                                                <?php }else{ ?>
                                                    Đang cập nhật
                                                <?php } ?>
                                            </span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="left">Giá</p>
                                        <p class="right">
                                           <?=$duan['project_price']?>
                                        </p>
                                    </li>
                                </ul>
                                <!-- detailt -->
                            </div>
                        </div>
                        <div class="item-collapse">
                            <div class="head-collapse">
                                <p>Tiện ích</p>
                            </div>
                            <div class="content-collapse">
                                <!-- tiện ích -->
                                <ul class="detail-commodities font18_all">
                                    <?php foreach ($tienich as $item){ ?>
                                        <li><?=$item['extension_name']?></li>
                                    <?php } ?>
                                </ul>
                                <!-- tiện ích -->
                            </div>
                        </div>
                        <div class="item-collapse">
                            <div class="head-collapse">
                                <p>Chủ đầu tư</p>
                            </div>
                            <div class="content-collapse font18_all">
                                <div class="col-md-3">
                                    <img style="width:170px;border:1px solid #dcdcdc" src="<?=resizeImg($cdt['investor_img'],170,170,2)?>" alt="<?=$cdt['investor_title']?>">
                                </div>
                                <div class="col-md-9">
                                    <h3><b><?=$cdt['investor_title']?></b></h3>
                                    <p><?=$cdt['investor_introduce']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="item-collapse" id="p_location">
                            <div class="head-collapse opened">
                                <p>Vị trí dự án</p>
                            </div>
                            <div class="content-collapse" style="display:block">
                                <!-- google map -->
                                <div id="googleMap" class="map-area" style="width:100%;height:360px;">
                                <script>
                                        var lat = <?=$duan['project_lat']!='' ? $duan['project_lat']:0?>;
                                        var lng  = <?=$duan['project_lng']!='' ? $duan['project_lng']:0?>;
                                        function initMap() {
                                            var myLatLng = {lat: lat, lng: lng};
                                            var map = new google.maps.Map(document.getElementById('googleMap'), {
                                                zoom: 15,
                                                center: myLatLng,
                                                icon:false,
                                            });
                                            var contentString='<h4><?=$duan['project_title']?></h4><p><?=substr($duan[0]['project_introduce'],0,150)?>...</p>';
                                            const infowindow = new google.maps.InfoWindow({
                                                content: contentString
                                            });
                                            var marker = new google.maps.Marker({
                                                position: myLatLng,
                                                map: map,
                                                icon:false,
                                                title: '<?=$duan['project_title']?>',
                                            });
                                            infowindow.open(map, marker);
                                            marker.addListener("click", () => {
                                                infowindow.open(map, marker);
                                            });
                                        }
                                    </script>
                                </div>
                                <!-- google map -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="boxed font18">
                        <div class="col-md-12 div-contact">
                            <div class="div-contact-img">
                                <img class="img-contact" src="<?=resizeImg('sale_manager.jpg',70,70,0)?>">
                            </div>
                            <div class="col-md-8 name-contact">
                                <p class="font18" style="font-weight: bold;">Trương Công Ánh</p>
                                <p class="font17">Sale manager</p>
                            </div>

                        </div>
                        <div class="col-md-12 div-contact-tel">
                            <a style="color: white;text-decoration: none;" href="tel:0123456789"><i class="fa fa-phone" aria-hidden="true"></i> 0123456789</a>

                        </div>
                        <div class="col-md-12">
                            <p style="text-align: center;margin-top: 15px;">Hoặc</p>
                            <hr>
                        </div>


                        <style>
                            #form-contact input.form-control{
                                height:45px;
                                font-size: 17px;
                            }
                        </style>
                        <form id="form-contact" action="" method="post">
                            <h4>Liên hệ tư vấn</h4>
                            <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="Họ và tên">
                            <input type="text" name="contact_phone" id="contact_phone" class="form-control" placeholder="Số điện thoại">
                            <input type="text" name="contact_email" id="contact_email" class="form-control" placeholder="Địa chỉ email">
                            <input type="hidden" name="contact_project_title" id="contact_project_title" class="form-control" value="<?=$duan['project_title']?>">
                            <input type="text" name="" id="" class="form-control text-overflow" value="<?=$duan['project_title']?>" disabled style="background: gainsboro;">
                            <textarea name="contact_info" id="contact_info" rows="4" class="form-control font17" placeholder="Hỏi thông tin"></textarea>
                            <button type="submit" class="btn btn-block btn-primary font17">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
            <h3 id="p_orther">Dự án lân cận</h3>
            <div class="row">
                <div class="slick">
                    <?php $col=4; include ('duan-item.php') ?>
                </div>
            </div>
            <h3 id="p_forent">Bán & Cho thuê</h3>
            <div class="row">
                <div class="slick">
                    <?php $col=4; include ('duan-item.php') ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&callback=initMap&libraries=drawing,places"></script>
<script type="text/javascript">
        
    $('#form-contact').submit(function(event){  
        event.preventDefault();  

            $.ajax({  
                url:"<?=base_url()?>web/addContact",  
                method:"POST",  
                data:$('#form-contact').serialize(),  
                success: function (data) {
                    const toast = swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2500
                    });

                    toast({
                        type: 'success',
                        title: 'Thông tin đã được gửi',
                    });

                    $('#form-contact').find('input').val('');
                    $('#form-contact').find('textarea').val('');
                }
            });  

    });

</script>



