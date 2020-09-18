<?php 
    foreach ($arr_project as $item){
    $info_province = $this->Province_M->find_row(['province_id'=>$item['project_province_id']]);
    $info_district = $this->District_M->find_row(['district_id'=>$item['project_district_id']]);
    $info_ward = $this->Ward_M->find_row(['ward_id'=>$item['project_ward_id']]);
    $info_status = $this->Status_M->find_row(['id_status_project'=>$item['project_status']]);
?>
    <div data-lat="<?=$item['project_lat']?>" data-lng="<?=$item['project_lng']?>" title="<?=$item['project_title']?>" class="duan-item-h cursor">
            <div class="row_row" style="width:100%;margin:auto;display:flex">
                <div class="left pdr0">
                    <div class="cover-img">
                        <a style="text-decoration:none" title="<?=$item['project_title']?>" href="<?=base_url('chi-tiet-du-an/'.$item['project_alias'].'-'.$item['project_id'])?>">
                            <img src="<?=resizeImg($item['project_img'],300,180,0)?>" alt="<?=$item['project_title']?>" style="width: 300px;height: 180px;">
                        </a>
                    </div>
                </div>
                <div class="right" style="width:100%">
                    <div class="info">
                        <div onclick="location.href='<?=base_url('chi-tiet-du-an/'.$item['project_alias'].'-'.$item['project_id'])?>'">
                        <h3 class="title text-overflow_">
                            <a style="text-decoration:none" title="<?=$item['project_title']?>" href="<?=base_url('chi-tiet-du-an/'.$item['project_alias'].'-'.$item['project_id'])?>">
                                <?=$item['project_title']?>
                            </a>
                        </h3>
                        <p class="text-overflow__"><span class="fa fa-map-marker"></span> <b><?=$item['project_address']?></b></p>
                        <p style="display:inline-block;color:red" class="price">Giá bán:&nbsp;<?=$item['project_price']?></p>
                        <?php if ($item['project_price_lease']>0){ ?>
                            <p style="display:inline-block;color:red" class="price right price-red">Giá thuê: <?=$item['project_price_lease']?></p>
                        <?php } ?>
                        <ul class="extends">
                        <?php if ($item['project_kind'] == 0) {?>
                            <li title="Diện tích"><span class="icon-acreage" style="padding-right: 5px"></span> <?=$item['project_acreage']?></li>
                            <?php
                                if ($item['number_floors']>0){
                            ?>
                                <li title="Số tầng"><span  class="fa fa-building" style="padding-right: 5px;padding-top: 2px"></span> <?=$item['number_floors']?></li>
                            <?php } ?>

                            <?php
                                if ($item['number_units']>0){
                            ?>
                                <li title="Số căn"><span class="fa fa-clone" style="padding-right: 5px;padding-top: 2px"></span> <?=$item['number_units']?></li>
                            <?php } ?>

                            <?php
                                if ($item['number_blocks']>0){
                            ?>
                                <li title="Số block"><span class="fa fa-cubes" style="padding-right: 5px;padding-top: 2px"></span> <?=$item['number_blocks']?></li>
                            <?php } ?>

                        <?php }else{ ?>

                                <li title="Diện tích"><span class="icon-acreage" style="padding-right: 5px"></span> <?=$item['project_acreage']?></li>
                            <?php
                                if ($item['number_bedroom']>0){
                            ?>
                                <li title="Phòng ngủ"><span  class="fa fa-bed" style="padding-right: 5px;padding-top: 2px"></span> <?=$item['number_bedroom']?></li>
                            <?php } ?>

                            <?php
                                if ($item['number_tolet']>0){
                            ?>
                                <li title="Phòng tắm"><span class="fa fa-bath" style="padding-right: 5px;padding-top: 2px"></span> <?=$item['number_tolet']?></li>
                            <?php } ?>

                            <?php
                                if (!empty($item['project_direction'])){
                            ?>
                                <li title="Hướng"><span class="fa fa-compass" style="padding-right: 5px;padding-top: 2px"></span> <?=$item['project_direction']?></li>
                            <?php } ?>

                        <?php } ?>

                            <li style="display: none"></li>


                        </ul>
                        </div>

                        <ul class="extends">
                            <li style="background: #f3f4f7;border: 1px solid #f3f4f7;"><button href="#" data-modal="#form_contact_modal" data-id ="<?=$item['project_title']?>" class="btn_modal_contact btn btn-block btn-default" style="background: #0C714B;border: 1px solid #88ad6a;color: white;"><span style="margin-top:2px" class="fa fa-phone"></span>&nbsp;Liên hệ</button></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
<?php
    }if (empty($arr_project)){ ?>
        <div class="text-center" style="color:red"><br><h4>Dữ liệu đang được cập nhật...</h4></div>
<?php } ?>
