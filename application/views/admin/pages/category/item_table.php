<tr>
    <td>
        <input type="checkbox" name="" id="">
    </td>
    <td><?=$val['cate_id']?></td>
    <td><a href=""><?=$str.$val['cate_title']?></a></td>
    <td class="text-center">
        <img style="width:50px" src="<?=base_url('upload/images/'.$val['cate_img'])?>" alt="">
    </td>
    <td>
        <?php 
            $module = $this->Module_M->all(['module_id'=>$val['cate_module_id']]);
            echo $module[0]['module_title'];
        ?>
    </td>
    <td class="text-center">
        <input type="checkbox" <?=$val['cate_is_menu']==1 ? 'checked':''?> >
    </td>
    <td class="text-center">
        <input type="checkbox" <?=$val['cate_is_public']==1 ? 'checked':''?> >
    </td>
    <td>
        <button class="btn btn-default">
                <span class="fa fa-eye"></span>
        </button>
        <button class="btn btn-default">
            <span class="fa fa-trash"></span>
        </button>
    </td>
</tr>