<section class="page-khudancu-detail">
    <div class="banner" style="background:url(<?=resizeImg($kdc['residential_img'],1500,500,0)?>)">
        <div class="abs-content container">
            <div class="col-md-12 pd0">
                <p>Khu dân cư  TP. Hồ Chí Minh  Quận 2</p>
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
                <span class="btn btn-default"><?=$tag?></span>
                <?php 
                    } 
                ?>
            </div>
            <div class="col-md-4">
                <h3>Giao thông</h3>
                <p>Kết nối với các con đường trọng điểm trong khu vực.</p>
                <h3>Cảnh quan</h3>
                <p>Kết nối với các con đường trọng điểm trong khu vực.</p>
            </div>
        </div>
    </div><br>
    <div class="house-selling" id="p_selling">
        <div class="container">
            <div class="text-center">
                <h3>Nhà bán tại khu đô thị thủ thiêm</h3>
            </div><br>
            <div class="row">
                <!-- item -->
                <?php for ($i=0;$i<3;$i++){ ?>
                <div class="col-md-4">
                    <div class="item-project">
                        <a href="">
                            <div class="project-info">
                                <img src="<?=base_url('upload/images/image.jpg')?>" alt="">
                                <div class="status">
                                    <span>Đang mở bán</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <ul class="extends">
                                    <li class="big-price">9.50 Tỷ</li>
                                    <li>2WC</li>
                                    <li>4PN</li>
                                    <li>150 m²</li>
                                </ul>
                                <div class="clear"></div>
                                <p><span class="fa fa-map-marker"></span> <b>Quận 04</b></p>
                                <p class="text-overflow">Cho thuê căn hộ Vinhomes Central Park 4PN, tầng sang chảnh tiện nghi</p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
                <!-- item -->
            </div>
        </div>
    </div>
    <div class="house-forent" id="p_forent">
        <div class="container">
            <div class="text-center">
                <h3>Nhà cho thuê tại khu đô thị thủ thiêm</h3>
            </div><br>
            <div class="row">
                <!-- item -->
                <?php for ($i=0;$i<3;$i++){ ?>
                <div class="col-md-4">
                    <div class="item-project">
                        <a href="">
                            <div class="project-info">
                                <img src="<?=base_url('upload/images/image.jpg')?>" alt="">
                                <div class="status">
                                    <span>Đang mở bán</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <ul class="extends">
                                    <li class="big-price">9.50 Tỷ</li>
                                    <li>2WC</li>
                                    <li>4PN</li>
                                    <li>150 m²</li>
                                </ul>
                                <div class="clear"></div>
                                <p><span class="fa fa-map-marker"></span> <b>Quận 04</b></p>
                                <p class="text-overflow">Cho thuê căn hộ Vinhomes Central Park 4PN, tầng sang chảnh tiện nghi</p>
                            </div>
                        </a>
                    </div>
                </div>
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
                <div class="text-center"><h3>Vị trí Diamond Island - Đảo Kim Cương trên bản đồ</h3></div>
                <div class="row">
                    <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="map-area">
                                <!-- maps -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.5199509026907!2d106.72920581417173!3d10.792680661846168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526069cf8c86f%3A0xa1b7c21cef8154a0!2zQ8OgIFBow6ogVGjhu4FtIFhhbmg!5e1!3m2!1sen!2s!4v1597157277054!5m2!1sen!2s" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                <!-- maps -->
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