<?php 
    $categories = $this->Category_M->all(['cate_parent_id'=>0,'cate_is_menu'=>1,'cate_is_public'=>1],'asc');
?>
<nav class="nav-menu">
    <ul class="main-menu">
        <li>
            <a href="<?=base_url()?>">Trang chủ</a>
        </li>
        <?php 
            foreach ($categories as $cate)
            {
            $sub = $this->Category_M->all(['cate_parent_id'=>$cate['cate_id']],'asc');
            $classes = count($sub) > 0 ? 'class="dropdown"':'';
        ?>
        <li <?=$classes?>>
            <a href="<?=base_url('danh-muc/'.$cate['cate_alias'])?>"><?=$cate['cate_title']?></a>
            <?php 
                if ($sub>0){
            ?>
            <ul class="dropdown-list">
                  <?php foreach ($sub as $s_cate){ ?>
                    <li>
                        <a href="<?=base_url('danh-muc/'.$s_cate['cate_alias'])?>"><?=$s_cate['cate_title']?></a>
                    </li>
                  <?php } ?>
            </ul>
            <?php 
                } 
            ?>
        </li>
        <?php 
            }
        ?>
        <?php  
            $this->user_data = $this->session->get_userdata('user_data');
            if (!empty($this->user_data['user_data']['user_id'])) {
                $infor = $this->Account_M->find_row(['user_id'=>$this->user_data['user_data']['user_id']]);
        ?>
        <li class="dropdown">
            <a href="<?=base_url('dang-nhap')?>"><?=$infor['user_fullname']?></a>
            <ul class="dropdown-list">
                <li>
                    <a href="<?=base_url()?>">Trang quản trị</a>
                </li>
                <li>
                    <a href="<?=base_url()?>">Thông tin</a>
                </li>
                <li>
                    <a href="<?=base_url('web/logout')?>">Đăng xuất</a>
                </li>
            </ul>
        </li>
        <?php }else{ ?>
            <li>
                <a href="<?=base_url('dang-nhap')?>">Đăng nhập</a>
            </li>
            
        <?php } ?>
        
    </ul>
</nav>