<br>
<style>
.developer-padding-tb {
    padding-top: 60px;
    padding-bottom: 60px;
}
.contact-inner {
    width: 100%;
    max-width: 750px;
    margin: auto;
}
.text-white {
    color: #fff!important;
}
.text-center {
    text-align: center;
}
.btn-red {
    background: #c52728;
    color: #fff;
}
.btn-primary {
    display: inline-block;
    width: 100%;
    height: 50px;
    line-height: 50px;
    margin: 0 auto;
    cursor: pointer;
    font-weight: 600;
    font-size: 18px;
    max-width: fit-content;
    min-width: 200px;
    text-align: center;
    border-radius: 2px;
    padding: 0 20px;
}
.contact-inner>p {
    font-size: 18px;
    line-height: 1.67;
    margin-bottom: 30px;
}
.btn-red {
    background: #c52728;
    color: #fff;
}
.btn-primary {
    display: inline-block;
    width: 100%;
    height: 50px;
    line-height: 50px;
    margin: 0;
    cursor: pointer;
    font-weight: 600;
    font-size: 18px;
    max-width: fit-content;
    min-width: 200px;
    text-align: center;
    border-radius: 2px;
    padding: 0 20px;
}
.btn-red {
    background: #c72528!important;
}
</style>
<section class="sec-chudautu">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div style="border: 1px solid #dcdcdc;padding:10px">
                    <img src="<?=resizeImg($cdt['investor_img'],260,243,0)?>" alt="<?=$cdt['investor_title']?>">
                </div>
            </div>
            <div class="col-md-9">
                <h3><?=$cdt['investor_title']?></h3>
                <p>
                    <?=$cdt['investor_name']?>
                </p>
                <br>
                <p>Thành lập: <?=$cdt['investor_establish']?></p>
                <p>Địa chỉ: <?=$cdt['investor_address']?></p>
                <p>Website: <?=$cdt['investor_website']?></p>
                <button class="btn btn-primary">Liên hệ tư vấn</button>
            </div>
        </div>
    </div>
</section><br><br>
<section style="background:#F4F5F9">
    <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <h3>Giới thiệu</h3>
                    <p>
                     <?=$cdt['investor_introduce']?>
                    </p>
                </div>
            </div>
        </div>
</section>
<section>
    <div class="container">
        <h3>Các dự án của <?=$cdt['investor_title']?></h3>
        <div class="row">
            <?php foreach ($arr_project as $key => $du_an) {
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
                                <div class="status">
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
            <?php } if (empty($arr_project)){ ?>
                <div class="text-center" style="color:red"><h4>Dữ liệu đang được cập nhật...</h4></div>
                <br>
            <?php } ?>
        </div>
    </div>
</section>
<section class="contact-bg-block" style=" background: url(https://static.rever.vn/images/bg-contact-block.jpg) 50% 50% / cover no-repeat;">
        <div class="width1140 developer-padding-tb">
            <div class="contact-inner text-white text-center">
                <p>Nhận tin tức mới nhất, tình hình giao dịch, biến động giá cả của các dự án thuộc Khang Điền,
                    gặp ngay chuyên viên tư vấn Gianha.vn để giải đáp mọi thắc mắc.</p>
                <div class="contact-btn">
                    <a href="#" class="btn-primary btn-red" data-action="contact-agent">Liên hệ tư vấn</a>
                </div>
            </div>
        </div>
</section>
<section>
    <div class="container">
        <h3>Chủ đầu tư nổi bật</h3>
        <div class="row">
            <div class="chudautu-slider">
            <?php foreach ($list_investor as $key => $investor) {?>
                <div class="col-md-2">
                    <div class="item-chudautu">
                        <a title="<?=$investor['investor_title']?>" href="<?=base_url('chu-dau-tu/'.$investor['investor_alias'].'-'.$investor['investor_id'])?>">
                            <img src="<?=resizeImg($investor['investor_img'],150,90,2)?>" alt="<?=$investor['investor_title']?>">
                        </a>
                        
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>