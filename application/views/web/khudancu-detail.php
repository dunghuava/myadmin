<style type="text/css">
    .icon-bedroom:before {
    content: url('https://api.iconify.design/zmdi-airline-seat-individual-suite.svg?height=16&inline=true');
vertical-align: -0.125em;
}

.icon-acreage:before {
    content: url('https://api.iconify.design/zmdi-photo-size-select-small.svg?height=16&inline=true');
vertical-align: -0.125em;
}
}
</style>
<section class="page-khudancu-detail font17">
    <div class="banner" style="background:url(<?=resizeImg($kdc['residential_img'],1350,400,0)?>)">
        <div class="abs-content container">
            <div class="col-md-12 pd0">
                <?php 
                    $info_province = $this->Province_M->find_row(['province_id'=>$kdc['residential_province_id']]);
                    $info_district = $this->District_M->find_row(['district_id'=>$kdc['residential_district_id']]);
                ?>
                <p>Khu dân cư  <?=$info_district['district_name'].', '.$info_province['province_name'] ?></p>
                <h3 class="title"><?=$kdc['residential_title']?></h3>
            </div>
        </div>
    </div>
    <!-- overview-toolbar -->
    <div id="toolbar" class="overview-toolbar hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul>
                        <li style="padding-left:0px"><a href="<?=fullAddress().'#p_overview'?>">Tổng quan</a></li>
                        <li><a href="<?=fullAddress().'#p_selling'?>">Nhà đất bán</a></li>
                        <li><a href="<?=fullAddress().'#p_forent'?>">Nhà đất thuê</a></li>
                        <li><a href="<?=fullAddress().'#p_location'?>">Vị trí</a></li>
                        <li><a href="<?=fullAddress().'#p_detail'?>">Chi tiết</a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-right">
                    <a href="tel:900" class="btn"><span class="fa fa-phone"></span>&nbsp;0909990000</a>
                    <a href="tel:900" class="btn red"><span class="fa fa-info"></span>&nbsp;Yêu cầu thông tin</a>
                </div>
            </div>
        </div>
    </div>
    <!-- overview-toolbar -->
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="p_overview">
                <h3>Mô tả</h3>
                <p>
                   <?=$kdc['residential_introduce']?>
                </p>
                <h3>Tags</h3>
                <?php 
                    $tags = explode(',',$kdc['residential_tag']);
                    foreach ($tags as $tag){
                ?>
                <span style="background: #dedede;" class="btn btn-default"><?=$tag?></span>
                <?php 
                    } 
                ?>
            </div>
            <div class="col-md-4">
                <?php if (!empty($kdc['residential_habitat'])) {?>
                    <h3>Môi trường sống</h3>
                    <p><?=$kdc['residential_habitat']?></p>
                <?php } ?>

                <?php if (!empty($kdc['residential_community'])) {?>
                    <h3>Cộng đồng dân cư</h3>
                    <p><?=$kdc['residential_community']?></p>
                <?php } ?>

                <?php if (!empty($kdc['residential_utility'])) {?>
                    <h3>Tiện ích nổi bật</h3>
                    <p><?=$kdc['residential_utility']?></p>
                <?php } ?>

                <?php if (!empty($kdc['residential_traffic'])) {?>
                    <h3>Hiện trạng giao thông</h3>
                    <p><?=$kdc['residential_traffic']?></p>
                <?php } ?>
                
            </div>
        </div>
    </div><br>
    <div class="house-selling" id="p_selling">
        <div class="container">
            <div class="text-center">
                <h3>Nhà bán tại <?=$kdc['residential_title']?></h3>
            </div><br>
            <div class="row">
                <!-- item -->

                <?php
                if (!empty($list_mua)) {
                 foreach ($list_mua as $key => $mua) {
                    $info_province_mua = $this->Province_M->find_row(['province_id'=>$mua['project_province_id']]);
                    $info_district_mua = $this->District_M->find_row(['district_id'=>$mua['project_district_id']]);
                    $info_ward_mua = $this->Ward_M->find_row(['ward_id'=>$mua['project_ward_id']]);
                    $info_status_mua = $this->Status_M->find_row(['id_status_project'=>$mua['project_status']]);
                    
                ?>
                <div class="col-md-4">
                    <div class="item-project">
                        <a href="">
                            <div class="project-info">
                                <img src="<?=resizeImg($mua['project_img'],360,203,0)?>" alt="">
                                <div class="status">
                                    <span><?=$info_status_mua['status_project']?></span>
                                </div>
                            </div>
                            <div class="project-content">
                                <ul class="extends">
                                    <li class="big-price"><?=$mua['project_price']?></li>
                                    <li title="Diện tích"><span class="icon-acreage" style="padding-right: 5px"></span> <?=$mua['project_acreage']?></li>
                                    <li title="Phòng ngủ"><span class="icon-bedroom" style="padding-right: 5px"></span> <?=$mua['number_bedroom']?></li>
                                </ul>
                                <div class="clear"></div>
                                <p><span class="fa fa-map-marker"></span> <b><?=$info_ward_mua['ward_name'].', '.$info_district_mua['district_name'].', '.$info_province_mua['province_name']?></b></p>
                                <p class="text-overflow"><?=$mua['project_title']?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } }else{ ?>
                <div class="text-center" style="color:red"><h4>Dữ liệu đang được cập nhật...</h4></div>
                <br>
            <?php } ?>
                <!-- item -->
            </div>
        </div>
    </div>
    <div class="house-forent" id="p_forent">
        <div class="container">
            <div class="text-center">
                <h3>Nhà cho thuê tại <?=$kdc['residential_title']?></h3>
            </div><br>
            <div class="row">
                <!-- item -->
                <?php
                if (!empty($list_thue)) {
                 foreach ($list_thue as $key => $thue) {
                    $info_province_thue = $this->Province_M->find_row(['province_id'=>$thue['project_province_id']]);
                    $info_district_thue = $this->District_M->find_row(['district_id'=>$thue['project_district_id']]);
                    $info_ward_thue = $this->Ward_M->find_row(['ward_id'=>$thue['project_ward_id']]);
                    $info_status_thue = $this->Status_M->find_row(['id_status_project'=>$thue['project_status']]);
                    
                ?>
                <div class="col-md-4">
                    <div class="item-project">
                        <a href="">
                            <div class="project-info">
                                <img src="<?=resizeImg($thue['project_img'],360,203,0)?>" alt="">
                                <div class="status">
                                    <span><?=$info_status_thue['status_project']?></span>
                                </div>
                            </div>
                            <div class="project-content">
                                <ul class="extends">
                                    <li class="big-price"><?=$thue['project_price']?></li>
                                    <li title="Diện tích"><span class="icon-acreage" style="padding-right: 5px"></span> <?=$thue['project_acreage']?></li>
                                    <li title="Phòng ngủ"><span class="icon-bedroom" style="padding-right: 5px"></span> <?=$thue['number_bedroom']?></li>
                                </ul>
                                <div class="clear"></div>
                                <p><span class="fa fa-map-marker"></span> <b><?=$info_ward_thue['ward_name'].', '.$info_district_thue['district_name'].', '.$info_province_thue['province_name']?></b></p>
                                <p class="text-overflow"><?=$thue['project_title']?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } }else{ ?>
                <div class="text-center" style="color:red"><h4>Dữ liệu đang được cập nhật...</h4></div>
                <br>
            <?php } ?>
                <!-- item -->
            </div>
        </div>
    </div>

    <!-- location-are -->
    <style>
        div img{
            max-width:100%;
        }
    </style>
    <div class="div-location" id="p_location">
        <div class="container">
                <br>
                <div class="text-center"><h3>Vị trí <?=$kdc['residential_title']?> trên bản đồ</h3></div>
                <div class="row">
                    <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div id="googleMap" class="map-area" style="width:100%;height:360px;">
                               <script>
                                    var lat = <?=$kdc['residential_lat']!='' ? $kdc['residential_lat']:0?>;
                                    var lng  = <?=$kdc['residential_lng']!='' ? $kdc['residential_lng']:0?>;
                                    function initMap() {
                                        var myLatLng = {lat: lat, lng: lng};

                                        var map = new google.maps.Map(document.getElementById('googleMap'), {
                                            zoom: 15,
                                            center: myLatLng,
                                            icon:false,
                                        });
                                        var contentString='<h4><?=$kdc['residential_title']?></h4><p><?=substr($kdc[0]['residential_introduce'],0,150)?>...</p>';
                                        const infowindow = new google.maps.InfoWindow({
                                            content: contentString
                                        });
                                        var marker = new google.maps.Marker({
                                            position: myLatLng,
                                            map: map,
                                            icon:false,
                                            title: '<?=$kdc['residential_title']?>',
                                        });
                                        infowindow.open(map, marker);
                                        marker.addListener("click", () => {
                                            infowindow.open(map, marker);
                                        });
                                    }
                                </script>
                            </div>
                            <br><br>
                        </div>
                    <div class="col-md-1"></div>
                </div>
        </div>
    </div>
    <!-- location are -->
    <div class="content-kdc" id="p_detail">
        <div class="container">
            <br>
            <div class="text-center"><h3>Thông tin chi tiết <?=$kdc['residential_title']?></h3></div>
            <br>
            <p><?=$kdc['residential_content']?></p>
        </div>
    </div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&callback=initMap&libraries=drawing,places"></script>
<script>
<script>
window.onscroll = function() {addSticky()};
    var navbar = document.getElementById("toolbar");
    var sticky = (navbar.offsetTop);
    function addSticky() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>