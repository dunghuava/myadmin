<?php 
    $duan_img = $this->Project_Images_M->all(['project_id'=>$duan['project_id']]);
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
                    <?php foreach ($duan_img as $img){  ?>
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
                                <p>Tổng quan</p>
                            </div>
                            <div class="content-collapse">
                                ....
                            </div>
                        </div>
                        <div class="item-collapse">
                            <div class="head-collapse">
                                <p>Title</p>
                            </div>
                            <div class="content-collapse">
                                Trạng thái: Đang bán
                                Danh mục: Căn hộ
                                Nhà đầu tư: MapleTree
                                Số toà nhà: 5
                                Số tầng: 22
                                Số căn hộ: 799
                            </div>
                        </div>
                        <div class="item-collapse">
                            <div class="head-collapse">
                                <p>Title</p>
                            </div>
                            <div class="content-collapse">
                                Trạng thái: Đang bán
                                Danh mục: Căn hộ
                                Nhà đầu tư: MapleTree
                                Số toà nhà: 5
                                Số tầng: 22
                                Số căn hộ: 799
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="boxed">
                        <h4>Liên hệ đại lý ủy quyền</h4>
                            <p><strong>Kathy V&otilde;</strong></p>
                            <p>0707777117</p>
                            <p>trucvo@liveinsaigon.com</p>
                    </div>
                    <div class="boxed">
                        <form id="form-contact" action="" method="post">
                            <h4>Liên hệ tư vấn</h4>
                            <input type="text" class="form-control" placeholder="Họ và tên">
                            <input type="text" class="form-control" placeholder="Số điện thoại">
                            <input type="text" class="form-control" placeholder="Địa chỉ email">
                            <textarea name="" id="" rows="4" class="form-control"></textarea>
                            <button class="btn btn-block btn-primary">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
</div>