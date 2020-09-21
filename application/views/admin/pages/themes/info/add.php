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
            <label for="">Tên miền</label>
            <input type="text" name="domain_name" id="domain_name" value="" class="form-control">
        </div>
        <div class="col-md-12 inline-flex">
            <label for="">Thông tin công ty</label>
            <textarea name="company" id="company" cols="30" rows="5" class="form-control html_editor"></textarea>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Địa chỉ</label>
            <input type="text" name="address" id="address" value="" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Email</label>
            <input type="email" name="email" id="email" value="" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Hotline</label>
            <input type="text" name="phone" id="phone" value="" class="form-control">
        </div>   


        <div class="col-md-8 inline-flex">
            <label for="">Twitter (url)</label>
            <input type="text" name="twitter" id="twitter" value="" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Facebook (url)</label>
            <input type="text" name="facebook" id="facebook" value="" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Google (url)</label>
            <input type="text" name="google" id="google" value="" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Instagram (url)</label>
            <input type="text" name="instagram" id="instagram" value="" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Youtube (url)</label>
            <input type="text" name="youtube" id="youtube" value="" class="form-control">
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Logo</label>
            <input type="file" name="logo_img" id="logo_img" class="" required="">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Icon</label>
            <input type="file" name="icon_img" id="icon_img" class="" required="">
        </div>


        <div class="col-md-8 inline-flex">
            <label for="">Coppy right</label>
            <textarea required name="coppy_right" id="coppy_right" cols="30" rows="3" class="form-control"></textarea>
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