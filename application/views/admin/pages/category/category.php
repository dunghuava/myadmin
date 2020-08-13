<style>
    .table td{
        padding:5px 4px;
    }
</style>
<div class="col-md-12">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="width: 9%">STT</th>
                <th>Tên danh mục</th>
                <th style="width:10%">Hình ảnh</th>
                <th>Loại</th>
                <th style="width: 5%">Menu</th>
                <th style="width: 10%">Hiển thị</th>
                <th style="width: 10%">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($arr_category as $val){
                    $str='<span class="fa fa-caret-right"></span>';
                    include ('item_table_row.php');
                    $sub = $this->Category_M->all(['cate_parent_id'=>$val['cate_id']]);
                    if (count($sub)>0){
                        foreach ($sub as $val){
                            $str='|____';
                            include ('item_table_row.php');
                            $sub1 = $this->Category_M->all(['cate_parent_id'=>$val['cate_id']]);
                            if (count($sub1)>0){
                                foreach ($sub1 as $val){
                                    $str='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|____';
                                    include ('item_table_row.php');
                                    $sub2 = $this->Category_M->all(['cate_parent_id'=>$val['cate_id']]);
                                    if (count($sub2)>0){
                                        foreach ($sub2 as $val){
                                            $str='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|____';
                                            include ('item_table_row.php');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<script>
    function onDeleteImg(cate_id,cate_img){
        Swal.fire({
            title: 'Bạn có muốn xóa mục này?',
            text: "Dữ liệu đã xóa sẽ không thể phục hồi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText:'Hủy',
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?=base_url('admin/category/delimg')?>",
                    data: {'cate_id':cate_id,'cate_img':cate_img},
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });
    }
    function setCkb(ckb,colset,cate_id){
        ckb = ckb.checked;
        ckb = ckb==true ? 1:0;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/category/update')?>",
            data: {'cate_id':cate_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }

    function setStt(ckb,colset,cate_id){
        ckb = ckb.value;
        colset = colset.toString();
        $.ajax({
            type: "post",
            url: "<?=base_url('admin/category/update')?>",
            data: {'cate_id':cate_id,[colset]:ckb},
            success: function (response) {
                
            }
        });
    }

    function onDelete(cate_id){
        var cate_id = cate_id;
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
                // $.ajax({
                //     type: "post",
                //     url: "<?=base_url('admin/category/destroy')?>",
                //     data: {'cate_id':cate_id},
                //     success: function (response) {
                //         location.reload();
                //     }
                // });
            }
        });
    }
</script>