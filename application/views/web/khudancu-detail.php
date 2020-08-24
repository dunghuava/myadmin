<style type="text/css">
    .icon-bedroom:before {
    content: url('https://api.iconify.design/zmdi-airline-seat-individual-suite.svg?height=16&inline=true');
vertical-align: -0.125em;
}

.icon-acreage:before {
    content: url('https://api.iconify.design/zmdi-photo-size-select-small.svg?height=16&inline=true');
vertical-align: -0.125em;
}

.overview-toolbar ul li a {
    font-size: 18px!important;
}
.modal a.close-modal {
        top: 0.5px!important;
        right: 1.5px!important;
    }
</style>
<section class="page-khudancu-detail font18">
    <div class="banner" style="background:url(<?=resizeImg($kdc['residential_img'],1350,400,0)?>)">
        <div class="abs-content container">
            <div class="col-md-12 pd0">
                <?php 
                    $info_province = $this->Province_M->find_row(['province_id'=>$kdc['residential_province_id']]);
                    $info_district = $this->District_M->find_row(['district_id'=>$kdc['residential_district_id']]);
                ?>
                <p>Khu dân cư  <?=$info_district['district_name'].', '.$info_province['province_name'] ?></p>
                <h3 class="title"><?=$kdc['residential_title']?></h3>
            </div>
        </div>
    </div>
    <!-- overview-toolbar -->
    <div id="toolbar" class="overview-toolbar hidden-xs" style="border-bottom: 1px solid #dcdcdc;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul>
                        <li style="padding-left:0px"><a href="<?=fullAddress().'#p_overview'?>">Tổng quan</a></li>
                        <li><a href="<?=fullAddress().'#p_selling'?>">Nhà đất bán</a></li>
                        <li><a href="<?=fullAddress().'#p_forent'?>">Nhà đất thuê</a></li>
                        <li><a href="<?=fullAddress().'#p_location'?>">Vị trí</a></li>
                        <li><a href="<?=fullAddress().'#p_detail'?>">Chi tiết</a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-right">
                    <a href="tel:0984455285" class="btn"><span class="fa fa-phone"></span>&nbsp;0984455285</a>
                    <a type="button" href="#" data-modal="#form_contact_modal" data-id ="<?=$kdc['residential_title']?>" class="btn_modal_contact btn red"><span class="fa fa-info"></span>&nbsp;Yêu cầu thông tin</a>
                </div>
            </div>
        </div>
    </div>
    <!-- overview-toolbar -->
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="p_overview">
                <h3>Mô tả</h3>
                <p>
                   <?=$kdc['residential_introduce']?>
                </p>
                <h3>Tags</h3>
                <?php 
                    $tags = explode(',',$kdc['residential_tag']);
                    foreach ($tags as $tag){
                ?>
                <span style="background: #dedede;" class="btn btn-default"><?=$tag?></span>
                <?php 
                    } 
                ?>
            </div>
            <div class="col-md-4">
                <?php if (!empty($kdc['residential_habitat'])) {?>
                    <h3>Môi trường sống</h3>
                    <p><?=$kdc['residential_habitat']?></p>
                <?php } ?>

                <?php if (!empty($kdc['residential_community'])) {?>
                    <h3>Cộng đồng dân cư</h3>
                    <p><?=$kdc['residential_community']?></p>
                <?php } ?>

                <?php if (!empty($kdc['residential_utility'])) {?>
                    <h3>Tiện ích nổi bật</h3>
                    <p><?=$kdc['residential_utility']?></p>
                <?php } ?>

                <?php if (!empty($kdc['residential_traffic'])) {?>
                    <h3>Hiện trạng giao thông</h3>
                    <p><?=$kdc['residential_traffic']?></p>
                <?php } ?>
                
            </div>
        </div>
    </div><br>
    <div class="house-selling" id="p_selling">
        <div class="container">
            <div class="text-center">
                <h3>Nhà bán tại <?=$kdc['residential_title']?></h3>
            </div><br>
            <div class="row">
                <!-- item -->

                <?php
                    $arr_project = $list_mua;
                    $col = 4; include ('duan-item.php');
                ?>
                <!-- item -->
            </div>
        </div>
    </div>
    <div class="house-forent" id="p_forent">
        <div class="container">
            <div class="text-center">
                <h3>Nhà cho thuê tại <?=$kdc['residential_title']?></h3>
            </div><br>
            <div class="row">
                <!-- item -->
                <?php
                    $arr_project = $list_thue;
                    $col = 4; include ('duan-item.php');
                ?>
                <!-- item -->
            </div>
        </div>
    </div>

    <!-- location-are -->
    <style>
        div img{
            max-width:100%;
        }
    </style>
    <div class="div-location" id="p_location">
        <div class="container">
                <br>
                <div class="text-center"><h3>Vị trí <?=$kdc['residential_title']?> trên bản đồ</h3></div>
                <div class="row">
                    <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div id="googleMap" class="map-area" style="width:100%;height:360px;">
                               <script>
                                    var lat = <?=$kdc['residential_lat']!='' ? $kdc['residential_lat']:0?>;
                                    var lng  = <?=$kdc['residential_lng']!='' ? $kdc['residential_lng']:0?>;
                                    function initMap() {
                                        var myLatLng = {lat: lat, lng: lng};

                                        var map = new google.maps.Map(document.getElementById('googleMap'), {
                                            zoom: 15,
                                            center: myLatLng,
                                            icon:false,
                                        });
                                        var contentString='<h4><?=$kdc['residential_title']?></h4><p><?=substr($kdc[0]['residential_introduce'],0,150)?>...</p>';
                                        const infowindow = new google.maps.InfoWindow({
                                            content: contentString
                                        });
                                        var marker = new google.maps.Marker({
                                            position: myLatLng,
                                            map: map,
                                            icon:false,
                                            title: '<?=$kdc['residential_title']?>',
                                        });
                                        infowindow.open(map, marker);
                                        marker.addListener("click", () => {
                                            infowindow.open(map, marker);
                                        });
                                    }
                                </script>
                            </div>
                            <br><br>
                        </div>
                    <div class="col-md-1"></div>
                </div>
        </div>
    </div>
    <!-- location are -->
    <div class="content-kdc" id="p_detail">
        <div class="container">
            <br>
            <div class="text-center"><h3>Thông tin chi tiết <?=$kdc['residential_title']?></h3></div>
            <br>
            <p><?=$kdc['residential_content']?></p>
        </div>
    </div>

    
