<style>
    .form-mobile{
        width:100%;
        left:0px;
        right:0px;
        bottom:0px;
        position:fixed;
        z-index:999;
        background:#fff;
        padding:5px;
    }
</style>
<div class="hidden-md hidden-lg"><br><br></div>
<div class="form-mobile hidden-md hidden-lg">
    <div style="display:flex">
        <div class="col-md-6 col-xs-6 div-contact-tel" style="margin:2px;background: #0C714B;">
            <a style="color: white;text-decoration: none;" href="tel:<?=$info[0]['phone']?>"><i class="fa fa-phone" aria-hidden="true"></i> <?=$info[0]['phone']?></a>
        </div>
        <div class="col-md-6 col-xs-6 div-contact-tel" style="margin:2px;background:red">
            <a  style="color: white;text-decoration: none;" href="<?=fullAddress()?>#p_form_contact"><i class="fa fa-info" aria-hidden="true"></i> Yêu cầu thông tin</a>
        </div>
    </div>
</div>
<div class="boxed font18" id="p_form_contact">
    <div class="col-md-12 div-contact">
        <div class="div-contact-img">
            <img class="img-contact" src="<?=resizeImg('sale_manager.jpg',70,70,0)?>">
        </div>
        <div class="col-md-8 name-contact">
            <p class="font18" style="font-weight: bold;">Trương Công Ánh</p>
            <p class="font17">Sale manager</p>
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
        <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="Họ và tên">
        <input type="text" name="contact_phone" id="contact_phone" class="form-control" placeholder="Số điện thoại">
        <input type="text" name="contact_email" id="contact_email" class="form-control" placeholder="Địa chỉ email">
        <input type="hidden" name="contact_title" id="contact_title" class="form-control" value="<?=$duan['project_title']?>">
        <input type="text" name="" id="" class="form-control text-overflow" value="<?=$duan['project_title']?>" disabled style="background: gainsboro;">
        <textarea name="contact_info" id="contact_info" rows="4" class="form-control font17" placeholder="Hỏi thông tin"></textarea>
        <button type="submit" class="btn btn-block btn-primary font17">Gửi</button>
    </form>
</div>
<script type="text/javascript">
        
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

                    $('#form-contact').find('#contact_name').val('');
                    $('#form-contact').find('#contact_phone').val('');
                    $('#form-contact').find('#contact_email').val('');
                    $('#form-contact').find('textarea').val('');
                }
            });  

    });

</script>