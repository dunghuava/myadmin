<div class="container-fluid">
	<form action="" method="post">
	 <div class="row">
     	<div class="col-md-12">
             <div class="col-md-6 inline-flex">
             	    <label for="">Họ tên</label>
     		        <input id="user_fullname" value="<?php echo $info_user['user_fullname'] ?>" type="text" name="user_fullname" class="form-control" required>
             </div>

             <div class="col-md-6 inline-flex">
                    <label for="">Email</label>
                    <input id="user_email" value="<?php echo $info_user['user_email'] ?>" type="email" name="user_email" class="form-control" required>
             </div>

             <div class="col-md-12 inline-flex">
                    <label for="">Tên đăng nhập</label>
                    <input id="user_name" value="<?php echo $info_user['user_name'] ?>" type="text" name="user_name" class="form-control" required style="width: 435px;">
                    <span id="result" style="color: red;margin-left: 5px;"></span>
             </div>

             <div class="col-md-6 inline-flex">
             	    <label for="">Mật khẩu mới</label>
     		        <input id="user_password" type="password" name="user_password" class="form-control">
             </div>

             <div class="col-md-6 inline-flex">
             	    <label for=""></label>
             	    <a href="<?=base_url('admin/user')?>" title="">
	     		        <button type="button" class="btn btn-danger">
	     		        	<span class="fa fa-arrow-left"></span>
	     		        	Trở về
	     		        </button>
             	    </a>
     		        <button type="submit" id="btn_save" name="btn_save" style="margin-left: 10px" class="btn btn-success">
     		        	<span class="fa fa-save"></span>
     		        	Lưu lại
     		        </button>
             </div>
     	</div>
     </div>
	 </form> 
</div>

<script>

    $("#btn_save").on('click', function() {
        var text = $('#result').html();

        console.log(text);
        if (text !='') {
            alert('aaaaaaa');
            return false;

        }
    });

    $(document).ready(function(){
        $("#user_name").keyup( function(e){
            var user_name = $("#user_name").val();
          e.preventDefault();
            $.ajax({
              url:"<?php echo base_url() ?>admin/user/check_user_name",
              type:"POST",
              data:{user_name:user_name,user_id:'<?php echo $info_user['user_id'] ?>'},
              success: function(data){
              if (data=='exist') {
                $('#result').html('Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.');
              }else{
                $('#result').html('');
              }
              
              },
              error: function(){
              alert("Error"); 
              }
            });
          
        });
      });
</script>