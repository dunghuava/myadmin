<style type="text/css">
    th{white-space: nowrap;}
</style>

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
                        <th>Danh mục</th>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>
                        <th>Nổi bậc</th>
                        <th>Hiển thị</th>
                        <th>Người đăng</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($list_project as $item){ 
                        $info_category = $this->Category_M->find_row(['cate_id' => $item['project_category']]);

                        // if ($info_category['cate_parent_id'] != 0) {
                        // 	$info_category_parent = $this->Category_M->find_row(['cate_id' => $info_category['cate_parent_id']]);
                        // 	$category = $info_category_parent['cate_title'].' / '.$info_category['cate_title'];
                        // }else{
                        	$category = $info_category['cate_title'];
                        // }
                    ?>
                        <tr>
                             <td><?=$category?></td>
                             <td><?=$item['project_title']?></td>
                             <td><img src="<?=resizeImg($item['project_img'],80,50,0)?>" style="max-height: 90px;"></td>
                             <td><input onchange="setCkb(this,'project_highlights',<?=$item['project_id']?>)" type="checkbox" <?=$item['project_highlights']==1 ? 'checked':''?>></td>
                             <td><input onchange="setCkb(this,'project_active',<?=$item['project_id']?>)" type="checkbox" <?=$item['project_active']==1 ? 'checked':''?> ></td>

                             <td>
                                <?php  
                                if ($item['project_user_id'] == 0) {
                                    echo "Admin";
                                }else{
                                    $info_user = $this->Account_M->find_row(['user_id'=>$item['project_user_id']]);
                                    echo $info_user['user_fullname'];
                                }
                                ?>
                             </td>
                             <td style="white-space: nowrap;">
                                <a href="<?=base_url().'admin/project/edit/'.$item['project_id']?>">
                                    <button type="button" class="btn btn-default">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </a>
                               
                                 
                                 <button onclick="onDelete(<?=$item['project_id']?>)" type="button" class="btn btn-default">
                                     <span class="fa fa-trash"></span>
                                 </button>


                                 <button title="Coppy" onclick="onCoppy(<?=$item['project_id']?>)" type="button" class="btn btn-default">
                                     <span class="fas fa-copy"></span>
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

    function setCkb(ckb,colset,project_id){
        ckb = ckb.checked;
        ckb = ckb==true ? 1:0;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/project/update')?>",
            data: {'project_id':project_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }

    function onDelete(project_id){
        var project_id = project_id;
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
                    url: "<?=base_url('admin/project/destroy')?>",
                    data: {'project_id':project_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }

    function onCoppy(project_id){
        var project_id = project_id;
        // console.log(post_id);
        Swal.fire({
            title: 'Bạn có muốn sao chép mục này?',
            text: "Dữ liệu sẻ được sao chép thành bản nháp",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Đồng ý'
            // cancelButtonText: 'Hủy',
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?=base_url('admin/project/coppy')?>",
                    data: {'project_id':project_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>