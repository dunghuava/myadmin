<link rel="stylesheet" href="<?=base_url('upload/css/hotline.css?v='.time())?>">
<?php 
    $info = $this->Project_M->o_fetch("select phone from db_info ");
?>
<div class="hotline-phone-ring-wrap">
	<div class="hotline-phone-ring">
		<div class="hotline-phone-ring-circle"></div>
		<div class="hotline-phone-ring-circle-fill"></div>
		<div class="hotline-phone-ring-img-circle">
        <a href="tel:<?=$info[0]['phone']?>" class="pps-btn-img">
            <span style="color:#fff;font-size:18px" class="fa fa-phone"></span>
		</a>
		</div>
	</div>
	<div class="hotline-bar">
		<a href="tel:<?=$info[0]['phone']?>">
			<span class="text-hotline"><?=$info[0]['phone']?></span>
		</a>
	</div>
</div>