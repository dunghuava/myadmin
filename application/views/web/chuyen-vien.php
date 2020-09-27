<style type="text/css">
	.modal a.close-modal {
        top: 0.5px!important;
        right: 1.5px!important;
    }
</style>

<section class="sec-tintuc-list font18">
    <div class="container">
        <h3 class="title">Gặp chuyên viên tư vấn</h3>
        <br>
        <div class="row">
            <?php
                foreach ($arr_staff as $staff){ ?>
                <!-- <div class="col-md-4">
                    <div class="item-tin-list">
                    	<a title="Gặp chuyên viên tư vấn" href="" style="text-decoration:none">
                            <div class="cover-img scaleimg">
                                <img title="<?=$staff['staff_name']?>" alt="<?=$staff['staff_name']?>" src="<?=resizeImg($staff['staff_img'],360,240,0)?>" alt="">
                            </div>
                            <div class="content">
                                <h3 style="font-weight: bold;font-size: 18px;" class="title text-overflow"><?=$staff['staff_name']?></h3>
                                <p class="text-overflow"><?=$staff['staff_position']?></p>
                                <p><span class="fa fa-phone">&nbsp;</span><?=$staff['staff_phone']?></p>
                                
                            </div>
                        </a>
                    </div><br>
                </div> -->


                <div class="col-md-3 col-xs-12">
                    <div class="item-project">
                        <a title="Gặp chuyên viên tư vấn" style="text-decoration:none">
                            <div class="project-info scaleimg">
                                <img title="<?=$staff['staff_name']?>" alt="<?=$staff['staff_name']?>" src="<?=resizeImg($staff['staff_img'],262,220,0)?>" alt="">
                                
                            </div>
                            <div class="project-content">
                                <h3 class="title text-overflow"><?=$staff['staff_name']?></h3>
                                <p class="address"><?=$staff['staff_position']?></b></p></p>
                                <p class="price price-red"><span class="fa fa-phone" style="padding-top: 4px">&nbsp;</span><?=$staff['staff_phone']?></p>
                                <p class="price right" style="margin: -4px;">
                                	<button href="#" data-modal="#form_contact_modal" data-staff-name ="<?=$staff['staff_name']?>" data-staff-phone ="<?=$staff['staff_phone']?>" data-staff-position ="<?=$staff['staff_position']?>" data-staff-id ="<?=$staff['staff_id']?>" data-staff-img ="<?=$staff['staff_img']?>"  class="btn_modal_contact btn btn-primary" style="background: #0c714b;font-size: 16px">Liên hệ tư vấn</button>
                            	</p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } if (empty($arr_staff)){ ?>
                <div class="text-center" style="color:red"><h4>Dữ liệu đang được cập nhật...</h4></div>
            <?php } ?>
        </div>
    </div>
</section>


<section class="modal contact-bg-block font18" id="form_contact_modal">
            <div class="col-md-12 div-contact">
                <div class="div-contact-img">
                    <img class="img-contact" src="<?=resizeImg('sale_manager.jpg',70,70,0)?>" style="width: 70px;height: 70px">
                </div>
                <div class="col-md-8 name-contact">
                    <p class="font18 staff_name" style="font-weight: bold;">Trương Công Ánh</p>
                    <p class="font17 staff_position">Sale manager</p>
                </div>

            </div>
            <div class="col-md-12 div-contact-tel" style="background: #0C714B;">
                <a style="color: white;text-decoration: none;" href="tel:<?=$info[0]['phone']?>"><i class="fa fa-phone" aria-hidden="true"></i> <?=$info[0]['phone']?></a>

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
                <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="Họ và tên" required>
                <input type="text" name="contact_phone" id="contact_phone" class="form-control" placeholder="Số điện thoại" required>
                <input type="text" name="contact_email" id="contact_email" class="form-control" placeholder="Địa chỉ email" required>
                <input type="hidden" name="contact_to_staff" id="contact_to_staff" class="form-control" value="1">
                <input type="text" name="contact_title" id="contact_title" class="form-control" placeholder="Tiêu đề" value="" required>
                <textarea name="contact_info" id="contact_info" rows="4" class="form-control font17" placeholder="Hỏi thông tin" required></textarea>
                <button type="submit" class="btn btn-block btn-primary font17">Gửi</button>
            </form>
        </section>


<script type="text/javascript">
	$('.container').on('click', '.btn_modal_contact', function() {
        // var id = $(this).data('id');

        // var title = $(this).attr('data-title');
        var staff_name = $(this).attr('data-staff-name');
        var staff_phone = $(this).attr('data-staff-phone');
        var staff_position = $(this).attr('data-staff-position');
        var staff_id = $(this).attr('data-staff-id');
        var staff_img = $(this).attr('data-staff-img');
        // console.log(phone);
        
        $('.staff_name').html(staff_name);
        $('.staff_position').html(staff_position);
        $('.div-contact-tel').html('<a style="color: white;text-decoration: none;" href="tel:'+staff_phone+'"><i class="fa fa-phone" aria-hidden="true"></i> '+staff_phone+'</a>');
        $('#contact_to_staff').val(staff_id);

        $('.img-contact').attr('src','<?php echo base_url() ?>upload/images/'+staff_img+'');

        
        

        // $('#contact_title').val(title);
        // $('#contact_title_show').val(title);
        
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