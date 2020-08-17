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
    font-weight: 500;
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
</style>
<?php 
    $duan_img = $this->Project_Images_M->all(['project_id'=>$duan['project_id']]);
    $cdt = $this->Investor_M->find_row(['investor_id'=>$duan['project_investor']]);
?>
<div class="product-detailt">
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
                            <img src="<?=base_url('upload/images/'.$duan['project_img'])?>" alt="">
                        </div>
                    <?php
                     foreach ($duan_img as $img){  ?>
                        <div class="item-slider">
                            <img src="<?=base_url('upload/images/'.$img['project_images'])?>" alt="">
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
    <section class="sec-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Tổng quan</h3>
                    <p><?=$duan['project_introduce']?></p>
                    <div id="mycollapse">
                        <div class="item-collapse">
                            <div class="head-collapse">
                                <p>Thông tin chi tiết</p>
                            </div>
                            <div class="content-collapse">
                                <!-- detail -->
                                <ul class="detail-more">
                                    <li>
                                        <p class="left">Số block</p>
                                        <p class="right"><?=$duan['number_blocks']?></p>
                                    </li>
                                    <li>
                                        <p class="left">Số tầng</p>
                                        <p class="right"><?=$duan['number_floors']?></p>
                                    </li>
                                    <li>
                                        <p class="left">Số căn hộ</p>
                                        <p class="right"><?=$duan['number_units']?></p>
                                    </li>
                                    <li>
                                        <p class="left">Số toles</p>
                                        <p class="right"><?=$duan['number_tolet']?></p>
                                    </li>
                                    <li>
                                        <p class="left">Số phòng ngủ</p>
                                        <p class="right"><?=$duan['number_bedroom']?></p>
                                    </li>
                                    <li>
                                        <p class="left">Diện tích căn hộ</p>
                                        <p class="right"><?=$duan['project_acreage']?></p>
                                    </li>
                                    <li>
                                        <p class="left">Chủ đầu tư</p>
                                        <p class="right">
                                            <span class="comma">
                                                    <a href="<?=base_url()?>/chu-dau-tu/<?=$cdt['investor_alias']?>">
                                                        <?=$cdt['investor_title']?>
                                                    </a>
                                            </span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="left">Công ty quản lý</p>
                                        <p class="right">Sunshine Service</p>
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
                                <ul class="detail-commodities">
                                    <li>Chỗ đậu xe</li>
                                    <li>Sân nướng BBQ</li>
                                    <li>Thang máy</li>
                                    <li>Trung tâm thương mại</li>
                                    <li>Hồ bơi</li>
                                    <li>Phòng sinh hoạt cộng đồng</li>
                                    <li>Phòng tập gym</li>
                                    <li>Công viên</li>
                                    <li>Bảo vệ 24/7</li>
                                    <li>Sân chơi trẻ em</li>
                                </ul>
                                <!-- tiện ích -->
                            </div>
                        </div>
                        <div class="item-collapse">
                            <div class="head-collapse">
                                <p>Chủ đầu tư</p>
                            </div>
                            <div class="content-collapse">
                                <img style="width:200px;border:1px solid #dcdcdc" src="<?=resizeImg($cdt['investor_img'],100,100,1)?>" alt="<?=$cdt['investor_title']?>">
                                <h3><?=$cdt['investor_title']?></h3>
                                <p><?=$cdt['investor_introduce']?></p>
                            </div>
                        </div>
                        <div class="item-collapse">
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
                                <br><br>
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



                        <form id="form-contact" action="" method="post">
                            <input type="text" class="form-control" placeholder="Họ và tên">
                            <input type="text" class="form-control" placeholder="Số điện thoại">
                            <input type="text" class="form-control" placeholder="Địa chỉ email">
                            <textarea name="" id="" rows="4" class="form-control" placeholder="Hỏi thông tin"></textarea>
                            <button class="btn btn-block btn-primary">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&callback=initMap&libraries=drawing,places"></script>
</script>


