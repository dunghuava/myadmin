<style>
    html,body{
        background:#F3F4F7;
    }
    #fullwidth{
        width:99%;
        margin:5px auto;
    }
    .list_type li{
        display:inline-block;
        text-transform:uppercase;
        padding:0px 10px;
    }
    .bg-white{
        background:#fff;
    }
    #root_project::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #65BA69;
    }
    #root_project::-webkit-scrollbar
    {
        width: 0px;
        background-color: #65BA69;
    }
    #root_project::-webkit-scrollbar-thumb
    {
        background-color: #65BA69;
    }

    .modal a.close-modal {
        top: 0.5px!important;
        right: 1.5px!important;
    }
</style>
<?php 
    $loaihinh  = $this->Type_M->all();
    $khuvuc = $this->District_M->all(['province_id' => '1']);
?>
<section id="fullwidth" class="page-duan-list container">
    <div class="row font18_all">
        <div class="col-md-7">
            <input type="hidden" id="cate_id" value="<?=$cate_id?>">
            <input type="hidden" id="trang_thai">
            <input type="hidden" id="loai_hinh">
            <input type="hidden" id="phong_ngu">
            <input type="hidden" id="khu_vuc">
            <input type="hidden" id="kind">
            <ul class="list_option">
                <li class="root_modal">Trạng thái
                    <ul class="m1 list-modal">
                        <li><input type="radio" name="trang_thai" class="rdo_trangthai" value="1" id="">&nbsp;Đang mở bán</li>
                        <li><input type="radio" name="trang_thai" class="rdo_trangthai" value="2" id="">&nbsp;Sắp mở bán</li>
                        <li><input type="radio" name="trang_thai" class="rdo_trangthai" value="3" id="">&nbsp;Đã bán</li>
                        <li>
                            <hr>
                            <button class="cancel_trangthai btn btn-danger">Xóa chọn</button>
                            <button class="btn_apply btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li class="root_modal">Loại dự án
                    <ul class="m1 list-modal">
                        <li style="width:120px"><input type="radio" name="kind" class="rdo_kind" value="0" id="" <?php if (isset($project_kind) && $project_kind ==0) echo "checked"; ?>>&nbsp;Dự án</li>
                        <li style="width:120px"><input type="radio" name="kind" class="rdo_kind" value="1" id="" <?php if (isset($project_kind) && $project_kind ==1) echo "checked"; ?>>&nbsp;Mua</li>
                        <li style="width:120px"><input type="radio" name="kind" class="rdo_kind" value="2" id="" <?php if (isset($project_kind) && $project_kind ==2) echo "checked"; ?>>&nbsp;Cho Thuê</li>
                        <li>
                            <hr>
                            <button class="cancel_kind btn btn-danger">Xóa chọn</button>
                            <button class="btn_apply btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li class="root_modal">
                    Loại hình
                    <ul class="m2 list-modal" style="width:340px">
                        <?php foreach ($loaihinh as $k => $item){ ?>
                            <li style="width:125px"><input type="radio" name="loai_hinh" class="rdo_loaihinh" value="<?=$item['id_type_project']?>" id="">&nbsp;<?=$item['type_project']?></li>
                        <?php } ?>
                        <li>
                            <hr>
                            <button class="cancel_loaihinh btn btn-danger">Xóa chọn</button>
                            <button class="btn_apply btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li class="root_modal">
                    Phòng ngủ
                    <ul class="m3 list-modal" style="width:250px">
                        <li style="float:left"><input type="radio" name="phong_ngu" class="rdo_phongngu" value="1">&nbsp;01 phòng</li>
                        <li style="float:left"><input type="radio" name="phong_ngu" class="rdo_phongngu" value="2">&nbsp;02 phòng</li>
                        <li style="float:left"><input type="radio" name="phong_ngu" class="rdo_phongngu" value="3">&nbsp;03 phòng</li>
                        <li style="float:left"><input type="radio" name="phong_ngu" class="rdo_phongngu" value="4">&nbsp;04 phòng</li>
                        <li style="float:left"><input type="radio" name="phong_ngu" class="rdo_phongngu" value="5">&nbsp;05 phòng</li>
                        <li style="float:left"><input type="radio" name="phong_ngu" class="rdo_phongngu" value="6">&nbsp;06 phòng</li>
                        <li>
                            <hr>
                            <button class="cancel_phongngu btn btn-danger">Xóa chọn</button>
                            <button class="btn_apply btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li class="root_modal">
                    Khu vực
                    <ul class="m2 list-modal" style="width:340px">
                        <?php foreach ($khuvuc as $k => $item){ ?>
                            <li style="width:125px"><input type="radio" name="khu_vuc" class="rdo_khuvuc" value="<?=$item['district_id']?>" <?php if (isset($district) && $district ==$item['district_id']) echo "checked"; ?>>&nbsp;<?=$item['district_name']?></li>
                        <?php } ?>
                        <li style="width:100%">
                            <hr>
                            <button class="cancel_khuvuc btn btn-danger">Xóa chọn</button>
                            <button class="btn_apply btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li>
                    <input type="search" placeholder="Tìm kiếm dự án..." id="tim_kiem" value="<?php if(!empty($input_search))echo $input_search ?>" style="width: 205px;border-radius: 20px;" />
                    <!-- <button class="search-item" type="button"><span class="fa fa-search"></span></button> -->
                </li>
            </ul>
            <div class="text-left">
                <!-- <h3 class="mg0"><b>Mua bán nhà đất căn hộ Hồ Chí Minh...3446 căn</b></h3><br> -->
            </div>
            <div id="spinner" class="text-center"><br><br><br><br>
                <img style="width:40px;" src="https://www.afri.tn/wp-content/plugins/interactive-3d-flipbook-powered-physics-engine/assets/images/dark-loader.gif" alt="">
                <p>Đang tải dữ liệu...</p>
            </div>
            <div id="root_project" class="list-project-horizontal" style="height:390px;overflow-y:auto;overflow-x:hidden">
            </div>
        </div>
        <div class="col-md-5">
            <div id="map"></div>
        </div>

        <div id="form_contact_modal" class="boxed font18 modal col-md-4" style="display: none;background: white;margin-left: 33%">
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
                <button type="submit" class="btn btn-block btn-primary font17">Gửi</button>
            </form>
        </div>

    </div>
