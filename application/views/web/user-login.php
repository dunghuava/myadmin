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
</style>
<section class="page-login" style="background:#F9F9F9">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6"><br><br>
            <form action="" class="login-form form-group">
                <div class="text-center"><h3>Đăng nhập</h3></div>
                <p><input type="text" class="form-control" placeholder="Tên đăng nhập"></p>
                <p><input type="password" class="form-control" placeholder="Mật khẩu"></p>
                <p>
                    <label for="">
                        <input type="checkbox" name="" id="">
                        <b>Nhớ đăng nhập</b>
                    </label>
                </p>
                <p><button class="btn btn-block btn-primary">Đăng nhập</button></p>
                <p><div class="text-center"><a href="<?=base_url('quen-mat-khau')?>">Quyên mật khẩu</a></div></p>
                <br>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>