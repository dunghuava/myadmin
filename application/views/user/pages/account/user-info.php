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

    .modal a.close-modal {
    	top: 0.5px!important;
    	right: 1.5px!important;
	}
</style>
<section class="page-login" style="background:#F9F9F9">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6"><br>
            <form id="form_info" action="" class="login-form form-group font18_all" method="post">
            	<input type="hidden" id="user_id" name="user_id" value="<?=$infor_user['user_id']?>">
                <div class="text-center"><h3 style="font-size: 22px!important;font-weight: bold;">Thông tin tài khoản</h3></div>
                <p><input type="text" id="user_fullname" name="user_fullname" class="form-control" value="<?=$infor_user['user_fullname']?>" placeholder="Họ tên" required=""></p>
                <p><input type="email" id="user_email" name="user_email" class="form-control" value="<?=$infor_user['user_email']?>" placeholder="Địa chỉ email" required=""></p>
                <p>
                    <input type="text" id="user_name" name="user_name" class="form-control" value="<?=$infor_user['user_name']?>" disabled>
                    <span id="error_username" style="color: red"></span>
                </p>
                <p><button class="btn btn-block btn-default">Lưu</button>
                	<button href="#" id="btn_modal" data-modal="#form_pass" class="btn btn-block btn-default">Thay đổi Mật khẩu</button>
                </p>
                <!-- <p><div class="text-center"><a href="<?=base_url('dang-nhap')?>">Trở về trang đăng nhập</a></div></p>
                <br> -->
            </form><br><br>

            <form id="form_pass" action="" class="login-form form-group font18_all modal" style="display: none">
                <div class="text-center"><h3 style="font-size: 22px!important;font-weight: bold;">Thay đổi mật khẩu</h3></div>
                <p><input type="password" id="user_password_curent" name="user_password_curent" class="form-control" value="" placeholder="Mật khẩu hiện tại" required=""></p>
                <p><input type="password" id="user_password" name="user_password" class="form-control" value="" placeholder="Mật khẩu mới" required=""></p>
                <p>
                    <input type="password" id="user_password_confirm" name="user_password_confirm" class="form-control" value="" placeholder="Xác nhận mậy khẩu mới" required="">
                </p>
                <p><button class="btn btn-block btn-default">Lưu</button>
                </p>
                <!-- <p><div class="text-center"><a href="<?=base_url('dang-nhap')?>">Trở về trang đăng nhập</a></div></p>
                <br> -->
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>
</section>

<script type="text/javascript">

	$('#form_info').submit(function(event){  
		event.preventDefault();  

		$.ajax({  
			url:"<?=base_url()?>user/account/UpdateUser",  
			method:"POST",  
			data:$('#form_info').serialize(),  
			success: function (data) {
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

				setTimeout("window.location.replace('<?= base_url().'thong-tin'; ?>');",3000);
			}
		});  

	});

	$('#form_pass').submit(function(event){  
		event.preventDefault();  
		var user_password = $('#user_password').val();
        var user_password_confirm = $('#user_password_confirm').val();
        if (user_password == user_password_confirm) {
        	$.ajax({  
        		url:"<?=base_url()?>user/account/UpdatePass",  
        		method:"POST",  
        		data:$('#form_pass').serialize(),  
        		success: function (data) {

        			if (data == 'ok') {
        				$.modal.close();
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
        			}else{
        				const toast = swal.mixin({
        					toast: true,
        					position: 'center',
        					showConfirmButton: false,
        					timer: 2500
        				});
        				toast({
        					type: 'warning',
        					title: 'Mật khẩu hiện tại không đúng',
        				});
        			}

        		}
        	});  
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