<?php 
    foreach ($arr_project as $item){
    $info_province = $this->Province_M->find_row(['province_id'=>$item['project_province_id']]);
    $info_district = $this->District_M->find_row(['district_id'=>$item['project_district_id']]);
    $info_ward = $this->Ward_M->find_row(['ward_id'=>$item['project_ward_id']]);
    $info_status = $this->Status_M->find_row(['id_status_project'=>$item['project_status']]);
?>
    <div class="duan-item-h">
    <a style="display: flex;text-decoration:none" title="<?=$item['project_title']?>" href="<?=base_url('chi-tiet-du-an/'.$item['project_alias'].'-'.$item['project_id'])?>">
            <div class="left">
                <div class="cover-img">
                    <img src="<?=resizeImg($item['project_img'],450,350,0)?>" alt="<?=$item['project_title']?>">
                </div>
            </div>
            <div class="right">
                <div class="info">
                    <h3 class="title text-overflow"><?=$item['project_title']?></h3>
                    <p class="text-overflow"><span class="fa fa-map-marker"></span> <b>P.&nbsp;<?=$info_ward['ward_name'].', '.$info_district['district_name'].', '.$info_province['province_name']?></b></p>
                    <p class="price"><?=$item['project_price']?></p>
                    <ul class="extends">
                        <li title="Diện tích"><span class="icon-acreage" style="padding-right: 5px"></span> <?=$item['project_acreage']?></li>
                        <li title="Phòng ngủ"><span class="icon-bedroom" style="padding-right: 5px"></span> <?=$item['number_bedroom']?></li>
                    </ul>
                </div>
            </div>
        </a>
    </div>
<?php
    }if (empty($arr_project)){ ?>
        <div class="text-center" style="color:red"><br><h4>Dữ liệu đang được cập nhật...</h4></div>
<?php } ?>
