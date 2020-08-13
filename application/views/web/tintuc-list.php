<section class="sec-tintuc-list">
    <div class="container">
        <h3 class="title">Tin tức nổi bật</h3>
        <div class="row">
            <?php for ($i=0;$i<10;$i++){ ?>
                <div class="col-md-4">
                    <div class="item-tin-list">
                        <a href="" style="text-decoration:none">
                            <div class="cover-img">
                                <img src="<?=base_url('upload/images/sun.png')?>" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">Dự án bất động sản newland</h4>
                                <i>Tháng Tám 13, 2020</i>
                                <p>Dự án Căn hộ The Sun Avenue Novaland đang được các chủ đầu tư chú [...]</p>
                            </div>
                        </a>
                    </div><br>
                </div>
            <?php } ?>
        </div>
    </div>
</section>