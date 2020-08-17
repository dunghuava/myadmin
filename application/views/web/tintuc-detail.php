<br>
<style>
    div img{
        max-width:100%;
    }
</style>
<section class="sec-post-detail font18">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="post-title"><?=$post['post_title']?></h3>
                <hr style="margin:5px 0px">
                <ul style="display:flex">
                    <li style="margin-right:18px"><span class="fa fa-calendar">&nbsp;</span><?=date('d/m/Y',strtotime($post['created_at']))?></li>
                    <li style="margin-right:18px"><span class="fa fa-clock">&nbsp;</span><?=date('H:i',strtotime($post['created_at']))?></li>
                    <!-- <li style="margin-right:15px"><span class="fa fa-eye"></span> 0</li> -->
                </ul>
                <?php include ('shares.php') ?>
                <div class="post-content">
                    <p>
                        <span><?=$post['post_content']?></span>
                    </p>
                    <hr>
                    <div class="text-left">
                        <p><span class="fa fa-edit"></span>&nbsp;Nguồn: <?=$post['post_author']?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-blog">
                    <div class="title-blog">
                        <span class="fa fa-bars"></span><h3>Cùng chuyên mục</h3>
                    </div>
                    <div class="blog-content">
                        <div class="blog-larger">
                            <a href="<?=base_url('bai-viet/'.$post_involve[0]['post_alias'].'-'.$post_involve[0]['post_id'])?>">
                                <img src="<?=resizeImg($post_involve[0]['post_img'],338,160,0)?>" alt="">
                                <p style="height: 43px" class="title font17"><?=$post_involve[0]['post_title']?></p>
                            </a>
                        </div>
                        <br>
                        <?php foreach ($post_involve as $key => $involve) {
                            if ($key>0) {
                        ?>
                        <div class="blog-small">
                            <a href="<?=base_url('bai-viet/'.$involve['post_alias'].'-'.$involve['post_id'])?>" style="display:inline-flex">
                                <img src="<?=resizeImg($involve['post_img'],100,65,0)?>" alt="">
                                <p class="title font16"><?=$involve['post_title']?></p>
                             </a>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>