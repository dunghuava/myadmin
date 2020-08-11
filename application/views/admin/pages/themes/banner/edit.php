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
            <input type="file" name="slide_img" id="slide_img" class="">
        </div>

        <div class="col-md-8 inline-flex" id="div_image">
            <label for=""></label>
            <img src="<?=base_url().'upload/images/'.$info_banner['slide_img']?>" onclick="onDelete()" title="Bấm vào đây để xóa" style="cursor: pointer;">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input type="text" name="slide_title" id="slide_title" value="<?php echo $info_banner['slide_title'] ?>" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <?php if ($info_banner['slide_active'] == 1) {
                    $checked = 'checked';
                }else{
                    $checked = '';
                } 
            ?>
            <input type="checkbox" name="slide_active" id="slide_active" value="1" style="margin-top: 12px;" <?php echo $checked ?>>
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
                $('#slide_img').attr("required","required");
            }
        });
        }
</script>