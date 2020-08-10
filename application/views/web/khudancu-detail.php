<section class="page-khudancu-detail">
    <div class="banner" style="background:url(<?=base_url('upload/images/kdc_bg.jpg')?>)">
        <div class="abs-content container">
            <div class="row">
                <div class="col-md-12">
                    <p>Khu dân cư  TP. Hồ Chí Minh  Quận 2</p>
                    <h3 class="title">Khu đô thị mới Thủ Thiêm</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- overview-toolbar -->
    <div id="toolbar" class="overview-toolbar">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul>
                        <li><a href="">Tổng quan</a></li>
                        <li><a href="">Nhà đất bán</a></li>
                        <li><a href="">Nhà đất thuê</a></li>
                        <li><a href="">Vị trí</a></li>
                        <li><a href="">Chi tiết</a></li>
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
            <div class="col-md-8">
                <h3>Mô tả</h3>
                <p>
                    Khu đô thị mới Thủ Thiêm tọa lạc bên bờ Đông sông Sài Gòn đối diện Quận 1, với tổng diện tích 657 ha. Thủ Thiêm được quy hoạch là một trung tâm mới, hiện đại và  mở rộng của thành phố Hồ Chí Minh, với các chức năng chính là trung tâm tài chính, thương mại, dịch vụ cao cấp của thành phố, khu vực và có vị trí quốc tế, là trung tâm văn hóa, nghỉ ngơi, giải trí
                </p>
                <h3>Tags</h3>
                <span class="btn btn-default">Tag1</span>
                <span class="btn btn-default">Tag2</span>
                <span class="btn btn-default">Tag3</span>
                <span class="btn btn-default">Tag4</span>
            </div>
            <div class="col-md-4">
                <h3>Giao thông</h3>
                <p>Kết nối với các con đường trọng điểm trong khu vực.</p>
                <h3>Cảnh quan</h3>
                <p>Kết nối với các con đường trọng điểm trong khu vực.</p>
            </div>
        </div>
    </div><br>
    <div class="house-selling">
        <div class="container">
            <div class="text-center">
                <h3>Nhà bán tại khu đô thị thủ thiêm</h3>
            </div><br>
            <div class="row">
                <!-- item -->
                <?php for ($i=0;$i<6;$i++){ ?>
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
    <div class="house-forent">
        <div class="container">
            <div class="text-center">
                <h3>Nhà cho thuê tại khu đô thị thủ thiêm</h3>
            </div><br>
            <div class="row">
                <!-- item -->
                <?php for ($i=0;$i<6;$i++){ ?>
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