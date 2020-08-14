<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <?php 
            if ($category['cate_img']!=''){
        ?>
            <div id="wrp_img" class="col-md-8 inline-flex">
                <label for=""></label>
                <p>
                    <img onclick="onDeleteImg(<?=$category['cate_id']?>,'<?=$category['cate_img']?>')" style="width:100px;cursor:pointer" src="<?=base_url('upload/images/'.$category['cate_img'])?>" title="Bấm vào hình để xóa">
                </p>
            </div>
        <?php 
            } 
        ?>
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh</label>
            <input type="file" name="cate_img" id="cate_img" class="">
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Danh mục</label>
            <select name="cate_parent_id" id="cate_parent_id" class="form-control">
                <option value="0">Đặt làm danh mục cha</option>
                <?=$arr_category?>
            </select>
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Module</label>
            <select name="cate_module_id" id="cate_module_id" class="form-control" required>
                <option value="">Chọn loại module</option>
                <?php foreach ($arr_module as $value){ ?>
                    <option value="<?=$value['module_id']?>"><?=$value['module_title']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input value="<?=$category['cate_title']?>" onkeyup="addText(this,'#cate_alias')" required type="text" name="cate_title" id="cate_title" class="form-control">
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input value="<?=$category['cate_alias']?>" type="text" name="cate_alias" id="cate_alias" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>
        <div class="col-md-12 inline-flex">
            <label for="">Nội dung</label>
            <textarea name="cate_content" id="cate_content" cols="30" rows="5" class="form-control html_editor"><?=$category['cate_content']?></textarea>
        </div> 
        <div class="col-md-8 inline-flex">
            <label for="">Keywords</label>
            <input value="<?=$category['cate_keyword']?>" type="text" name="cate_keyword" id="cate_keyword" class="form-control">
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Descriptions</label>
            <textarea name="cate_description" id="cate_description" cols="30" rows="3" class="form-control"><?=$category['cate_description']?></textarea>
        </div> <br><br>
        <div class="col-md-6 inline-flex">
            <label for=""></label>
            <button type="reset" class="btn btn-danger">Nhập lại</button>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </div>
    </form>
    <br><br>
</div>

<script>
    $('#cate_module_id').val(<?=$category['cate_module_id']?>);
    $('#cate_parent_id').val(<?=$category['cate_parent_id']?>);
    function addText(e,target){
        var val = make_alias(e.value);
        $(target).val(val);
    }
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
                        $('#wrp_img').remove();
                    }
                });
            }
        });
    }
</script>