<style>
    .permission-label{
        padding: 5px;
        background: <?=$setting['sibar_background_color']?>;
        color: #fff;
        font-size: 12px;
        border-radius: 8px;
        margin-right: 5px;
        cursor:pointer;
    }
</style>
<div class="container-fluid">
	<form action="" method="post">
	 <div class="row">
     	<div class="col-md-6">
             <div class="col-md-12 inline-flex">
             	    <label for="">Họ tên</label>
                    <input id="user_id" type="hidden" name="user_id" value="">
     		        <input id="user_fullname" value="" type="text" name="user_fullname" class="form-control"></input>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Tên đăng nhập</label>
     		        <input minlength="5" required id="user_name" type="text" name="user_name" class="form-control"></input>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Quyền</label>
                    <select style="width:100%" name="user_permission_group_id" id="user_permission_group_id" class="form-group select2">
                        <option value="0">Quản trị viên</option>
                        <?php foreach ($arr_permission_group as $item){ ?>
                            <option value="<?=$item['permission_group_id']?>"><?=$item['permission_group_name']?></option>
                        <?php } ?>
                    </select> 
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Mật khẩu</label>
     		        <input required id="user_password" type="text" name="user_password" class="form-control"></input>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for=""></label>
             	    <a href="<?=base_url('medicine/add')?>" title="">
	     		        <button type="button" class="btn btn-danger">
	     		        	<span class="fa fa-arrow-left"></span>
	     		        	Trở về
	     		        </button>
             	    </a>
     		        <button type="submit" name="btn_save" style="margin-left: 10px" class="btn btn-success">
     		        	<span class="fa fa-save"></span>
     		        	Lưu lại
     		        </button>
             </div>
     	</div>
     </div>
	 </form> <br>
     <div class="row">
           <div class="col-md-12">
              <div class="col-md-12">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th>Họ tên</th>
                        <th>Tên đăng nhập</th>
                        <th>Quyền</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arr_account as $item){ ?>
                        <tr>
                             <td><?=$item['user_id']?></td>
                             <td><?=$item['user_fullname']?></td>
                             <td><?=$item['user_name']?></td>
                             <td>
                                <span class="permission-label"><span class="fa fa-users"></span>&nbsp;<?=$item['permission_group_name']?></span>
                            </td>
                             <td>
                                 <button onclick="onEdit(<?=$item['user_id']?>,'<?=$item['user_fullname']?>','<?=$item['user_name']?>','<?=$item['user_permission_group_id']?>')"  class="btn btn-default">
                                     <span class="fa fa-eye"></span>
                                 </button>
                                 <button onclick="onDelete(<?=$item['user_id']?>)" class="btn btn-default">
                                     <span class="fa fa-trash"></span>
                                 </button>
                             </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
              </div>
           </div>
     </div>
</div>

<script>
    $(document).ready(function () {
        $('#user_name').val('');
        $('#user_password').val('');
    });
    function onEdit(user_id,user_fullname,user_name,user_permission_group_id){
        $('#user_id').val(user_id);
        $('#user_name').val(user_name);
        $('#user_name').attr('disabled','disabled');
        $('#user_password').removeAttr('required');
        $('#user_fullname').val(user_fullname);
        $('#user_permission_group_id').val(user_permission_group_id).trigger('change');
    }
    function onDelete(user_id){
        var user_id = user_id;
        Swal.fire({
            title: 'Bạn có muốn xóa mục này?',
            text: "Dữ liệu đã xóa sẽ không thể phục hồi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?=base_url('admin/account/destroy')?>",
                    data: {'user_id':user_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>