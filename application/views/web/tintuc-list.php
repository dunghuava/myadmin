<?php 
    
?>
<section class="sec-tintuc-list">
    <div class="container">
        <h3 class="title"><?=$cate['cate_title']?></h3>
        <div class="row">
            <?php foreach ($arr_post as $post){ ?>
                <div class="col-md-4">
                    <div class="item-tin-list">
                        <a title="<?=$post['post_title']?>" href="<?=base_url('bai-viet/'.$post['post_alias'].'-'.$post['post_id'])?>" style="text-decoration:none">
                            <div class="cover-img">
                                <img title="<?=$post['post_title']?>" alt="<?=$post['post_title']?>" src="<?=resizeImg($post['post_img'],360,240,0)?>" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title"><?=$post['post_title']?></h4>
                                <i><?=date('d/m/Y',strtotime($post['created_at']))?></i>
                                <p><?=substr($post['post_title'],0,100)?> [...]</p>
                            </div>
                        </a>
                    </div><br>
                </div>
            <?php } ?>
        </div>
    </div>
</section>