</section>

<section class="modal contact-bg-block font18" id="form_contact_modal">

    <div class="col-md-12 div-contact">
        <div class="div-contact-img">
            <img class="img-contact" src="<?=resizeImg('sale_manager.jpg',70,70,0)?>">
        </div>
        <div class="col-md-8 name-contact">
            <p class="font18" style="font-weight: bold;">Trương Công Ánh</p>
            <p class="font17">Sale manager</p>
        </div>

    </div>
    <div class="col-md-12 div-contact-tel">
        <a style="color: white;text-decoration: none;" href="tel:0984455285"><i class="fa fa-phone" aria-hidden="true"></i> 0984455285</a>

    </div>
    <div class="col-md-12">
        <p style="text-align: center;margin-top: 15px;">Hoặc</p>
        <hr>
    </div>


    <style>
        #form-contact input.form-control{
            height:45px;
            font-size: 17px;
        }
    </style>
    <form id="form-contact" action="" method="post">
        <h4>Liên hệ tư vấn</h4>
        <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="Họ và tên">
        <input type="text" name="contact_phone" id="contact_phone" class="form-control" placeholder="Số điện thoại">
        <input type="text" name="contact_email" id="contact_email" class="form-control" placeholder="Địa chỉ email">
        <input type="hidden" name="contact_title" id="contact_title" class="form-control" value="">
        <input type="text" name="contact_title_show" id="contact_title_show" class="form-control text-overflow" value="" disabled style="background: gainsboro;">
        <textarea name="contact_info" id="contact_info" rows="4" class="form-control font17" placeholder="Hỏi thông tin"></textarea>
        <button type="submit" class="btn btn-block font17" style="color: white">Gửi</button>
    </form>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqAHaMV9ZVcSX992nMQOgZ_Vy80GUZ_8I&callback=initMap&libraries=drawing,places"></script>
</script>
<script>
window.onscroll = function() {addSticky()};

    var navbar = document.getElementById("toolbar");
    var sticky = (navbar.offsetTop);
    function addSticky() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    $('.btn_modal_contact').on('click', function() {
        var title = $(this).data('id');

        $('#contact_title').val(title);
        $('#contact_title_show').val(title);

        $('#form_contact_modal').css("display","block");
        $($(this).data('modal')).modal({
            fadeDuration: 250
        });
        return false;
    });

    $('#form-contact').submit(function(event){  
        event.preventDefault();  
        $.ajax({  
            url:"<?=base_url()?>web/addContact",  
            method:"POST",  
            data:$('#form-contact').serialize(),  
            success: function (data) {
                const toast = swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 2500
                });

                toast({
                    type: 'success',
                    title: 'Thông tin đã được gửi',
                });

                $.modal.close();
            }
        });  
    });
</script>