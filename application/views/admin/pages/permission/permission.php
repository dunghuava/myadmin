<div class="container-fluid">
	<form action="" method="post">
	 <div class="row">
     	<div class="col-md-6">
             <div class="col-md-12 inline-flex">
             	    <label for="">Permission name</label>
                    <input id="permission_id" type="hidden" name="permission_id" value="">
     		        <input required id="permission_name" value="" type="text" name="permission_name" class="form-control"></input>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Permission value</label>
     		        <input required id="permission_value" value="" type="text" name="permission_value" class="form-control"></input>
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
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5%">
                            <input type="checkbox" name="" value="">
                        </th>
                        <th style="width: 10%">ID</th>
                        <th>Permission name</th>
                        <th>Permission value</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arr_permission as $item){ ?>
                        <tr>
                             <td>
                                 <input type="checkbox" name="" value="">
                             </td>
                             <td><?=$item['permission_id']?></td>
                             <td><?=$item['permission_name']?></td>
                             <td><?=$item['permission_value']?></td>
                             <td>
                                 <button onclick="onEdit(<?=$item['permission_id']?>,'<?=$item['permission_name']?>','<?=$item['permission_value']?>')"  class="btn btn-default">
                                     <span class="fa fa-eye"></span>
                                 </button>
                                 <button onclick="onDelete(<?=$item['permission_id']?>)" class="btn btn-default">
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
    function onEdit(permission_id,permission_name,permission_value){
        $('#permission_id').val(permission_id);
        $('#permission_name').val(permission_name);
        $('#permission_value').val(permission_value);
    }
    function onDelete(permission_id){
        var permission_id = permission_id;
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
                    url: "<?=base_url('admin/permission/destroy')?>",
                    data: {'permission_id':permission_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>