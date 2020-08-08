<div class="container-fluid">
     <div class="row">
           <div class="col-md-12">
              <div class="col-md-12">
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                       <!--  <th style="width: 5%">
                            <input type="checkbox" name="" value="">
                        </th>
                        <th style="width: 10%">Số thứ tự</th> -->
                        <th>Loại danh mục</th>
                        <th>Bài viết</th>
                        <th>Hình ảnh</th>
                        <th>Cập nhật</th>
                        <th>Nổi bậc</th>
                        <th>Hiển thị</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($list_post as $item){ 
                        $date_time_format = date('d-m-Y H:i:s', strtotime($item['post_date_time']));
                        $info_category = $this->Category_M->find_row(['cate_id' => $item['post_category_id']]);
                    ?>
                        <tr>
                            <!--  <td>
                                 <input type="checkbox" name="" value="">
                             </td> -->

                             <td><?=$info_category['cate_title']?></td>
                             <td><?=$item['post_title']?></td>
                             <td><img src="<?=base_url().'upload/images/'.$item['post_img']?>" style="max-height: 90px;"></td>
                             <td><?=$item['updated_at']?></td>
                             <td><input type="checkbox" name="" value=""></td>
                             <td><input type="checkbox" name="" value=""></td>
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