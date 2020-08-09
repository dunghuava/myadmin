<div class="container-fluid">
     <div class="row">
           <div class="col-md-12">
              <div class="col-md-12">
                <form method="post">
                    
                
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
                             <td><input onchange="setCkb(this,'post_highlights',<?=$item['post_id']?>)" type="checkbox" <?=$item['post_highlights']==1 ? 'checked':''?>></td>
                             <td><input onchange="setCkb(this,'post_active',<?=$item['post_id']?>)" type="checkbox" <?=$item['post_active']==1 ? 'checked':''?> ></td>
                             <td>
                                <a href="<?=base_url().'admin/post/edit/'.$item['post_id']?>">
                                    <button type="button" class="btn btn-default">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </a>
                               
                                 
                                 <button onclick="onDelete(<?=$item['post_id']?>)" type="button" class="btn btn-default">
                                     <span class="fa fa-trash"></span>
                                 </button>
                             </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </form>
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

    function setCkb(ckb,colset,post_id){
        ckb = ckb.checked;
        ckb = ckb==true ? 1:0;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/post/update')?>",
            data: {'post_id':post_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }

    function onDelete(post_id){
        var post_id = post_id;
        // console.log(post_id);
        Swal.fire({
            title: 'Bạn có muốn xóa mục này?',
            text: "Dữ liệu đã xóa sẽ không thể phục hồi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Xóa'
            // cancelButtonText: 'Hủy',
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?=base_url('admin/post/destroy')?>",
                    data: {'post_id':post_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>