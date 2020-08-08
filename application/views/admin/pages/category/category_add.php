<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh</label>
            <input required type="file" name="cate_img" id="cate_img" class="">
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Danh mục</label>
            <select name="cate_parent_id" id="cate_parent_id" class="form-control">
                <option value="0">Đặt làm danh mục cha</option>
            </select>
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Module</label>
            <select name="cate_module_id" id="cate_module_id" class="form-control">
                <option value="0">Chọn module hiển thị</option>
                <?php foreach ($arr_module as $value){ ?>
                    <option value="<?=$value['module_id']?>"><?=$value['module_title']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input onkeyup="addText(this,'#cate_alias')" required type="text" name="cate_title" id="cate_title" class="form-control">
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="cate_alias" id="cate_alias" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>
        <div class="col-md-12 inline-flex">
            <label for="">Nội dung</label>
            <textarea name="cate_content" id="cate_content" cols="30" rows="5" class="form-control html_editor"></textarea>
        </div> 
        <div class="col-md-8 inline-flex">
            <label for="">Keyword</label>
            <input required type="text" name="cate_title" id="cate_title" class="form-control">
        </div>
        <div class="col-md-8 inline-flex">
            <label for="">Mô tả</label>
            <textarea name="cate_content" id="cate_content" cols="30" rows="3" class="form-control"></textarea>
        </div>       
        <div class="col-md-6 inline-flex">
            <label for=""></label>
            <button type="reset" class="btn btn-danger">Nhập lại</button>
            <button type="submit" class="btn btn-primary">Công khai</button>
        </div>
    </form>
    <br><br>
</div>

<script>
    function addText(e,target){
        var val = make_alias(e.value);
        $(target).val(val);
    }
</script>