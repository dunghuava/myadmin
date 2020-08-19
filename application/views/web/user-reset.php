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
        background:#65BA69 !important;
    }
</style>
<section class="page-login" style="background:#F9F9F9">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6"><br>
            <form action="" class="login-form form-group font16_all">
                <div class="text-center"><h3>Reset mật khẩu</h3></div>
                <p><input type="text" class="form-control" placeholder="Nhập địa chỉ email"></p>
                <p><button class="btn btn-block btn-default">Reset password</button></p>
                <p><div class="text-center"><a href="<?=base_url('dang-ky')?>">Đăng ký tài khoản mới</a></div></p>
                <br>
            </form><br><br>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>