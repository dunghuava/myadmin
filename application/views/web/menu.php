<?php 
    $categories = $this->Category_M->all(['cate_parent_id'=>0]);
?>
<nav class="nav-menu">
    <ul class="main-menu">
        <li>
            <a href="<?=base_url()?>">Trang chủ</a>
        </li>
        <?php 
            foreach ($categories as $cate)
            {
            $sub = $this->Category_M->all(['cate_parent_id'=>$cate['cate_id']]);
            $classes = count($sub) > 0 ? 'class="dropdown"':'';
        ?>
        <li <?=$classes?>>
            <a href="<?=base_url('categories/'.$cate['cate_alias'])?>"><?=$cate['cate_title']?></a>
            <?php 
                if ($sub>0){
            ?>
            <ul class="dropdown-list">
                  <?php foreach ($sub as $s_cate){ ?>
                    <li>
                        <a href="<?=base_url('categories/'.$s_cate['cate_alias'])?>"><?=$s_cate['cate_title']?></a>
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
    </ul>
</nav>