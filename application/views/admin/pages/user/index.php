<style>
    
</style>
<div class="container-fluid">
     <div class="row">
           <div class="col-md-12">
              <div class="col-md-12">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Đia chỉ email</th>
                        <th>Tên đăng nhập</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arr_account as $item){ ?>
                        <tr>
                             <td><?=$item['user_fullname']?></td>
                             <td><?=$item['user_email']?></td>
                             <td><?=$item['user_name']?></td>
                             <td>
                                 <button onclick="onEdit(<?=$item['user_id']?>,'<?=$item['user_fullname']?>','<?=$item['user_name']?>')"  class="btn btn-default">
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