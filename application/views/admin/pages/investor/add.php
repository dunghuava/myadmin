<style type="text/css">
	.inline-flex label {
    	min-width: 145px;
	}

	.select2-selection__choice{
		color: black!important;
	}
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh đại hiện</label>
            <input required type="file" name="investor_img" id="investor_img" class="">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input onkeyup="addText(this,'#investor_alias')" required type="text" name="investor_title" id="investor_title" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="investor_alias" id="investor_alias" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Tên chủ đầu tư</label>
            <input type="text" name="investor_name" id="investor_name" class="form-control" required>
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Thành lập</label>
            <input type="text" name="investor_establish" id="investor_establish" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Địa chỉ</label>
            <input type="text" name="investor_address" id="investor_address" class="form-control">
        </div>   

        <div class="col-md-8 inline-flex">
            <label for="">Website</label>
            <input type="text" name="investor_website" id="investor_website" class="form-control">
        </div> 

        <div class="col-md-12 inline-flex">
            <label for="">Giới thiệu</label>
            <textarea name="investor_introduce" id="investor_introduce" cols="30" rows="5" class="form-control html_editor" required></textarea>
        </div> 


        <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="investor_keyword" id="investor_keyword" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="investor_description" id="investor_description" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <input type="checkbox" name="investor_active" id="investor_active" value="1" style="margin-top: 12px;" checked>
        </div> 

        
        <br>
        <br>
        <div class="col-md-6 inline-flex">
            <label for=""></label>
            <button type="reset" class="btn btn-danger">Xóa</button>
            <button type="submit" class="btn btn-primary">Lưu</button>
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