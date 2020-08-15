<div class="container-fluid">
     <div class="row">
           <div class="col-md-12">
              <div class="col-md-12">
                <form method="post">
                    
                <div class="col-md-12 inline-flex">
                        <a href="<?=base_url().'admin/residential/add/'?>">
                            <button type="button" class="btn btn-primary">Thêm khu dân cư</button>
                        </a>
                    </div>

            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>vị trí</th>
                        <th>Hình ảnh</th>
                        <th>Nổi bậc</th>
                        <th>Hiển thị</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($list_residential as $item){ 
                        $info_district = $this->District_M->find_row(['district_id' => $item['residential_district_id']]);
                        $info_province = $this->Province_M->find_row(['province_id' => $item['residential_province_id']]);
                        $address = $info_district['district_name'].' , '.$info_province['province_name'];
                    ?>
                        <tr>
                             <td><?=$item['residential_title']?></td>
                             <td><?=$address?></td>
                             <td><img src="<?=resizeImg($item['residential_img'],80,50,0)?>" style="max-height: 90px;"></td>
                             <td><input onchange="setCkb(this,'residential_highlights',<?=$item['residential_id']?>)" type="checkbox" <?=$item['residential_highlights']==1 ? 'checked':''?>></td>
                             <td><input onchange="setCkb(this,'residential_active',<?=$item['residential_id']?>)" type="checkbox" <?=$item['residential_active']==1 ? 'checked':''?> ></td>
                             <td>
                                <a href="<?=base_url().'admin/residential/edit/'.$item['residential_id']?>">
                                    <button type="button" class="btn btn-default">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </a>
                               
                                 
                                 <button onclick="onDelete(<?=$item['residential_id']?>)" type="button" class="btn btn-default">
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

    function setCkb(ckb,colset,residential_id){
        ckb = ckb.checked;
        ckb = ckb==true ? 1:0;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/residential/update')?>",
            data: {'residential_id':residential_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }

    function onDelete(residential_id){
        var residential_id = residential_id;
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
                    url: "<?=base_url('admin/residential/destroy')?>",
                    data: {'residential_id':residential_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>