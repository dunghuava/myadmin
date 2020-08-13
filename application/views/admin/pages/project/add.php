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
            <input required type="file" name="project_img" id="project_img" class="">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh chi tiết</label>
            <input required type="file" name="project_images[]" id="project_images" class="" multiple="multiple">
        </div>

        <div class="col-md-8 inline-flex" >
            <label for="">Danh mục</label>
            <select name="project_category" id="project_category" class="form-control" required>
            	<option value="">chọn loại danh mục</option>
            	<?php echo $list_category; ?>
            </select>
        </div>

        <div class="col-md-8 inline-flex" >
            <label for="">Loại</label>
            <select name="project_kind" id="project_kind" class="form-control" required>
                <option value="">chọn loại</option>
                <option value="0">Dự án</option>
                <option value="1">Mua</option>
                <option value="2">Cho thuê</option>
            </select>
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input onkeyup="addText(this,'#project_alias')" required type="text" name="project_title" id="project_title" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="project_alias" id="project_alias" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>


        <div class="col-md-8" style="display: block;">
            <label for="">Tổng quang dự án</label>
            <br>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Trạng thái</label>
            	<select name="project_status" id="project_status" class="form-control" required>
            		<option value="">Chọn trạng thái</option>
            		<?php foreach ($list_status as $status) {
            			echo '<option value="'.$status['id_status_project'].'">'.$status['status_project'].'</option>';
            		} ?>
            	</select>
            </div>

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Loại hình</label>
            	<select name="project_type" id="project_type" class="form-control">
            		<option value="">Chọn loại hình</option>
            		<?php foreach ($list_type as $type) {
            			echo '<option value="'.$type['id_type_project'].'">'.$type['type_project'].'</option>';
            		} ?>
            	</select>
            </div>

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Diện tích (m²)</label>
            	<input type="number" name="project_acreage" id="project_acreage" class="form-control" placeholder="" required>
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Giá</label>
            	<input type="text" name="project_price" id="project_price" class="form-control" placeholder="" required>
            </div>
             <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số phòng ngủ</label>
            	<input type="number" name="number_bedroom" id="number_bedroom" class="form-control" placeholder="">
            </div>
             <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số tolet</label>
            	<input type="number" name="number_tolet" id="number_tolet" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số tầng</label>
            	<input type="number" name="number_floors" id="number_floors" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số căn</label>
            	<input type="number" name="number_units" id="number_units" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            	<label for="" style="margin-left: 113px">Số block</label>
            	<input type="number" name="number_blocks" id="number_blocks" class="form-control" placeholder="">
            </div>
            
            
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Mô tả</label>
            <textarea name="project_introduce" id="project_introduce" cols="30" rows="3" class="form-control" required></textarea>
        </div>   

        <div class="col-md-12 inline-flex">
            <label for="">Nội dung</label>
            <textarea name="project_content" id="project_content" cols="30" rows="5" class="form-control html_editor" required></textarea>
        </div> 

         <div class="col-md-8 inline-flex">
            <label for="">Tiện ích</label>
            <select name="project_extension[]" id="project_extension" class="form-control select2" required multiple="multiple">
            	<?php foreach ($list_extension as $extension) {
            		echo '<option value="'.$extension['extension_id'].'">'.$extension['extension_name'].'</option>';
            	} ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Nội thất</label>
            <select name="project_furniture[]" id="project_furniture" class="form-control select2" required multiple="multiple">
            	<?php foreach ($list_furniture as $furniture) {
            		echo '<option value="'.$furniture['id_furniture_project'].'">'.$furniture['furniture_project'].'</option>';
            	} ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Chủ đầu tư</label>
            <select name="project_investor" id="project_investor" class="form-control" >
            	<option value="">Chọn chủ đầu tư</option>
            	<?php foreach ($list_investor as $investor) {
            		echo '<option value="'.$investor['investor_id'].'">'.$investor['investor_title'].'</option>';
            	} ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Khu dân cư</label>
            <select name="project_residential" id="project_residential" class="form-control">
            	<option value="">Chọn khu dân cư</option>
            	<?php foreach ($list_residential as $residential) {
            		echo '<option value="'.$residential['residential_id'].'">'.$residential['residential_title'].'</option>';
            	} ?>
            </select>
        </div> 


        <div class="col-md-8 inline-flex">
            <label for="">Địa chỉ</label>
            <input type="text" name="project_address" id="project_address" class="form-control" value="" required>
            
        </div>  

            <div class="col-md-12 inline-flex" >
            	<label for=""></label>
            	<select name="project_province_id" id="project_province_id" class="form-control" required>
            	    <option value="">Chọn Thành Phố - Tỉnh</option>
            	    <?php foreach ($list_province as $province) {
            			echo '<option value="'.$province['province_id'].'">'.$province['province_name'].'</option>';
            		} ?>
            	</select>
            	<select name="project_district_id" id="project_district_id" class="form-control" required>
            	    <option value="">Chọn Quận - Huyện</option>
            	</select>
            	<select name="project_ward_id" id="project_ward_id" class="form-control" required>
            	    <option value="">Chọn Phường - Xã</option>
            	</select>
            </div>


        <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="project_keyword" id="project_keyword" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="project_description" id="project_description" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <input type="checkbox" name="project_active" id="project_active" value="1" style="margin-top: 12px;" checked>
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

  $('#project_province_id').change(function (e) { 
		var district_id = '';
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?=base_url('admin/project/getListDistrict_byProvince')?>",
				data: {'district_id':district_id,'province_id':$(this).val()},
				success: function (response) {
					$('#project_district_id').html(response);
					$('#project_district_id').trigger('change');
				}
			});
		});


	$('#project_district_id').change(function (e) { 
		var ward_id = '';
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?=base_url('admin/project/getListWard_byDistrict')?>",
				data: {'ward_id':ward_id,'district_id':$(this).val()},
				success: function (response) {
					$('#project_ward_id').html(response);
				}
			});
		});
</script>