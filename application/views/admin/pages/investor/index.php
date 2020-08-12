<div class="container-fluid">
     <div class="row">
           <div class="col-md-12">
              <div class="col-md-12">
                <form method="post">
                    
                
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Thành lập</th>
                        <th>Hình ảnh</th>
                        <th>Nổi bậc</th>
                        <th>Hiển thị</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($list_investor as $item){ 
                    ?>
                        <tr>
                             <td><?=$item['investor_title']?></td>
                             <td><?=$item['investor_establish']?></td>
                             <td><img src="<?=base_url().'upload/images/'.$item['investor_img']?>" style="max-height: 90px;"></td>
                             <td><input onchange="setCkb(this,'investor_highlights',<?=$item['investor_id']?>)" type="checkbox" <?=$item['investor_highlights']==1 ? 'checked':''?>></td>
                             <td><input onchange="setCkb(this,'investor_active',<?=$item['investor_id']?>)" type="checkbox" <?=$item['investor_active']==1 ? 'checked':''?> ></td>
                             <td>
                                <a href="<?=base_url().'admin/investor/edit/'.$item['investor_id']?>">
                                    <button type="button" class="btn btn-default">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </a>
                               
                                 
                                 <button onclick="onDelete(<?=$item['investor_id']?>)" type="button" class="btn btn-default">
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
    // function onEdit(permission_id,permission_name,permission_value){
    //     $('#permission_id').val(permission_id);
    //     $('#permission_name').val(permission_name);
    //     $('#permission_value').val(permission_value);
    // }

    function setCkb(ckb,colset,investor_id){
        ckb = ckb.checked;
        ckb = ckb==true ? 1:0;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/investor/update')?>",
            data: {'investor_id':investor_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }

    function onDelete(investor_id){
        var investor_id = investor_id;
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
                    url: "<?=base_url('admin/investor/destroy')?>",
                    data: {'investor_id':investor_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>