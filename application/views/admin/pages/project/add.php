<style type="text/css">
	.inline-flex label {
    	min-width: 120px;
	}

	.select2-selection__choice{
		color: black!important;
	}
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh đại hiện</label>
            <input required type="file" name="post_img" id="post_img" class="">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh chi tiết</label>
            <input required type="file" name="post_img" id="post_img" class="">
        </div>

        <div class="col-md-8 inline-flex" >
            <label for="">Loại dự án</label>
            <select name="post_category_id" id="post_category_id" class="form-control" required>
            	<option value="">chọn loại dự án</option>
            	<?php foreach ($list_category as $key => $category) {
            		echo '<option value="'.$category['cate_id'].'">'.$category['cate_title'].'</option>';
            	} ?>
            </select>
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input onkeyup="addText(this,'#post_alias')" required type="text" name="post_title" id="post_title" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="post_alias" id="post_alias" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>


        <div class="col-md-8" style="display: block;">
            <label for="">Tổng quang dự án</label>
            <br>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Trạng thái</label>
            	<select name="post_category_id" id="post_category_id" class="form-control" required>
            		<option value="">Chọn trạng thái</option>
            		<?php foreach ($list_status as $status) {
            			echo '<option value="'.$status['id_status_project'].'">'.$status['status_project'].'</option>';
            		} ?>
            	</select>
            </div>

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Loại hình</label>
            	<select name="post_category_id" id="post_category_id" class="form-control" required>
            		<option value="">Chọn loại hình</option>
            		<?php foreach ($list_type as $type) {
            			echo '<option value="'.$type['id_type_project'].'">'.$type['type_project'].'</option>';
            		} ?>
            	</select>
            </div>

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Diện tích</label>
            	<input type="text" name="post_alias" id="post_alias" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Giá</label>
            	<input type="text" name="post_alias" id="post_alias" class="form-control" placeholder="">
            </div>
             <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số phòng ngủ</label>
            	<input type="number" name="post_alias" id="post_alias" class="form-control" placeholder="">
            </div>
             <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số tolet</label>
            	<input type="number" name="post_alias" id="post_alias" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số tầng</label>
            	<input type="number" name="post_alias" id="post_alias" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số căn</label>
            	<input type="number" name="post_alias" id="post_alias" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số block</label>
            	<input type="number" name="post_alias" id="post_alias" class="form-control" placeholder="">
            </div>
            
            
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
            <label for="">Tiện ích</label>
            <select name="" id="" class="form-control select2" required multiple="multiple">
            	<?php foreach ($list_extension as $extension) {
            		echo '<option value="'.$extension['extension_id'].'">'.$extension['extension_name'].'</option>';
            	} ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Nội thất</label>
            <select name="post_category_id" id="post_category_id" class="form-control select2" required multiple="multiple">
            	<?php foreach ($list_furniture as $furniture) {
            		echo '<option value="'.$furniture['id_furniture_project'].'">'.$furniture['furniture_project'].'</option>';
            	} ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Chủ đầu tư</label>
            <select name="post_category_id" id="post_category_id" class="form-control" required>
            	<option value="">Chọn chủ đầu tư</option>
            	<?php foreach ($list_investor as $investor) {
            		echo '<option value="'.$investor['investor_id'].'">'.$investor['investor_title'].'</option>';
            	} ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Khu dân cư</label>
            <select name="post_category_id" id="post_category_id" class="form-control" required>
            	<option value="">Chọn khu dân cư</option>
            	<?php foreach ($list_residential as $residential) {
            		echo '<option value="'.$residential['residential_id'].'">'.$residential['residential_title'].'</option>';
            	} ?>
            </select>
        </div> 


        <div class="col-md-8 inline-flex">
            <label for="">Địa chỉ</label>
            <input type="text" name="date_post" id="date_post" class="form-control" value="" required>
            
        </div>  

            <div class="col-md-12 inline-flex" >
            	<label for=""></label>
            	<select name="time_post" id="time_post" class="form-control">
            	    <option value="00">Chọn Thành Phố - Tỉnh</option>
            	    <?php foreach ($list_province as $province) {
            			echo '<option value="'.$province['province_id'].'">'.$province['province_name'].'</option>';
            		} ?>
            	</select>
            	<select name="time_post" id="time_post" class="form-control">
            	    <option value="00">Chọn Quận - Huyện</option>
            	</select>
            	<select name="time_post" id="time_post" class="form-control">
            	    <option value="00">Chọn Phường - Xã</option>
            	</select>
            </div>


        <!-- <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="post_keyword" id="post_keyword" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="post_description" id="post_description" cols="30" rows="3" class="form-control"></textarea>
        </div>   -->

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <input type="checkbox" name="post_active" id="post_active" value="1" style="margin-top: 12px;" checked>
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

    // $(document).ready(function () {
    //     $('.select2').select2();
    //     $(".tags-field").select2({
    //         tokenSeparators: [','],
    //         tags: true,
    //     });
    //     $('input').attr('autocomplete','off');
    // });

  //   function clear_form_elements() {
  //   $('#add_post').find('input:text').attr('value','');
  //   $('#add_post').find('select > option').removeAttr('selected');
  // }
</script>