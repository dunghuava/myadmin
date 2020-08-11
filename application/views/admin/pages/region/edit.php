<style type="text/css">
	.inline-flex label {
    	min-width: 120px;
	}

	img{
		max-width: 200px;
		max-height: 200px;
	}
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh</label>
            <input type="file" name="region_img" id="region_img" class="">
        </div>

        <div class="col-md-8 inline-flex" id="div_image">
            <label for=""></label>
            <img src="<?=base_url().'upload/images/'.$info_region['region_img']?>" onclick="onDelete()" title="Bấm vào đây để xóa" style="cursor: pointer;">
        </div>

        <div class="col-md-8 inline-flex" >
            <label for="">Loại dự án</label>
            <select name="region_category" id="region_category" class="form-control" required>
            	<option value="">chọn loại dự án</option>
            	<?php foreach ($list_category as $key => $category) {
            		if ($info_region['region_category'] == $category['cate_id']) {
            			$selected_category = 'selected';
            		}else{
            			$selected_category = '';
            		}
            		echo '<option value="'.$category['cate_id'].'" '.$selected_category.'>'.$category['cate_title'].'</option>';
            	} ?>
            </select>
        </div>
        <div class="col-md-8 inline-flex" >
            <label for="">khu vực hiển thị</label>
            <select name="region_id_district" id="region_id_district" class="form-control" required>
            	<option value="">chọn khu vực</option>
            	<?php foreach ($list_district as $district) {
            		if ($info_region['region_id_district'] == $district['district_id']) {
            			$selected_district = 'selected';
            		}else{
            			$selected_district = '';
            		}
            		echo '<option value="'.$district['district_id'].'" '.$selected_district.'>'.$district['district_name'].'</option>';
            	} ?>
            </select>
        </div>
       

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <?php  
            	if ($info_region['region_active'] == 1) {
            		$checked = 'checked';
            	}else{
            		$checked = '';
            	}
            ?>
            <input type="checkbox" name="region_active" id="region_active" value="1" <?php echo $checked ?> style="margin-top: 12px;">
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

  function onDelete(){
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
            	$('#div_image').css("display","none");
            	$('#region_img').attr("required","required");
            }
        });
    }
</script>