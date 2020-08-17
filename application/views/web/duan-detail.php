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
                    <?php
                     foreach ($duan_img as $img){  ?>
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
                    <div class="boxed font18">
                        <div class="col-md-12 div-contact">
                            <div class="div-contact-img">
                                <img class="img-contact" src="https://s3.ap-southeast-1.amazonaws.com/timnha-vn/admin/1566015622789/tran-hong-thao.jpg">
                            </div>
                            <div class="col-md-8 name-contact">
                                <p class="font18" style="font-weight: bold;">Trương Công Ánh</p>
                                <p class="font17">Sale manager</p>
                            </div>

                        </div>
                        <div class="col-md-12 div-contact-tel">
                            <a style="color: white;text-decoration: none;" href="tel:0123456789"><i class="fa fa-phone" aria-hidden="true"></i> 0123456789</a>

                        </div>
                        <div class="col-md-12">
                            <p style="text-align: center;margin-top: 15px;">Hoặc</p>
                            <hr>
                        </div>



                        <form id="form-contact" action="" method="post">
                            <input type="text" class="form-control" placeholder="Họ và tên">
                            <input type="text" class="form-control" placeholder="Số điện thoại">
                            <input type="text" class="form-control" placeholder="Địa chỉ email">
                            <textarea name="" id="" rows="4" class="form-control" placeholder="Hỏi thông tin"></textarea>
                            <button class="btn btn-block btn-primary">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
</div>


