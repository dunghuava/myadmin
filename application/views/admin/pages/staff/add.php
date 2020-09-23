
<div class="container-fluid">
	<form action="" method="post" enctype="multipart/form-data">
	 <div class="row">
     	<div class="col-md-12">
              <div class="col-md-6 inline-flex">
                <label for="">Hình ảnh</label>
                <input required type="file" name="staff_img" id="staff_img" class="">
              </div>
             <div class="col-md-6 inline-flex">
             	    <label for="">Họ tên</label>
     		        <input id="staff_name" value="" type="text" name="staff_name" class="form-control" required>
             </div>

             <div class="col-md-6 inline-flex">
                    <label for="">Chức danh</label>
                    <input id="staff_position" value="" type="text" name="staff_position" class="form-control" required>
             </div>

             <div class="col-md-6 inline-flex">
                    <label for="">Số điện thoại</label>
                    <input id="staff_phone" value="" type="text" name="staff_phone" class="form-control" required>
             </div>

             <div class="col-md-6 inline-flex">
             	  <label for="">Hiển thị</label>
                <input type="checkbox" name="staff_active" id="staff_active" value="1" style="margin-top: 12px;" checked>
             </div>

             <div class="col-md-6 inline-flex">
             	    <label for=""></label>
             	    <a href="<?=base_url('admin/staff')?>" title="">
	     		        <button type="button" class="btn btn-danger">
	     		        	<span class="fa fa-arrow-left"></span>
	     		        	Trở về
	     		        </button>
             	    </a>
     		        <button type="submit" id="btn_save" name="btn_save" style="margin-left: 10px" class="btn btn-success">
     		        	<span class="fa fa-save"></span>
     		        	Lưu lại
     		        </button>
             </div>
     	</div>
     </div>
	 </form> 
</div>