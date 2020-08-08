<style>
	.mg5{margin:5px;}
</style>
<div class="container-fluid">
	<form action="" method="post" enctype="multipart/form-data" >
	 <div class="row">
     	<div class="col-md-6">
		 	<?php if ($setting['favicon']!=''){ ?>
				<div class="col-md-12 inline-flex">
					<label for=""></label>
					<input type="hidden" name="old_file" value="<?=$setting['favicon']?>">
					<img style="width:50px" src="<?=base_url('upload/img/'.$setting['favicon'])?>" alt="">
				</div>
			<?php } ?>
		 	<div class="col-md-12 inline-flex">
             	    <label for="">Favicon</label>
					 <input type="file" name="file" id="file">
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Tên ứng dụng</label>
     		        <input value="<?=$setting['app_name']?>" type="text" name="app_name" class="form-control"></input>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Phiên bản</label>
     		        <code><h5 class="mg5"><?=$setting['app_version']?></h5></code>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Sibar</label>
					 <div class="custom-control custom-radio">
							<input <?=$setting['sibar_mode']==0 ? 'checked':''?> value="0" type="radio" id="sibar_mode_01" name="sibar_mode" class="sibar_mode custom-control-input">
							<label style="cursor:pointer" class="custom-control-label" for="sibar_mode_01">Mặc định</label>
						</div>
					<div class="custom-control custom-radio">
						<input <?=$setting['sibar_mode']==1 ? 'checked':''?> value="1" type="radio" id="sibar_mode_02" name="sibar_mode" class="sibar_mode custom-control-input">
						<label style="cursor:pointer" class="custom-control-label" for="sibar_mode_02">Thu gọn</label>
					</div>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Màu nền sibar</label>
     		        <input id="sibar_background_color" value="<?=$setting['sibar_background_color']?>" type="text" name="sibar_background_color" class="form-control cpicker"></input>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for="">Màu text sibar</label>
     		        <input id="sibar_text_color" value="<?=$setting['sibar_text_color']?>" type="text" name="sibar_text_color" class="form-control cpicker"></input>
             </div>
             <div class="col-md-12 inline-flex">
             	    <label for=""></label>
             	    <a href="<?=base_url()?>" title="">
	     		        <button type="button" class="btn btn-danger">
	     		        	<span class="fa fa-arrow-left"></span>
	     		        	Trở về
	     		        </button>
             	    </a>
     		        <button type="submit" name="btn_save" style="margin-left: 10px" class="btn btn-success">
     		        	<span class="fa fa-save"></span>
     		        	Lưu lại
     		        </button>
             </div>
     	</div>
     </div>
	 </form> 
</div>

<script type="text/javascript">
	$('#sibar_background_color').change(function (e) { 
		var color = $(this).val();
		$('.main-sidebar').css({'background-color':color});
	});
	$('#sibar_text_color').change(function (e) { 
		var color = $(this).val();
		$('.main-sidebar > *').css({'color':color});
	});
	$('.sibar_mode').click(function (e) { 
		var mode = $(this).val();		
		if (mode==0){
			$('.sidebar-mini.layout-fixed').removeClass('sidebar-collapse');
		}else{
			$('.sidebar-mini.layout-fixed').addClass('sidebar-collapse');
		}
	});
</script>