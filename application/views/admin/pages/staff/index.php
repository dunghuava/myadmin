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
                        <th>Hình ảnh</th>
                        <th>Chức danh</th>
                        <th>Số điện thoại</th>
                        <th>Hiển thị</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_staff as $item){ ?>
                        <tr>
                             <td><?=$item['staff_name']?></td>
                             <td><img src="<?=resizeImg($item['staff_img'],80,50,0)?>" style="max-height: 90px;"></td>
                             <td><?=$item['staff_position']?></td>
                             <td><?=$item['staff_phone']?></td>
                             <td><input onchange="setCkb(this,'staff_active',<?=$item['staff_id']?>)" type="checkbox" <?=$item['staff_active']==1 ? 'checked':''?> ></td>
                             <td>
                                <a href="<?=base_url().'admin/staff/edit/'.$item['staff_id']?>">
                                    <button type="button" class="btn btn-default">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </a>
                                 <button onclick="onDelete(<?=$item['staff_id']?>)" class="btn btn-default">
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


    function setCkb(ckb,colset,staff_id){
        ckb = ckb.checked;
        ckb = ckb==true ? 1:0;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/staff/update')?>",
            data: {'staff_id':staff_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }
    
    function onDelete(staff_id){
        var staff_id = staff_id;
        Swal.fire({
            title: 'Bạn có muốn xóa mục này?',
            text: "Dữ liệu đã xóa sẽ không thể phục hồi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Xóa'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?=base_url('admin/staff/destroy')?>",
                    data: {'staff_id':staff_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>