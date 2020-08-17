<style type="text/css">
	.inline-flex label {
    	min-width: 120px;
	}
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh</label>
            <input required type="file" name="post_img" id="post_img" class="">
        </div>

        <div class="col-md-8 inline-flex" >
            <label for="">Loại bài viết</label>
            <select name="post_category_id" id="post_category_id" class="form-control" required>
            	<option value="">chọn loại bài viết</option>
            	<?php echo $list_category;?>
            </select>
        </div>
        <!-- <div class="col-md-8 inline-flex">
            <label for="">Module</label>
            <select name="cate_module_id" id="cate_module_id" class="form-control">
                <option value="0">Chọn module hiển thị</option>
                <?php foreach ($arr_module as $value){ ?>
                    <option value="<?=$value['module_id']?>"><?=$value['module_title']?></option>
                <?php } ?>
            </select>
        </div> -->
        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input onkeyup="addText(this,'#post_alias')" required type="text" name="post_title" id="post_title" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="post_alias" id="post_alias" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Mô tả</label>
            <textarea name="post_introduce" id="post_introduce" cols="30" rows="3" class="form-control"></textarea>
        </div>   

        <div class="col-md-12 inline-flex">
            <label for="">Nội dung</label>
            <textarea name="post_content" id="post_content" cols="30" rows="5" class="form-control html_editor"></textarea>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Nguồn</label>
            <textarea name="post_author" id="post_author" cols="30" rows="3" class="form-control"></textarea>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="post_keyword" id="post_keyword" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="post_description" id="post_description" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <input type="checkbox" name="post_active" id="post_active" value="1" style="margin-top: 12px;" checked>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Hẹn ngày đăng</label>
            <?php  
            	$date_now = date('d-m-Y');
            ?>
            <input type="text" name="date_post" id="date_post" class="form-control datepicker" value="<?php echo $date_now ?>" placeholder="Chọn ngày đăng" required>
            <select name="time_post" id="time_post" class="form-control">
                <option value="00">Chọn giờ</option>
                <?php for ($i=1; $i <24 ; $i++) { 
                	if ($i<10) {
                		$i = '0'.$i;
                	}
                	echo '<option value="'.$i.'">'.$i.':00</option>';
                } ?>
            </select>
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