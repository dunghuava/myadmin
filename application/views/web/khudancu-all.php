<section class="page-khudancu-detail font18">
    <div class="banner" style="background:url(<?=resizeImg('kdc_bg.jpg',1350,400,0)?>)">
        <div class="abs-content container">
            <div class="col-md-12 pd0">
                <p>Tổng hợp các khu dân cư, khu đô thị đáng sống hiện nay</p>
                <h3 class="title">Danh sách khu dân cư nổi bật</h3>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <?php 
                foreach ($arr_kdc as $kdc){ 
                $info_province = $this->Province_M->find_row(['province_id'=>$kdc['residential_province_id']]);
                $info_district = $this->District_M->find_row(['district_id'=>$kdc['residential_district_id']]);
            ?>
                <div class="col-md-4 col-xs-6">
                        <div class="item-khudancu-ll">
                            <a title="<?=$kdc['residential_title']?>" href="<?=base_url('khu-dan-cu/'.$kdc['residential_alias'].'-'.$kdc['residential_id'])?>">
                                <div class="img-cover">
                                    <img src="<?=resizeImg($kdc['residential_img'],360,202,1)?>" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="title"><?=$kdc['residential_title']?></h4>
                                    <p><?=$info_district['district_name'].', '.$info_province['province_name'] ?></p>
                                </div>
                            </a>
                        </div>
                </div>
            <?php } if (empty($arr_kdc)){ ?>
                <div class="text-center" style="color:red"><h4>Dữ liệu đang được cập nhật...</h4></div>
            <?php } ?>
        </div>
    </div>
</section>