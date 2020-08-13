<style type="text/css">
	.inline-flex label {
    	min-width: 145px;
	}

	.select2-selection__choice{
		color: black!important;
	}

    img{
        max-width: 200px;
        max-height: 200px;
    }
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh đại hiện</label>
            <input type="file" name="residential_img" id="residential_img" class="">
        </div>

        <div class="col-md-8 inline-flex" id="div_img">
            <label for=""></label>
            <img src="<?=base_url().'upload/images/'.$info_residential['residential_img']?>" onclick="onDelete('img')" title="Bấm vào đây để xóa" style="cursor: pointer;">
        </div>


        <!-- <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh banner</label>
            <input type="file" name="residential_banner" id="residential_banner" class="">
        </div> -->

        <div class="col-md-8 inline-flex" id="div_banner">
            <label for=""></label>
            <img src="<?=base_url().'upload/images/'.$info_residential['residential_banner']?>" onclick="onDelete('banner')" title="Bấm vào đây để xóa" style="cursor: pointer;">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input onkeyup="addText(this,'#residential_alias')" required type="text" name="residential_title" id="residential_title" value="<?php echo $info_residential['residential_title'] ?>" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="residential_alias" id="residential_alias" class="form-control" value="<?php echo $info_residential['residential_alias'] ?>" placeholder="Tạo đường dẫn tự động">
        </div>

        <div class="col-md-12 inline-flex" >
            <label for="">Vị trí</label>
            <select name="residential_province_id" id="residential_province_id" class="form-control" required>
                <option value="">Chọn Thành Phố - Tỉnh</option>
                <?php foreach ($list_province as $province) {
                    if ($province['province_id'] == $info_residential['residential_province_id']) {
                        $selected_province = 'selected';
                    }else{
                        $selected_province = '';
                    }
                    echo '<option value="'.$province['province_id'].'" '.$selected_province.'>'.$province['province_name'].'</option>';
                } ?>
            </select>
            <select name="residential_district_id" id="residential_district_id" class="form-control" required>
                <option value="">Chọn Quận - Huyện</option>
            </select>
            <select name="residential_ward_id" id="residential_ward_id" class="form-control">
                <option value="">Chọn Phường - Xã</option>
            </select>
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Mô tả</label>
            <textarea name="residential_introduce" id="residential_introduce" cols="30" rows="3" class="form-control" required><?php echo $info_residential['residential_introduce'] ?></textarea>
        </div>   

        <div class="col-md-12 inline-flex">
            <label for="">Nội dung</label>
            <textarea name="residential_content" id="residential_content" cols="30" rows="5" class="form-control html_editor" required><?php echo $info_residential['residential_content'] ?></textarea>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Tag</label>
            <select name="residential_tag[]" id="residential_tag" class="form-control select2 tags-field" multiple="multiple">
                <?php
                    $residential_tag = explode(',',$info_residential['residential_tag']);
                    foreach ($residential_tag as $tag){
                        if ($tag!=''){
                ?>
                        <option selected value="<?=$tag?>"><?=$tag?></option>
                <?php 
                        }
                    }
                ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Môi trường sống</label>
            <textarea name="residential_habitat" id="residential_habitat" cols="30" rows="3" class="form-control" placeholder="Mô tả môi trường sống" required><?php echo $info_residential['residential_habitat'] ?></textarea>
        </div> 
        <div class="col-md-8 inline-flex">
            <label for="">Cộng đồng dân cư</label>
            <textarea name="residential_community" id="residential_community" cols="30" rows="3" class="form-control" placeholder="Mô tả cộng đồng dân cư" required><?php echo $info_residential['residential_community'] ?></textarea>
        </div> 
        <div class="col-md-8 inline-flex">
            <label for="">Tiện ích nổi bật</label>
            <textarea name="residential_utility" id="residential_utility" cols="30" rows="3" class="form-control" placeholder="Mô tả tiện ích nổi bật" required><?php echo $info_residential['residential_utility'] ?></textarea>
        </div> 
        <div class="col-md-8 inline-flex">
            <label for="">Hiện trạng giao thông</label>
            <textarea name="residential_traffic" id="residential_traffic" cols="30" rows="3" class="form-control" placeholder="Mô tả hiện trạng giao thông" required><?php echo $info_residential['residential_traffic'] ?></textarea>
        </div> 


        <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="residential_keyword" id="residential_keyword" cols="30" rows="3" class="form-control"><?php echo $info_residential['residential_keyword'] ?></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="residential_description" id="residential_description" cols="30" rows="3" class="form-control"><?php echo $info_residential['residential_description'] ?></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>

            <?php if ($info_residential['residential_active'] == 1) {
                    $checked = 'checked';
                }else{
                    $checked = '';
                } 
            ?>

            <input type="checkbox" name="residential_active" id="residential_active" value="1" style="margin-top: 12px;" <?php echo $checked ?>>
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

    var province_id = $('#residential_province_id').val();
    var district_id ='<?php echo $info_residential['residential_district_id'] ?>';
    var ward_id ='<?php echo $info_residential['residential_ward_id'] ?>';
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/project/getListDistrict_byProvince')?>",
        data: {'province_id':province_id,'district_id':district_id},
        success: function (response) {
            $('#residential_district_id').html(response);
        }
    });

    $.ajax({
        type: "post",
        url: "<?=base_url('admin/project/getListWard_byDistrict')?>",
        data: {'district_id':district_id,'ward_id':ward_id},
        success: function (response) {
            $('#residential_ward_id').html(response);
        }
    });


  $('#residential_province_id').change(function (e) { 
		var district_id = '';
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?=base_url('admin/project/getListDistrict_byProvince')?>",
				data: {'district_id':district_id,'province_id':$(this).val()},
				success: function (response) {
					$('#residential_district_id').html(response);
					$('#residential_district_id').trigger('change');
				}
			});
		});


	$('#residential_district_id').change(function (e) { 
		var ward_id = '';
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?=base_url('admin/project/getListWard_byDistrict')?>",
				data: {'ward_id':ward_id,'district_id':$(this).val()},
				success: function (response) {
					$('#residential_ward_id').html(response);
				}
			});
		});


    function onDelete(img){
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
                $('#div_'+img).css("display","none");
                $('#residential_'+img).attr("required","required");
            }
        });
    }
</script>