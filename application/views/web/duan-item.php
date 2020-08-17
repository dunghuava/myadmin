<style type="text/css">
    .icon-bedroom:before {
        content: url('https://api.iconify.design/zmdi-airline-seat-individual-suite.svg?height=16&inline=true');
        vertical-align: -0.125em;
    }

    .icon-acreage:before {
        content: url('https://api.iconify.design/zmdi-photo-size-select-small.svg?height=16&inline=true');
        vertical-align: -0.125em;
    }
</style>
<br>
<?php 
    foreach ($arr_project as $item){ 
    $info_province = $this->Province_M->find_row(['province_id'=>$item['project_province_id']]);
    $info_district = $this->District_M->find_row(['district_id'=>$item['project_district_id']]);
    $info_ward = $this->Ward_M->find_row(['ward_id'=>$item['project_ward_id']]);
    $info_status = $this->Status_M->find_row(['id_status_project'=>$item['project_status']]);
?>
    <div class="col-md-<?=$col ? $col:'6'?>">
        <!-- mua/thue -->
        <?php if ($item['project_kind'] !=0) {?>
            <div class="item-project">
                <a title="<?=$item['project_title']?>" href="<?=base_url('chi-tiet-du-an/'.$item['project_alias'].'-'.$item['project_id'])?>">
                    <div class="project-info">
                        <img src="<?=resizeImg($item['project_img'],360,203,0)?>" alt="<?=$item['project_title']?>">
                        <div class="status font17">
                            <span><?=$info_status['status_project']?></span>
                        </div>
                    </div>
                    <div class="project-content">
                        <ul class="extends">
                            <li class="big-price"><?=$item['project_price']?></li>
                            <li title="Diện tích"><span class="icon-acreage" style="padding-right: 5px"></span> <?=$item['project_acreage']?></li>
                            <li title="Phòng ngủ"><span class="icon-bedroom" style="padding-right: 5px"></span> <?=$item['number_bedroom']?></li>
                        </ul>
                        <div class="clear"></div>
                        <p><span class="fa fa-map-marker"></span> <b><?=$info_ward['ward_name'].', '.$info_district['district_name'].', '.$info_province['province_name']?></b></p>
                        <p class="text-overflow"><?=$item['project_title']?></p>
                    </div>
                </a>
            </div>

        <?php }else{ ?>
            <div class="item-project">
                <a title="<?=$item['project_title']?>" href="<?=base_url('chi-tiet-du-an/'.$item['project_alias'].'-'.$item['project_id'])?>">
                    <div class="project-info">
                        <img src="<?=resizeImg($item['project_img'],360,203,0)?>" alt="">
                        <div class="status font17">
                            <span><?=$info_status['status_project']?></span>
                        </div>
                    </div>
                    <div class="project-content">
                        <h3 class="title text-overflow"><?=$item['project_title']?></h3>
                        <p class="address"><?=$info_ward['ward_name'].', '.$info_district['district_name'].', '.$info_province['province_name']?></b></p></p>
                        <p class="price">Giá bán: <?=$item['project_price']?></p>
                    </div>
                </a>
            </div>

        <?php } ?>

    </div>
<?php } if (empty($arr_project)){ ?>
        <div class="text-center" style="color:red"><h4>Dữ liệu đang được cập nhật...</h4></div>
<?php } ?>