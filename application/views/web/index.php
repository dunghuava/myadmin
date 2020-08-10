<section class="sec-slider relative">
    <?php include ('slider.php') ?>
    <div id="form-absolute" class="absolute hidden-xs">
        <form class="form-group" action="" method="get">
            <div class="containers">
                <div class="form-inline">
                    <button class="btn_choose_type clicked" type="button">Dự án</button>
                    <button class="btn_choose_type" type="button">Cho thuê</button>
                    <button class="btn_choose_type" type="button">Mua bán</button>
                </div>
                <div class="form-inline" style="display: flex;">
                    <input type="search" class="form-control" name="" id="" placeholder="Nhập địa điểm hoặc từ khóa (Ví dụ : Đảo kim cương)">
                    <button class="btn_search" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="sec-project">
    <div class="container">
        <h3 class="main-title">Dự án nổi bật</h3>
        <div class="row">
            <?php for ($i=0;$i<6;$i++){ ?>
                <div class="col-md-4 col-xs-12">
                    <div class="item-project">
                        <a href="">
                            <div class="project-info">
                                <img src="<?=base_url('upload/images/image.jpg')?>" alt="">
                                <div class="status">
                                    <span>Đang mở bán</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="title">Eco green Saigon</h3>
                                <p class="address">12/07 Trần Não-Q2-HCMC</p>
                                <p class="price">Giá bán: 3.65 tỷ</p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12">
                <p><a href="">Xem thêm dự án <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<section class="sec-project">
    <div class="container">
        <h3 class="main-title">Nhà bán</h3>
        <div class="row">
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
            <div class="col-md-12">
                <p><a href="">Xem thêm nhà đất <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<section class="sec-project">
    <div class="container">
        <h3 class="main-title">Cho thuê</h3>
        <div class="row">
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
            <div class="col-md-12">
                <p><a href="">Xem thêm nhà đất <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<section class="sec-chudautu">
    <div class="container">
        <h3 class="main-title">Chủ đầu tư nổi bật</h3>
        <p>Thông tin cơ bản và danh mục dự án của các chủ đầu tư bất động sản uy tín hiện nay</p>
        <div class="row">
            <?php for ($i=0;$i<12;$i++){ ?>
                <div class="col-md-2 col-xs-4">
                    <div class="item-chudautu">
                        <img src="<?=base_url('upload/images/cdt.jpg')?>" alt="">
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12">
                <p><br><a href="">Xem thêm chủ đầu tư <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<section class="sec-tintuc">
    <div class="container">
        <h3 class="main-title">Tin tức</h3>
        <p>Tin tức mới nhất, phân tích xu hướng thị trường, cập nhật nhanh chóng và chính xác hàng ngày</p>
        <div class="row">
            <div class="col-md-6">
                <div class="item-news-big">
                    <a href="">
                       <div class="news-body">
                            <img src="<?=base_url('upload/images/news.jpg')?>" alt="">
                            <div class="news-content">
                                <h3 class="title">Top 5 dự án căn hộ cao cấp đáng mua tại thị trường Quận 4</h3>
                                <p>10/08/2020</p>
                            </div>
                       </div>
                    </a>
                </div>
                <p><br><a href="">Xem thêm bài viết <span class="fa fa-angle-right"></span></a></p>
            </div>
            <div class="col-md-6">
                <?php for ($i=0;$i<3;$i++){ ?>
                    <div class="item-news-small">
                        <a href="" style="display:inline-flex">
                            <div class="news-img">
                                <img src="<?=base_url('upload/images/news.jpg')?>" alt="">
                            </div>
                            <div class="news-title">
                                <h3 class="title">Chi tiết 7 tuyến đường nối Long An – TP.HCM được mở rộng, khởi công trong 2021</h3>
                                <p class="datetime">10/08/2020</p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="sec-blog">
    <div class="container">
        <h3 class="main-title">Thông tin - Blog</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="item-blog">
                    <div class="title-blog">
                        <span class="fa fa-bars"></span><h3>Tư vấn luật</h3>
                    </div>
                    <div class="blog-content">
                        <div class="blog-larger">
                            <a href="">
                                <img src="<?=base_url('upload/images/blog.jpg')?>" alt="">
                                <p class="title">Chi phí quản lý dự án hủy bỏ được tính như thế nào ?</p>
                            </a>
                        </div>
                        <?php for ($i=0;$i<3;$i++){ ?>
                         <div class="blog-small">
                             <a href="" style="display:inline-flex">
                                <img src="<?=base_url('upload/images/blog.jpg')?>" alt="">
                                <p class="title">Chi phí quản lý dự án hủy bỏ được tính như thế nào ?</p>
                             </a>
                         </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-blog">
                    <div class="title-blog">
                        <span class="fa fa-bars"></span><h3>Tư vấn luật</h3>
                    </div>
                    <div class="blog-content">
                        <div class="blog-larger">
                            <a href="">
                                <img src="<?=base_url('upload/images/blog.jpg')?>" alt="">
                                <p class="title">Chi phí quản lý dự án hủy bỏ được tính như thế nào ?</p>
                            </a>
                        </div>
                        <?php for ($i=0;$i<3;$i++){ ?>
                         <div class="blog-small">
                             <a href="" style="display:inline-flex">
                                <img src="<?=base_url('upload/images/blog.jpg')?>" alt="">
                                <p class="title">Chi phí quản lý dự án hủy bỏ được tính như thế nào ?</p>
                             </a>
                         </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-blog">
                    <div class="title-blog">
                        <span class="fa fa-bars"></span><h3>Tư vấn luật</h3>
                    </div>
                    <div class="blog-content">
                        <div class="blog-larger">
                            <a href="">
                                <img src="<?=base_url('upload/images/blog.jpg')?>" alt="">
                                <p class="title">Chi phí quản lý dự án hủy bỏ được tính như thế nào ?</p>
                            </a>
                        </div>
                        <?php for ($i=0;$i<3;$i++){ ?>
                         <div class="blog-small">
                             <a href="" style="display:inline-flex">
                                <img src="<?=base_url('upload/images/blog.jpg')?>" alt="">
                                <p class="title">Chi phí quản lý dự án hủy bỏ được tính như thế nào ?</p>
                             </a>
                         </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec-khudancu">
    <div class="container">
        <h3 class="main-title">Khu dân cư</h3>
        <p>Thông tin phân tích chi tiết, danh mục dự án và nhà đất đăng bán & cho thuê tại các khu vực nổi bật</p>
        <div class="row">
            <?php for ($i=0;$i<6;$i++){ ?>
                <div class="col-md-4">
                    <a href="">
                        <div class="item-khudancu">
                            <div class="cover-img">
                                <img src="<?=base_url('upload/images/kdc.jpg')?>" alt="">
                            </div>
                            <div class="content">
                                <br>
                                <h3 class="title">Khu đô thị mới thủ thiêm 2</h3>
                                <hr>
                                <p class="address">Quận 02, TP.Hồ Chí Minh</p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="col-md-12">
                <p><a href="">Xem thêm khu dân cư <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<section class="sec-khuvuc">
    <div class="container">
        <h3 class="main-title">Dự án theo khu vực</h3>
        <div class="row">
            <div class="slick-khuvuc">
                <?php for ($i=0;$i<6;$i++){ ?>
                    <div class="col-md-3">
                        <div class="item-khuvuc">
                            <a href="">
                                <img src="<?=base_url('upload/images/kdc.jpg')?>" alt="">
                               <div class="content">
                                    <p class="title">Quận 01</p>
                               </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>