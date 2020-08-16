<section class="page-cdt font18">
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
            <?php foreach ($list_investor as $key => $investor) {?>
                <div class="row">
                    <div class="col-md-3"></div>
                        <div class="item-list-cdt col-md-6">
                            <a title="<?=$investor['investor_title']?>" href="<?=base_url('chu-dau-tu/'.$investor['investor_alias'].'-'.$investor['investor_id'])?>" style="display:inline-flex">
                                <div class="cover-img">
                                    <img src="<?=resizeImg($investor['investor_img'],150,140,0)?>" alt="">
                                </div>
                                <div class="content">
                                    <h3 class="title"><?=$investor['investor_title']?></h3>
                                    <p><?=substr($investor['investor_introduce'],0,300)?> [...]</p>
                                </div>
                            </a>
                        </div>
                    <div class="col-md-3"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>