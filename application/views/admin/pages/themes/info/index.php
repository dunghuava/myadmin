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
        <div class="col-md-12 inline-flex">
            <label for="">Thông tin công ty</label>
            <textarea name="company" id="company" cols="30" rows="5" class="form-control html_editor"><?php if(!empty($info['company'])) echo $info['company']; else echo '';?></textarea>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Địa chỉ</label>
            <input type="text" name="address" id="address" value="<?php if(!empty($info['address'])) echo $info['address']; else echo '';?>" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Email</label>
            <input type="email" name="email" id="email" value="<?php if(!empty($info['email'])) echo $info['email']; else echo '';?>" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Số Điện thoại</label>
            <input type="text" name="phone" id="phone" value="<?php if(!empty($info['phone'])) echo $info['phone']; else echo '';?>" class="form-control">
        </div>   


        <div class="col-md-8 inline-flex">
            <label for="">Twitter (url)</label>
            <input type="text" name="twitter" id="twitter" value="<?php if(!empty($info['twitter'])) echo $info['twitter']; else echo '';?>" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Facebook (url)</label>
            <input type="text" name="facebook" id="facebook" value="<?php if(!empty($info['facebook'])) echo $info['facebook']; else echo '';?>" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Google (url)</label>
            <input type="text" name="google" id="google" value="<?php if(!empty($info['google'])) echo $info['google']; else echo '';?>" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Instagram (url)</label>
            <input type="text" name="instagram" id="instagram" value="<?php if(!empty($info['instagram'])) echo $info['instagram']; else echo '';?>" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Youtube (url)</label>
            <input type="text" name="youtube" id="youtube" value="<?php if(!empty($info['youtube'])) echo $info['youtube']; else echo '';?>" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Logo</label>
            <input type="file" name="logo_img" id="logo_img" class="">
        </div>

        <?php if(!empty($info['logo_img'])){?>
            <div class="col-md-8 inline-flex" id="div_logo_img">
                <label for=""></label>
                <img src="<?=base_url().'upload/images/'.$info['logo_img']?>" onclick="onDeleteImg('logo_img')" title="Bấm vào đây để xóa" style="cursor: pointer;">
            </div>
        <?php } ?>

        <div class="col-md-8 inline-flex">
            <label for="">Icon</label>
            <input type="file" name="icon_img" id="icon_img" class="">
        </div>

        <?php if(!empty($info['icon_img'])){?>
            <div class="col-md-8 inline-flex" id="div_icon_img">
                <label for=""></label>
                <img src="<?=base_url().'upload/images/'.$info['icon_img']?>" onclick="onDeleteImg('icon_img')" title="Bấm vào đây để xóa" style="cursor: pointer;">
            </div>
        <?php } ?>

        <div class="col-md-8 inline-flex">
            <label for="">Coppy right</label>
            <textarea required name="coppy_right" id="coppy_right" cols="30" rows="3" class="form-control"><?php if(!empty($info['coppy_right'])) echo $info['coppy_right']; else echo '';?></textarea>
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
    function onDeleteImg(img){
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
                $('#'+img).attr("required","required");
            }
        });
    }
</script>