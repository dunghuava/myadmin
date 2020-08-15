<br>
<section class="sec-post-detail">
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
                <style>
                    .post-content *{
                        font-size:18px; 
                    }
                </style>
                <div class="post-content">
                    <p>
                        <span><?=$post['post_content']?></span>
                    </p>
                    <hr>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-blog">
                    <div class="title-blog">
                        <span class="fa fa-bars"></span><h3>Cùng chuyên mục</h3>
                    </div>
                    <div class="blog-content">
                        <div class="blog-larger">
                            <a href="">
                                <img src="<?=base_url('upload/images/blog.jpg')?>" alt="">
                                <p class="title">Chi phí quản lý dự án hủy bỏ được tính như thế nào ?</p>
                            </a>
                        </div>
                        <?php for ($i=0;$i<3;$i++){ ?>
                        <div class="blog-small">
                            <a href="" style="display:inline-flex">
                                <img src="<?=base_url('upload/images/blog.jpg')?>" alt="">
                                <p class="title">Chi phí quản lý dự án hủy bỏ được tính như thế nào ?</p>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>