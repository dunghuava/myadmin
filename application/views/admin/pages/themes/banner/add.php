<style type="text/css">
	.inline-flex label {
    	min-width: 120px;
	}
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh</label>
            <input required type="file" name="slide_img" id="slide_img" class="">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input type="text" name="slide_title" id="slide_title" class="form-control">
        </div>

        <!-- <div class="col-md-8 inline-flex">
            <label for="">Url</label>
            <input type="text" name="post_alias" id="post_alias" class="form-control" placeholder="Khi bấm vào banner sẽ chuyến tiếp đến ">
        </div> -->

        <!-- <div class="col-md-8 inline-flex">
            <label for="">Mô tả</label>
            <textarea name="post_introduce" id="post_introduce" cols="30" rows="3" class="form-control"></textarea>
        </div>   

        <div class="col-md-12 inline-flex">
            <label for="">Nội dung</label>
            <textarea name="post_content" id="post_content" cols="30" rows="5" class="form-control html_editor"></textarea>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="post_keyword" id="post_keyword" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="post_description" id="post_description" cols="30" rows="3" class="form-control"></textarea>
        </div>   -->

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <input type="checkbox" name="slide_active" id="slide_active" value="1" style="margin-top: 12px;" checked>
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

  //   function clear_form_elements() {
  //   $('#add_post').find('input:text').attr('value','');
  //   $('#add_post').find('select > option').removeAttr('selected');
  // }
</script>