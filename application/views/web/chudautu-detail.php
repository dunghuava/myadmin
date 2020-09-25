<br>
<style>
.developer-padding-tb {
    padding-top: 60px;
    padding-bottom: 60px;
}
.contact-inner {
    width: 100%;
    max-width: 750px;
    margin: auto;
}
.text-white {
    color: #fff!important;
}
.text-center {
    text-align: center;
}
.btn-red {
    background: #c52728;
    color: #fff;
}
.btn-primary {
    display: inline-block;
    width: 100%;
    height: 50px;
    line-height: 50px;
    margin: 0 auto;
    cursor: pointer;
    font-weight: 600;
    font-size: 18px;
    max-width: fit-content;
    min-width: 200px;
    text-align: center;
    border-radius: 2px;
    padding: 0 20px;
}
.contact-inner>p {
    font-size: 18px;
    line-height: 1.67;
    margin-bottom: 30px;
}
.btn-red {
    background: #c52728;
    color: #fff;
}
.btn-primary {
    display: inline-block;
    width: 100%;
    height: 50px;
    line-height: 50px;
    margin: 0;
    cursor: pointer;
    font-weight: 600;
    font-size: 18px;
    max-width: fit-content;
    min-width: 200px;
    text-align: center;
    border-radius: 2px;
    padding: 0 20px;
}
.btn-red {
    background: #c72528!important;
}

.modal a.close-modal {
        top: 0.5px!important;
        right: 1.5px!important;
    }


</style>

<?php
    $info_staff = $this->Staff_M->find_row(['staff_id'=>1]);  
?>
<section class="sec-chudautu font18">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div style="border: 1px solid #dcdcdc;padding:10px">
                    <img src="<?=resizeImg($cdt['investor_img'],260,243,0)?>" alt="<?=$cdt['investor_title']?>">
                </div>
            </div>
            <div class="col-md-9">
                <h3><?=$cdt['investor_title']?></h3>
                <p>
                    <?=$cdt['investor_name']?>
                </p>
                <p>Thành lập: <?=$cdt['investor_establish']?></p>
                <p>Địa chỉ: <?=$cdt['investor_address']?></p>
                <p>Website: <?=$cdt['investor_website']?></p>
                <button href="#" data-modal="#form_contact_modal" data-id ="<?=$cdt['investor_title']?>" class="btn_modal_contact btn btn-primary">Liên hệ tư vấn</button>
            </div>
        </div>
    </div>
</section><br><br>
<section style="background:#F4F5F9" class="font18">
    <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <h3>Giới thiệu</h3>
                    <p>
                     <?=$cdt['investor_introduce']?>
                    </p>
                </div>
            </div>
        </div>
</section>
<section class="font18">
    <div class="container">
        <h3>Các dự án của <?=$cdt['investor_title']?></h3>
        <div class="row">
            <?php    
                $col=4; include ('duan-item.php') 
            ?>
        </div>
    </div>
</section>
<section class="contact-bg-block font18" style=" background: url(https://static.rever.vn/images/bg-contact-block.jpg) 50% 50% / cover no-repeat;">
        <div class="width1140 developer-padding-tb">
            <div class="contact-inner text-white text-center">
                <p>Nhận tin tức mới nhất, tình hình giao dịch, biến động giá cả của các dự án thuộc Khang Điền,
                    gặp ngay chuyên viên tư vấn Gianha.vn để giải đáp mọi thắc mắc.</p>
                <div class="contact-btn">
                    <button href="#" data-modal="#form_contact_modal" data-id ="<?=$cdt['investor_title']?>" class="btn_modal_contact btn-primary btn-red" style="border: none;">Liên hệ tư vấn</button>
                </div>
            </div>
        </div>
</section>
<section class="font18">
    <div class="container">
        <h3>Chủ đầu tư nổi bật</h3>
        <div class="row">
            <div class="chudautu-slider">
            <?php foreach ($list_investor as $key => $investor) {?>
                <div class="col-md-2">
                    <div class="item-chudautu">
                        <a title="<?=$investor['investor_title']?>" href="<?=base_url('chu-dau-tu/'.$investor['investor_alias'].'-'.$investor['investor_id'])?>">
                            <img src="<?=resizeImg($investor['investor_img'],150,90,2)?>" alt="<?=$investor['investor_title']?>">
                        </a>
                        
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>



<section class="modal contact-bg-block font18" id="form_contact_modal">
    <div class="col-md-12 div-contact">
        <div class="div-contact-img">
            <img class="img-contact" src="<?=resizeImg($info_staff['staff_img'],70,70,0)?>">
        </div>
        <div class="col-md-8 name-contact">
            <p class="font18" style="font-weight: bold;"><?=$info_staff['staff_name']?></p>
            <p class="font17"><?=$info_staff['staff_position']?></p>
        </div>

    </div>
    <div class="col-md-12 div-contact-tel" style="background: #0C714B;">
        <a style="color: white;text-decoration: none;" href="tel:<?=$info_staff['staff_phone']?>"><i class="fa fa-phone" aria-hidden="true"></i> <?=$info_staff['staff_phone']?></a>

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
        <input type="hidden" name="contact_to_staff" id="contact_to_staff" class="form-control" value="<?=$info_staff['staff_id']?>">
        <input type="hidden" name="contact_title" id="contact_title" class="form-control" value="">
        <input type="text" name="contact_title_show" id="contact_title_show" class="form-control text-overflow" value="" disabled style="background: gainsboro;">
        <textarea name="contact_info" id="contact_info" rows="4" class="form-control font17" placeholder="Hỏi thông tin"></textarea>
        <button type="submit" class="btn btn-block font17" style="color: white">Gửi</button>
    </form>
</section>



<script type="text/javascript">
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
