<div class="container-fluid">
     <div class="row">
           <div class="col-md-12">
              <div class="col-md-12">
                <form method="post">
                    
                
            <table class="datatable table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Họ tên</th>
                        <th>Địa chỉ email</th>
                        <th>Số điện thoại</th>
                        <th>Nhân viên phụ trách</th>
                        <th>Trạng thái</th>
                        <th style="width: 11%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($list_contact as $item){ 
                        $info_staff = $this->Staff_M->find_row(['staff_id'=>$item['contact_to_staff']]);
                        $date_time_format = date('d-m-Y H:i:s', strtotime($item['created_at']));
                        if ($item['contact_status'] ==1) {
                        	$status = 'Đã xem';
                        }else{
                        	$status = 'Chưa xem';
                        }
                    ?>
                        <tr>
                             <td><?=$date_time_format?></td>
                             <td><?=$item['contact_name']?></td>
                             <td><?=$item['contact_email']?></td>
                             <td><?=$item['contact_phone']?></td>
                             <td><?=$info_staff['staff_name']?></td>
                             <td><?=$status?></td>
                             <td>
                                <a href="<?=base_url().'admin/contact/details/'.$item['contact_id']?>">
                                    <button type="button" class="btn btn-default">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </a>
                               
                                 
                                 <button onclick="onDelete(<?=$item['contact_id']?>)" type="button" class="btn btn-default">
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
    // function setCkb(ckb,colset,post_id){
    //     ckb = ckb.checked;
    //     ckb = ckb==true ? 1:0;
    //     colset = colset.toString();
    //     $.ajax({
    //         type: "post",
    //         url: "<?=base_url('admin/post/update')?>",
    //         data: {'post_id':post_id,[colset]:ckb},
    //         success: function (response) {
                
    //         }
    //     });
    // }

    function onDelete(contact_id){
        var contact_id = contact_id;
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
                    url: "<?=base_url('admin/contact/destroy')?>",
                    data: {'contact_id':contact_id},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
</script>