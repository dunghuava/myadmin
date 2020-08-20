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
            <form id="form_register" action="" class="login-form form-group font16_all">
                <div class="text-center"><h3>Đăng ký tài khoản</h3></div>
                <p><input type="text" id="user_fullname" name="user_fullname" class="form-control" placeholder="Họ tên"></p>
                <p><input type="email" id="user_email" name="user_email" class="form-control" placeholder="Địa chỉ email"></p>
                <p>
                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Tên đăng nhập">
                    <span id="error_username" style="color: red"></span>
                </p>
                <p><input type="password" id="user_password" name="user_password" class="form-control" placeholder="Mật khẩu đăng nhập"></p>
                <p><input type="password" id="user_password_confirm" name="user_password_confirm" class="form-control" placeholder="Xác nhận mật khẩu"></p>
                <p><button class="btn btn-block btn-default">Đăng ký tài khoản</button></p>
                <p><div class="text-center"><a href="<?=base_url('dang-nhap')?>">Trở về trang đăng nhập</a></div></p>
                <br>
            </form><br><br>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>

<script type="text/javascript">

    $(document).ready(function(){
        $("#user_name").keyup( function(e){
            var user_name = $("#user_name").val();
          e.preventDefault();
            $.ajax({
              url:"<?php echo base_url() ?>admin/user/check_user_name",
              type:"POST",
              data:{user_name:user_name,user_id:''},
              success: function(data){
              if (data=='exist') {
                $('#error_username').html('Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.');
              }else{
                $('#error_username').html('');
              }
              
              },
              error: function(){
              alert("Error"); 
              }
            });
          
        });
      });

    $('#form_register').submit(function(event){  
        event.preventDefault();  
        var user_password = $('#user_password').val();
        var user_password_confirm = $('#user_password_confirm').val();
        var text = $('#error_username').html();
        if (user_password == user_password_confirm) {
            if (text =='') {
                $.ajax({  
                    url:"<?=base_url()?>web/registerUser",  
                    method:"POST",  
                    data:$('#form_register').serialize(),  
                    success: function (data) {
                        const toast = swal.mixin({
                            toast: true,
                            position: 'center',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Đăng ký thành công',
                        });
                        setTimeout("window.location.replace('<?= base_url().'dang-nhap'; ?>');",3000);
                    }
                });  
            }
            
        }else{
            const toast = swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 2500
            });
            toast({
                type: 'warning',
                title: 'Xác nhận mật khẩu không khớp',
            });
        }

    });
</script>