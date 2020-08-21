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
            <form action="" class="login-form form-group font16_all" method="post">
                <div class="text-center"><h3>Đăng nhập</h3>
                    <p style="margin:5px 0px;color:red;font-size:12px"><?php if ($this->session->flashdata('reponse')) {echo $this->session->flashdata('reponse');} ?></p>
                </div>
                <p><input id="user_name" name="user_name" type="text" class="form-control" placeholder="Tên đăng nhập"></p>
                <p><input id="user_password" name="user_password" type="password" class="form-control" placeholder="Mật khẩu"></p>
                <p>
                    <label for="">
                        <input type="checkbox" name="" id="">
                        <b>Nhớ đăng nhập</b>
                    </label>
                </p>
                <p><button class="btn btn-block btn-default">Đăng nhập</button></p>
                <p>
                    <div class="text-center" style="float: left;"><a href="<?=base_url('dang-ky')?>">Đăng kí tài khoản</a></div>
                    <div class="text-center" style="float: right;"><a href="<?=base_url('quen-mat-khau')?>">Quên mật khẩu</a></div></p>
                <br>
            </form><br><br>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>