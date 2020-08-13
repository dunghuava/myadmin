<div class="container-fluid">
     <div class="row">
           <div class="col-md-12">
              <div class="col-md-12">
                <form method="post">

                    <div class="col-md-12 inline-flex">
                        <a href="<?=base_url().'admin/themes/addBanner/'?>">
                            <button type="button" class="btn btn-primary">Thêm banner</button>
                        </a>
                    </div>
                    <table class="datatable table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Banner</th>
                                <th>Hiển thị</th>
                                <th style="width: 11%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($list_slide as $item){ 
                                ?>
                                <tr>
                                   <td><?=$item['slide_title']?></td>
                                   <td><img src="<?=resizeImg($item['slide_img'],80,50,0)?>" style="max-height: 90px;"></td>
                                   <td><input onchange="setCkb(this,'slide_active',<?=$item['slide_id']?>)" type="checkbox" <?=$item['slide_active']==1 ? 'checked':''?> ></td>
                                   <td>
                                        <a href="<?=base_url().'admin/themes/editBanner/'.$item['slide_id']?>">
                                            <button type="button" class="btn btn-default">
                                                <span class="fa fa-eye"></span>
                                            </button>
                                        </a>


                                        <button onclick="onDelete(<?=$item['slide_id']?>)" type="button" class="btn btn-default">
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
    function setCkb(ckb,colset,slide_id){
        ckb = ckb.checked;
        ckb = ckb==true ? 1:0;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/themes/updateBanner')?>",
            data: {'slide_id':slide_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }

    function onDelete(slide_id){
        var slide_id = slide_id;
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
                    url: "<?=base_url('admin/themes/destroyBanner')?>",
                    data: {'slide_id':slide_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>