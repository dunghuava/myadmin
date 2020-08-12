<section class="page-cdt">
    <div class="banner" style="background:url(<?=base_url('upload/images/bg-developer.jpg')?>)">
        <div class="text-center">
            <h2>Danh sách chủ đầu tư</h2>
            <p>Thông tin tất cả chủ đầu tư dự án bất động sản uy tín và được xếp hạng cao hiện tại</p>
            <br>
            <form class="form-inline" action="" method="get">
                <input placeholder="Nhập tên chủ đầu tư" type="text" class="form-control">
                <button class="btn btn-default"><span class="fa fa-search"></span></button>
            </form>
        </div>
    </div>
    <div class="list-chudautu">
        <br>
        <div class="container">
            <?php for ($i=0;$i<8;$i++){ ?>
                <div class="row">
                    <div class="col-md-3"></div>
                        <div class="item-list-cdt col-md-6">
                            <a href="" style="display:inline-flex">
                                <div class="cover-img">
                                    <img src="<?=base_url('upload/images/cdt_item.jpg')?>" alt="">
                                </div>
                                <div class="content">
                                    <h3 class="title">Sunshine</h3>
                                    <p>Sunshine Group có tên đầy đủ là Công ty Cổ phần Tập đoàn Sunshine, có trụ sở chính đặt tại tầng 43 tòa Keangnam Landmark 72, đường Phạm Hùng, quận Nam Từ Liêm, Hà Nội. Chủ đầu tư Sunshine Group được...</p>
                                </div>
                            </a>
                        </div>
                    <div class="col-md-3"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>