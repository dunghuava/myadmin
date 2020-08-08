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
	<form  action="" method="post">
	 <div class="row">
     	<div class="col-md-6">
             <div class="col-md-12 inline-flex">
             	    <label for="">Group name</label>
                    <input id="permission_group_id" type="hidden" name="permission_group_id" value="">
     		        <input required id="permission_group_name" value="" type="text" name="permission_group_name" class="form-control"></input>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Group value</label>
     		        <select required style="width:100%" multiple name="permission_group_value[]" id="permission_group_value" class="form-group select2">
                        <?php foreach ($arr_permission as $item){ ?>
                            <option value="<?=$item['permission_id']?>"><?=$item['permission_name']?></option>
                        <?php } ?>
                     </select>
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
                        <th style="width: 5%">
                            <input type="checkbox" name="" value="">
                        </th>
                        <th style="width: 10%">ID</th>
                        <th>Group name</th>
                        <th>Group value</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arr_permission_group as $item){ ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="" value="">
                            </td>
                             <td><?=$item['permission_group_id']?></td>
                             <td><?=$item['permission_group_name']?></td>
                             <td>
                                <?php
                                    $arr_explode=explode('&',$item['permission_group_value']);
                                    foreach ($arr_explode as $value ){
                                        echo '<span class="permission-label"><span class="fa fa-cog"></span>&nbsp;'.$this->Permission_M->findNamePermission($value).'</span>';
                                    }
                                 ?>
                            </td>
                             <td>
                                 <button onclick="onEdit(<?=$item['permission_group_id']?>,'<?=$item['permission_group_name']?>','<?=$item['permission_group_value']?>')"  class="btn btn-default">
                                     <span class="fa fa-eye"></span>
                                 </button>
                                 <button onclick="onDelete(<?=$item['permission_group_id']?>)" class="btn btn-default">
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
    function onEdit(permission_group_id,permission_group_name,permission_group_value){
        $('#permission_group_id').val(permission_group_id);
        $('#permission_group_name').val(permission_group_name);
        $('#permission_group_value').val(permission_group_value.split('&')).trigger('change');
    }
    function onDelete(permission_group_id){
        var permission_group_id = permission_group_id;
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
                    url: "<?=base_url('admin/permission/destroyGroup')?>",
                    data: {'permission_group_id':permission_group_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>