</section>
<script src="<?=base_url()?>upload/js/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script>

    $('.container').on('click', '.btn_modal_contact', function() {
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



    var input_trangthai = $('#trang_thai');
    var input_loaihinh  = $('#loai_hinh');
    var input_phongngu  = $('#phong_ngu');
    var input_khuvuc    = $('input[name="khu_vuc"]:checked');
    var input_query     = $('#tim_kiem');
    var input_kind      = $('input[name="kind"]:checked');
    var w_height = $(window).height();
    $('#root_project').css({'height':(w_height-140)});
    $('#map').css({'height':(w_height-100)});

    $('#tim_kiem').on('keyup', function(e) {
        e.preventDefault();
        searchProject();
    });
    $(document).ready(function () {
        searchProject();
    });
    function searchProject(){
        $('#spinner').show();
        $('#root_project').hide();
        var data={
            'project_category'   :$('#cate_id').val(),
            'project_title'      :input_query.val(),
            'project_status'     :input_trangthai.val(),
            'project_type'       :input_loaihinh.val(),
            'number_bedroom'     :input_phongngu.val(),
            'project_district_id':input_khuvuc.val(),
            'project_kind':input_kind.val()
        };
        console.log(data);
        $.ajax({
            type: "post",
            url: "<?=base_url('web/searchApi')?>",
            data: {'data':data},
            success: function (response) {
                response=JSON.parse(response);
                console.log(response);
                if (response.project_locate.lenght>0){
                    project_locate=response.project_locate;
                }
                setTimeout(() => {
                    $('#spinner').hide();
                    $('#root_project').html(response.data_html);
                    $('#root_project').fadeIn();
                    $('#map').html(response.maps);
                    $('#map').fadeIn();

                }, 500);
            }
        });
    }
    // $('.root_modal').click(function (e) { 
    //     $('.list-modal').hide();
    //     $(this).find('.list-modal').toggle();
    // });

    // $('.root_modal').mouseleave(function () { 
    //     setTimeout(() => {
    //         $('.list-modal').fadeOut();
    //     }, 2000);
    // });

    $('.rdo_trangthai').change(function (e) { 
        if ($(this).is(':checked')){
            input_trangthai.val($(this).val()); 
        }
    });
    $('.rdo_kind').change(function (e) { 
        if ($(this).is(':checked')){
            $('#cate_id').val('');
            input_kind = $('input[name="kind"]:checked');

            // console.log(input_kind);
        }
    });
    $('.rdo_loaihinh').change(function (e) { 
        if ($(this).is(':checked')){
            input_loaihinh.val($(this).val()); 
        }

    });
    $('.rdo_phongngu').change(function (e) { 
        if ($(this).is(':checked')){
            input_phongngu.val($(this).val());
        }
    });
    $('.rdo_khuvuc').change(function (e) { 
        if ($(this).is(':checked')){
            input_khuvuc    = $('input[name="khu_vuc"]:checked');
        }
        
    });
    $('.btn_apply').click(function (e) { 
        searchProject();  
    });

    $('.cancel_khuvuc').click(function (e) { 
        $('.rdo_khuvuc').removeAttr('checked');  
        input_khuvuc.val('');
    });
    $('.cancel_kind').click(function (e) { 
        $('.rdo_kind').removeAttr('checked');  
        input_kind.val('');
    });
    $('.cancel_trangthai').click(function (e) { 
        $('.rdo_trangthai').removeAttr('checked');  
        input_trangthai.val('');
    });
    $('.cancel_loaihinh').click(function (e) { 
        $('.rdo_loaihinh').removeAttr('checked');  
        input_loaihinh.val('');
    });
    $('.cancel_phongngu').click(function (e) { 
        $('.rdo_phongngu').removeAttr('checked');  
        input_phongngu.val('');
    });
</script>