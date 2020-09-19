<section class="sec-tintuc-list font18">
    <div class="container">
        <h3 class="title"><?=$cate['cate_title']?></h3>
        <div class="row">
            <?php
                foreach ($arr_post as $post){ ?>
                <div class="col-md-4">
                    <div class="item-tin-list">
                        <a title="<?=$post['post_title']?>" href="<?=base_url('bai-viet/'.$post['post_alias'].'-'.$post['post_id'])?>" style="text-decoration:none">
                            <div class="cover-img scaleimg">
                                <img title="<?=$post['post_title']?>" alt="<?=$post['post_title']?>" src="<?=resizeImg($post['post_img'],360,240,0)?>" alt="">
                            </div>
                            <div class="content">
                                <h3 style="font-weight: bold;font-size: 18px;" class="title text-overflow"><?=$post['post_title']?></h3>
                                <p><span class="fa fa-calendar">&nbsp;</span><?=date('d/m/Y',strtotime($post['created_at']))?></p>
                                <p class="text-overflow"><?=$post['post_introduce']?></p>
                            </div>
                        </a>
                    </div><br>
                </div>
            <?php } if (empty($arr_post)){ ?>
                <div class="text-center" style="color:red"><h4>Dữ liệu đang được cập nhật...</h4></div>
            <?php } ?>
        </div>
    </div>
</section>