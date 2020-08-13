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
                        <th>Quận - Huyện</th>
                        <th>Hình ảnh</th>
                        <th>Nổi bậc</th>
                        <th>Hiển thị</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($category_region as $category){ 
                        $info_category = $this->Category_M->find_row(['cate_id' => $category['region_category']]);
                        $list_region = $this->Region_M->all(['region_category' => $category['region_category']]);
                        foreach ($list_region as $key => $item) {
                            $info_district = $this->District_M->find_row(['district_id' => $item['region_id_district']]);
                    ?>
                        <tr>
                            <?php if ($key == 0) {?>
                                <td rowspan="<?php echo count($list_region) ?>"><?=$info_category['cate_title']?></td>
                            <?php } ?>
                             <td><?=$info_district['district_name']?></td>
                             <td><img src="<?=resizeImg($item['region_img'],80,50,0)?>" style="max-height: 90px;"></td>
                             <td><input onchange="setCkb(this,'region_highlights',<?=$item['region_id']?>)" type="checkbox" <?=$item['region_highlights']==1 ? 'checked':''?>></td>
                             <td><input onchange="setCkb(this,'region_active',<?=$item['region_id']?>)" type="checkbox" <?=$item['region_active']==1 ? 'checked':''?> ></td>
                             <td>
                                <a href="<?=base_url().'admin/region/edit/'.$item['region_id']?>">
                                    <button type="button" class="btn btn-default">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </a>
                               
                                 
                                 <button onclick="onDelete(<?=$item['region_id']?>)" type="button" class="btn btn-default">
                                     <span class="fa fa-trash"></span>
                                 </button>
                             </td>
                        </tr>
                    <?php } } ?>
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

    function setCkb(ckb,colset,region_id){
        ckb = ckb.checked;
        ckb = ckb==true ? 1:0;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/region/update')?>",
            data: {'region_id':region_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }

    function onDelete(region_id){
        var region_id = region_id;
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
                    url: "<?=base_url('admin/region/destroy')?>",
                    data: {'region_id':region_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>