<style>
    .login-form {
        padding: 35px;
        border: none;
        box-shadow: 0 -2px 10px 0 rgba(0,0,0,.15);
        margin-top: 50px;
    }
    .login-form .form-control,.btn{
        border-radius:0px !important;
        height:42px;
    }
    .btn{
        color:#fff;
        background:#0C714B !important;
    }
</style>
<section class="page-login" style="background:#F9F9F9">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6"><br>
            <form id="form_pass" action="" class="login-form form-group font18_all" method="post">
                <div class="text-center"><h3 style="font-size: 22px!important;font-weight: bold;">Quên mật khẩu</h3></div>
                <p>
                    <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Nhập địa chỉ email đã đăng ký" required="">
                    <span style="color: red">※ Mật khẩu mới sẽ được gửi qua email</span>
                </p>
                <p><button class="btn btn-block btn-default">Gửi</button></p>
                <p><div class="text-center"><a href="<?=base_url('dang-ky')?>">Đăng ký tài khoản mới</a></div></p>
                <br>
            </form><br><br>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>

<script type="text/javascript">
    $('#form_pass').submit(function(event){  
        event.preventDefault();  
        var user_email = $('#user_email').val();
        $.ajax({  
            url:"<?=base_url()?>user/account/resetPass",  
            method:"POST",  
            data:{user_email:user_email},  
            success: function (data) {
                if (data == 'ok') {
                    const toast = swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    toast({
                        type: 'success',
                        title: 'Cập nhật thành công',
                    });
                    setTimeout("window.location.replace('<?= base_url().'dang-nhap'; ?>');",3000);
                }else{
                    const toast = swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    toast({
                        type: 'warning',
                        title: 'Email không tồn tại trong hệ thống',
                    });
                }
                
            }
        });  

    });
</script>