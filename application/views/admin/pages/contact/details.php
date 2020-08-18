<style type="text/css">
	.inline-flex label {
    	min-width: 120px;
	}
	img{
		max-width: 200px;
	}
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Ngày</label>
            <input text value="<?php echo date('d-m-Y H:i:s', strtotime($info_contact['created_at'])) ?>" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Họ tên</label>
            <input type="text" value="<?php echo $info_contact['contact_name'] ?>" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Số điện thoại</label>
            <input type="text" value="<?php echo $info_contact['contact_phone'] ?>" class="form-control">
        </div>   

        <div class="col-md-8 inline-flex">
            <label for="">Email</label>
            <input type="text" value="<?php echo $info_contact['contact_email'] ?>" class="form-control">
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input type="text" value="<?php echo $info_contact['contact_title'] ?>" class="form-control">
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Thông tin</label>
            <textarea cols="30" rows="3" class="form-control"><?php echo $info_contact['contact_info'] ?></textarea>
        </div> 

        
        <br>
        <br>
        <div class="col-md-6 inline-flex">
            <label for=""></label>
            <a href="<?=base_url('admin/contact/')?>"><button type="button" class="btn btn-primary">Quay lại</button></a>
        </div>
    </form>
    <br><br>
</div>

<script>
</script>