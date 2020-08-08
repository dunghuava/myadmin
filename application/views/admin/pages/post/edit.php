<style type="text/css">
	.inline-flex label {
    	min-width: 120px;
	}
	img{
		max-width: 300px;
	}
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh</label>
            <input type="file" name="post_img" id="post_img" class="">
            
        </div>

        <div class="col-md-8 inline-flex" id="div_image">
            <label for=""></label>
            <img src="<?=base_url().'upload/images/'.$info_post['post_img']?>" onclick="onDelete()" title="Bấm vào đây để xóa" style="cursor: pointer;">
            	
            

        </div>

        <div class="col-md-8 inline-flex" >
            <label for="">Loại bài viết</label>
            <select name="post_category_id" id="post_category_id" class="form-control" required>
            	<option value="">chọn loại bài viết</option>
            	<?php foreach ($list_category as $key => $category) {
            		if ($info_post['post_category_id'] == $category['cate_id']) {
            			$selected = 'selected';
            		}else{
            			$selected = '';
            		}
            		echo '<option value="'.$category['cate_id'].'"  '.$selected.'>'.$category['cate_title'].'</option>';
            	} ?>
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
            <input onkeyup="addText(this,'#post_alias')" required type="text" name="post_title" id="post_title" value="<?php echo $info_post['post_title'] ?>" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="post_alias" id="post_alias" value="<?php echo $info_post['post_alias'] ?>" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Mô tả</label>
            <textarea name="post_introduce" id="post_introduce" cols="30" rows="3" class="form-control"><?php echo $info_post['post_introduce'] ?></textarea>
        </div>   

        <div class="col-md-12 inline-flex">
            <label for="">Nội dung</label>
            <textarea name="post_content" id="post_content" cols="30" rows="5" class="form-control html_editor"><?php echo $info_post['post_content'] ?></textarea>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="post_keyword" id="post_keyword" cols="30" rows="3" value="<?php echo $info_post['post_keyword'] ?>" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="post_description" id="post_description" cols="30" rows="3" value="<?php echo $info_post['post_description'] ?>" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <?php if ($info_post['post_active'] == 1) {
            		$checked = 'checked';
            	}else{
            		$checked = '';
            	} 
            ?>
            <input type="checkbox" name="post_active" id="post_active" value="1" style="margin-top: 12px;" <?php echo $checked; ?>>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Hẹn ngày đăng</label>
            <?php  
            	$date_post = substr($info_post['post_date_time'],  0, 8);
                $date_post_format = date('d-m-Y', strtotime($date_post));

                // print_r($date_post);
            ?>
            <input type="text" name="date_post" id="date_post" class="form-control datepicker" value="<?php echo $date_post_format ?>" placeholder="Chọn ngày đăng" required>
            <select name="time_post" id="time_post" class="form-control">
                <option value="00">Chọn giờ</option>
                <?php for ($i=1; $i <24 ; $i++) { 
                	$time_post = substr($info_post['post_date_time'],  8, 2);
                	if ($i<10) {
                		$i = '0'.$i;
                	}

                	if ($time_post == $i) {
                		$selected_time = 'selected';
                	}else{
                		$selected_time = '';
                	}
                	echo '<option value="'.$i.'" '.$selected_time.'>'.$i.':00</option>';
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

    function onDelete(cate_id){
        var cate_id = cate_id;
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
            	$('#post_img').attr("required","required");
                // $.ajax({
                //     type: "post",
                //     url: "<?=base_url('admin/category/destroy')?>",
                //     data: {'cate_id':cate_id},
                //     success: function (response) {
                //         location.reload();
                //     }
                // });
            }
        });
        }

  //   function clear_form_elements() {
  //   $('#add_post').find('input:text').attr('value','');
  //   $('#add_post').find('select > option').removeAttr('selected');
  // }
</script>