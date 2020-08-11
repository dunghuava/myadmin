<style type="text/css">
	.inline-flex label {
    	min-width: 120px;
	}
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh</label>
            <input required type="file" name="region_img" id="region_img" class="">
        </div>

        <div class="col-md-8 inline-flex" >
            <label for="">Loại dự án</label>
            <select name="region_category" id="region_category" class="form-control" required>
            	<option value="">chọn loại dự án</option>
            	<?php foreach ($list_category as $key => $category) {
            		echo '<option value="'.$category['cate_id'].'">'.$category['cate_title'].'</option>';
            	} ?>
            </select>
        </div>
        <div class="col-md-8 inline-flex" >
            <label for="">khu vực hiển thị</label>
            <select name="region_id_district" id="region_id_district" class="form-control" required>
            	<option value="">chọn khu vực</option>
            	<?php foreach ($list_district as $district) {
            		echo '<option value="'.$district['district_id'].'">'.$district['district_name'].'</option>';
            	} ?>
            </select>
        </div>
       

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <input type="checkbox" name="region_active" id="region_active" value="1" style="margin-top: 12px;" checked>
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