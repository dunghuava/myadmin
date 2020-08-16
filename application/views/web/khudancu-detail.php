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
                    $arr_project = $list_mua;
                    $col = 4; include ('duan-item.php');
                ?>
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
                    $arr_project = $list_thue;
                    $col = 4; include ('duan-item.php');
                ?>
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