<br>
<?php foreach ($arr_project as $item){ ?>
    <div class="col-md-4">
        <div class="item-project">
            <a title="<?=$item['project_title']?>" href="<?=base_url('du-an/'.$item['project_alias'])?>">
                <div class="project-info">
                    <img src="<?=resizeImg($item['project_img'],228,128,1)?>" alt="<?=$item['project_title']?>">
                    <div class="status">
                        <span>Đang mở bán</span>
                    </div>
                </div>
                <div class="project-content">
                    <ul class="extends">
                        <li class="big-price">9.50 Tỷ</li>
                        <li>2WC</li>
                        <li>4PN</li>
                        <li>150 m²</li>
                    </ul>
                    <div class="clear"></div>
                    <p><span class="fa fa-map-marker"></span> <b>Quận 04</b></p>
                    <p class="text-overflow"><?=$item['project_title']?></p>
                </div>
            </a>
        </div>
    </div>
<?php } if (empty($arr_project)){ ?>
        <div class="text-center" style="color:red"><h4>Dữ liệu đang được cập nhật...</h4></div>
<?php } ?>