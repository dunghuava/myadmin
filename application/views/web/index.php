<section class="sec-slider relative font18">
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
                    <input type="search" class="form-control font18" name="" id="" placeholder="Nhập địa điểm hoặc từ khóa (Ví dụ : Đảo kim cương)">
                    <button class="btn_search" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="sec-project font18">
    <div class="container">
        <h3 class="main-title">Dự án nổi bật</h3>
        <div class="row">
            <?php foreach ($list_du_an as $key => $du_an) {
                $info_province_duan = $this->Province_M->find_row(['province_id'=>$du_an['project_province_id']]);
                $info_district_duan = $this->District_M->find_row(['district_id'=>$du_an['project_district_id']]);
                $info_ward_duan = $this->Ward_M->find_row(['ward_id'=>$du_an['project_ward_id']]);
                $info_status_duan = $this->Status_M->find_row(['id_status_project'=>$du_an['project_status']]);
            ?>
                <div class="col-md-4 col-xs-12">
                    <div class="item-project">
                        <a title="<?=$du_an['project_title']?>" href="<?=base_url('chi-tiet-du-an/'.$du_an['project_alias'].'-'.$du_an['project_id'])?>">
                            <div class="project-info">
                                <img src="<?=resizeImg($du_an['project_img'],360,203,0)?>" alt="">
                                <div class="status font17">
                                    <span><?=$info_status_duan['status_project']?></span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="title text-overflow"><?=$du_an['project_title']?></h3>
                                <p class="address"><?=$info_ward_duan['ward_name'].', '.$info_district_duan['district_name'].', '.$info_province_duan['province_name']?></b></p></p>
                                <p class="price">Giá bán: <?=$du_an['project_price']?></p>
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
<section class="sec-khuvuc font18">
    <div class="container">
        <h3 class="main-title">Dự án theo khu vực</h3>
        <div class="row">
            <div class="slick-khuvuc">

                <?php foreach ($duan_region as $key => $duan_re) {
                    $info_district_region = $this->District_M->find_row(['district_id'=>$duan_re['region_id_district']]);
                ?>
                    <div class="col-md-3">
                        <div class="item-khuvuc">
                            <a href="">
                                <img src="<?=base_url('upload/images/'.$duan_re['region_img'].'')?>" alt="">
                               <div class="content">
                                    <p class="title"><?php echo $info_district_region['district_name'] ?></p>
                               </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="sec-project font18">
    <div class="container">
        <h3 class="main-title">Nhà bán nổi bậc</h3>
        <div class="row">

            <?php
                $arr_project = $list_mua;
                $col = 4; include ('duan-item.php');
             ?>
            <div class="col-md-12">
                <p><a href="">Xem thêm nhà đất <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>

<section class="sec-khuvuc font18">
    <div class="container">
        <h3 class="main-title">Nhà bán theo khu vực</h3>
        <div class="row">
            <div class="slick-khuvuc">
                <?php foreach ($mua_region as $key => $mua_re) {
                    $info_district_region = $this->District_M->find_row(['district_id'=>$mua_re['region_id_district']]);
                ?>
                    <div class="col-md-3">
                        <div class="item-khuvuc">
                            <a href="">
                                <img src="<?=base_url('upload/images/'.$mua_re['region_img'].'')?>" alt="">
                               <div class="content">
                                    <p class="title"><?php echo $info_district_region['district_name'] ?></p>
                               </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="sec-project font18">
    <div class="container">
        <h3 class="main-title">Cho thuê nổi bậc</h3>
        <div class="row">
            <?php
                $arr_project = $list_thue;
                $col = 4; include ('duan-item.php');
             ?>
            <div class="col-md-12">
                <p><a href="">Xem thêm nhà đất <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>

<section class="sec-khuvuc font18">
    <div class="container">
        <h3 class="main-title">Cho thuê theo khu vực</h3>
        <div class="row">
            <div class="slick-khuvuc">
                <?php foreach ($thue_region as $key => $thue_re) {
                    $info_district_region = $this->District_M->find_row(['district_id'=>$thue_re['region_id_district']]);
                ?>
                    <div class="col-md-3">
                        <div class="item-khuvuc">
                            <a href="">
                                <img src="<?=base_url('upload/images/'.$thue_re['region_img'].'')?>" alt="">
                               <div class="content">
                                    <p class="title"><?php echo $info_district_region['district_name'] ?></p>
                               </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="sec-chudautu font18">
    <div class="container">
        <h3 class="main-title">Chủ đầu tư nổi bật</h3>
        <p>Thông tin cơ bản và danh mục dự án của các chủ đầu tư bất động sản uy tín hiện nay</p>
        <div class="row">
            <?php foreach ($list_investor as $key => $investor) {?>
                <div class="col-md-2 col-xs-6">
                    <div class="item-chudautu">
                        <a title="<?=$investor['investor_title']?>" href="<?=base_url('chu-dau-tu/'.$investor['investor_alias'].'-'.$investor['investor_id'])?>">
                            <img src="<?=resizeImg($investor['investor_img'],150,90,2)?>" alt="<?=$investor['investor_title']?>">
                        </a>
                        
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12">
                <p><br><a href="<?=base_url('chu-dau-tu')?>">Xem thêm chủ đầu tư <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<section class="sec-tintuc font18">
    <div class="container">
        <h3 class="main-title">Tin tức</h3>
        <p>Tin tức mới nhất, phân tích xu hướng thị trường, cập nhật nhanh chóng và chính xác hàng ngày</p>
        <div class="row">
            <div class="col-md-6">
                <div class="item-news-big">
                    <a href="<?=base_url('bai-viet/'.$list_post[0]['post_alias'].'-'.$list_post[0]['post_id'])?>">
                       <div class="news-body">
                            <img src="<?=resizeImg($list_post[0]['post_img'],555,319,0)?>" alt="">
                            <div class="news-content">
                                <h3 class="title"><?=$list_post[0]['post_title']?></h3>
                                <p><?=date('d-m-Y',$list_post[0]['post_date_time'])?></p>
                            </div>
                       </div>
                    </a>
                </div>
                <p><br><a href="">Xem thêm bài viết <span class="fa fa-angle-right"></span></a></p>
            </div>
            <div class="col-md-6">
                <?php foreach ($list_post as $key => $post) {
                    if ($key>0) {
                ?>
                    <div class="item-news-small">
                        <a href="<?=base_url('bai-viet/'.$post['post_alias'].'-'.$post['post_id'])?>" style="display:inline-flex">
                            <div class="news-img">
                                <img src="<?=resizeImg($post['post_img'],145,96,0)?>" alt="">
                            </div>
                            <div class="news-title">
                                <h3 class="title font16"><?=$post['post_title']?></h3>
                                <p class="datetime font16"><?=date('d-m-Y',$post['post_date_time'])?></p>
                            </div>
                        </a>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </div>
</section>
<section class="sec-blog font18">
    <div class="container">
        <h3 class="main-title">Thông tin - Blog</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="item-blog">
                    <div class="title-blog">
                        <span class="fa fa-bars"></span><h3>Hướng dẫn mua/bán nhà</h3>
                    </div>
                    <div class="blog-content">
                        <div class="blog-larger">
                            <a href="<?=base_url('bai-viet/'.$tin_mua_ban[0]['post_alias'].'-'.$tin_mua_ban[0]['post_id'])?>">
                                <img src="<?=resizeImg($tin_mua_ban[0]['post_img'],338,160,0)?>" alt="">
                                <p style="height: 43px" class="title font17"><?=$tin_mua_ban[0]['post_title']?></p>
                            </a>
                        </div><br>
                        <?php foreach ($tin_mua_ban as $key => $tmb) {
                            if ($key>0 && $key<5) {
                        ?>
                         <div class="blog-small">
                             <a href="<?=base_url('bai-viet/'.$tmb['post_alias'].'-'.$tmb['post_id'])?>" style="display:inline-flex">
                                <img src="<?=resizeImg($tmb['post_img'],100,65,0)?>" alt="">
                                <p class="title font16"><?=$tmb['post_title']?></p>
                             </a>
                         </div>
                        <?php } } ?>
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
                            <a href="<?=base_url('bai-viet/'.$tuvanluat[0]['post_alias'].'-'.$tuvanluat[0]['post_id'])?>">
                                <img src="<?=resizeImg($tuvanluat[0]['post_img'],338,160,0)?>" alt="">
                                <p style="height: 43px" class="title font17"><?=$tuvanluat[0]['post_title']?></p>
                            </a>
                        </div><br>
                        <?php foreach ($tuvanluat as $key => $tvl) {
                            if ($key > 0) {
                        ?>
                         <div class="blog-small">
                             <a href="<?=base_url('bai-viet/'.$tvl['post_alias'].'-'.$tvl['post_id'])?>" style="display:inline-flex">
                                <img src="<?=resizeImg($tvl['post_img'],100,65,0)?>" alt="">
                                <p class="title font16"><?=$tvl['post_title']?></p>
                             </a>
                         </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-blog">
                    <div class="title-blog">
                        <span class="fa fa-bars"></span><h3>Blog</h3>
                    </div>
                    <div class="blog-content">
                        <div class="blog-larger">
                            <a href="<?=base_url('bai-viet/'.$blog[0]['post_alias'].'-'.$blog[0]['post_id'])?>">
                                <img src="<?=resizeImg($blog[0]['post_img'],338,160,0)?>" alt="">
                                <p style="height: 43px" class="title font17"><?=$blog[0]['post_title']?></p>
                            </a>
                        </div><br>
                        <?php foreach ($blog as $key => $bg) {
                            if ($key > 0) {
                        ?>
                         <div class="blog-small">
                             <a href="<?=base_url('bai-viet/'.$bg['post_alias'].'-'.$bg['post_id'])?>" style="display:inline-flex">
                                <img src="<?=resizeImg($bg['post_img'],100,65,0)?>" alt="">
                                <p class="title font16"><?=$bg['post_title']?></p>
                             </a>
                         </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec-khudancu font18">
    <div class="container">
        <h3 class="main-title">Khu dân cư</h3>
        <p>Thông tin phân tích chi tiết, danh mục dự án và nhà đất đăng bán & cho thuê tại các khu vực nổi bật</p>
        <div class="row">
            <?php foreach ($list_residential as $key => $residential) {
                $info_province = $this->Province_M->find_row(['province_id'=>$residential['residential_province_id']]);
                $info_district = $this->District_M->find_row(['district_id'=>$residential['residential_district_id']]);
            ?>
                <div class="col-md-4">
                    <a href="<?=base_url('khu-dan-cu/'.$residential['residential_alias'].'-'.$residential['residential_id']) ?>" title="<?php echo $residential['residential_title'] ?>">
                        <div class="item-khudancu">
                            <div class="cover-img">
                                <img src="<?=resizeImg($residential['residential_img'],420,220,0)?>" alt="">
                            </div>
                            <div class="content">
                                <br>
                                <h3 class="title"><?php echo $residential['residential_title'] ?></h3>
                                <hr>
                                <p class="address"><?php echo $info_district['district_name'].', '.$info_province['province_name'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="col-md-12">
                <p><a href="<?=base_url('khu-dan-cu')?>">Xem thêm khu dân cư <span class="fa fa-angle-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
