<br><br>
<?php include ('botchat.php') ?>

<footer class="app-footer font18">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-phone"></span>
                    <span>Hotline</span>
                    <p>(+48) <?=$info[0]['phone']?></p>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-envelope"></span>
                    <span>Email</span>
                    <p>(+48) <?=$info[0]['email']?></p>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-address"></span>
                    <span>Địa chỉ</span>
                    <p><?=$info[0]['address']?></p>
                </div>
            </div>
            <!-- <div class="col-md-3 col-xs-6">
                <div class="flex">
                    <span class="fa fa-envelope"></span>
                    <span>Email</span>
                    <p>(+48) 0383868205</p>
                </div>
            </div> -->
        </div><hr>
        <div class="row">
            <div class="col-md-3">
                <p><?=$info[0]['company']?></p>
            </div>
            <div class="col-md-3">
                <div class="title-footer">Dự án</div>
                <ul class="list-footer">
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                    <li><a href="">THE SUN AVENUE</a></li>
                    <li><a href="">QUAN 02 Thao Dien</a></li>
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="title-footer">Blog</div>
                <ul class="list-footer">
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                    <li><a href="">THE SUN AVENUE</a></li>
                    <li><a href="">QUAN 02 Thao Dien</a></li>
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="title-footer">Nhà đẹp</div>
                <ul class="list-footer">
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                    <li><a href="">THE SUN AVENUE</a></li>
                    <li><a href="">QUAN 02 Thao Dien</a></li>
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                    <li><a href="">RIVERGATE RESIDENT</a></li>
                </ul>
            </div>
        </div><hr>
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <span>© <?=$info[0]['coppy_right']?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <span>Chính sách bảo mật, Điều khoản sử dụng, Phản hồi</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?=base_url('upload/js/app.js?v='.time())?>"></script>
</body>
</html>