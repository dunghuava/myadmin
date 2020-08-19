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
        background:#65BA69 !important;
        color:#fff;
    }
</style>
<section class="page-login" style="background:#F9F9F9">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6"><br>
            <form action="" class="login-form form-group font16_all">
                <div class="text-center"><h3>Đăng ký tài khoản</h3></div>
                <p><input type="text" class="form-control" placeholder="Họ tên"></p>
                <p><input type="email" class="form-control" placeholder="Địa chỉ email"></p>
                <p><input type="password" class="form-control" placeholder="Mật khẩu đăng nhập"></p>
                <p><input type="password" class="form-control" placeholder="Xác nhận mật khẩu"></p>
                <p><button class="btn btn-block btn-default">Đăng ký tài khoản</button></p>
                <p><div class="text-center"><a href="<?=base_url('dang-nhap')?>">Trở về trang đăng nhập</a></div></p>
                <br>
            </form><br><br>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>