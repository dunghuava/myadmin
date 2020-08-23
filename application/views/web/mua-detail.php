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
    content: "✔";
    padding-right: 10px;
    color: rgb(34, 145, 160);
}
.detail-commodities li.no::before {
    content: "✖";
    padding-right: 10px;
    color: red;
}

.overview-toolbar ul li a {
    font-size: 18px!important;
}

</style>
<?php 
    $duan_img = $this->Project_Images_M->all(['project_id'=>$duan['project_id']]);
    $kdc = $this->Residential_M->find_row(['residential_id'=>$duan['project_residential']]);
    $arr_project = $duan_lancan;
    $loai_hinh = $this->Type_M->all();
    $noi_that = $this->Furniture_M->all();
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
                    <h3 class="title-prj"><b><?=$duan['project_title']?></b></h3>
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
                        <li><a href="<?=fullAddress().'#p_orther'?>">Nhà đất lân cận</a></li>
                        <li><a href="<?=fullAddress().'#p_location'?>">Vị trí</a></li>
                        <li><a href="<?=fullAddress().'#duan_orther'?>">Dự án lân cận</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onscroll = function() {addSticky()};
        var navbar = document.getElementById("toolbar");
        var sticky = (navbar.offsetTop)/5;
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
                    <h3><b>Giới thiệu</b></h3>
                    <div id="read01" class="font18_all readmore closed"><span><?=$duan['project_introduce']?></span></div>
                    <p><a class="font18" style="color:#65BA69;cursor:pointer"  parent="#read01" onclick="readmore(this)">Xem thêm <span class="fa fa-angle-down"></span></a></p>
                    <div class="content-mua">
                        <!-- mua -->
                            <!-- detail -->
                            <h3>Thông tin chi tiết</h3>
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
                            <h3>Loại hình</h3>
                            <!-- tiện ích -->
                            <ul class="detail-commodities font18_all">
                                <?php foreach ($loai_hinh as $item){ ?>
                                    <li <?=$duan['project_type']!=$item['id_type_project'] ? 'class="no"':''?>><?=$item['type_project']?></li>
                                <?php } ?>
                            </ul>
                            <!-- tiện ích -->
                            <h3>Tiên ích</h3>
                            <!-- tiện ích -->
                            <ul class="detail-commodities font18_all">
                                <?php foreach ($tienich as $item){ ?>
                                    <li><?=$item['extension_name']?></li>
                                <?php } ?>
                            </ul>
                            <h3>Nội thất</h3>
                            <!-- tiện ích -->
                            <ul class="detail-commodities font18_all">
                                <?php
                                    $explor = explode(',',$duan['project_furniture']);
                                    foreach ($noi_that as $item){ 
                                ?>
                                    <li class="<?php if(!in_array($item['id_furniture_project'],$explor)) {echo "no";} ?>" ><?=$item['furniture_project']?></li>
                                <?php } ?>
                            </ul>
                            <!-- tiện ích -->
                            <!-- tiện ích -->
                        <!-- mua -->
                    </div>
                </div>
                <div class="col-md-4">
                    <?php include ('form-contact.php') ?>
                </div>
            </div>
            <div class="row" id="p_location">
                <div class="col-md-12">
                    <h3>Vị trí</h3>
                    <?php include ('google-map-project.php') ?>
                </div>                
            </div>
            <br>

            <h3 id="p_orther">Nhà đất lân cận</h3>
            <div class="row">
                <div class="slick">
                    <?php 
                        $arr_project = $thue_ban_lancan;
                        $col=4; include ('duan-item.php') 
                    ?>
                </div>
            </div>

            <br>

            <h3 id="duan_orther">Dự án lân cận</h3>
            <div class="row">
                <div class="slick">
                    <?php 
                        $arr_project = $duan_lancan;
                        $col=4; include ('duan-item.php') 
                    ?>
                </div>
            </div>

        </div>
    </section>

<?php if (!empty($kdc)) {?>
    <section class="container">
        <div class="row">
            <div class="col-md-12">
               <h3>Khu dân cư</h3>
            </div>
            <div class="col-md-3">
                <img src="<?=resizeImg($kdc['residential_img'],262,165,2)?>" alt="<?=$kdc['residential_img']?>">
            </div>
            <div class="col-md-9">
                <h3 style="margin:0px"><b><?=$kdc['residential_title']?></b></h3>
                <div id="read02" class="readmore closed"><p><?=$kdc['residential_introduce']?></p></div>
                <p><a class="font18" style="color:#65BA69;cursor:pointer"  parent="#read02" onclick="readmore(this)">Xem thêm <span class="fa fa-angle-down"></span></a></p>
            </div>
        </div>
    </section>
<?php } ?>
    <!-- end -->
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&callback=initMap&libraries=drawing,places"></script>




