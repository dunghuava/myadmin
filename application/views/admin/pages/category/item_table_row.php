<tr>
    <td>
        <input type="text" value="<?=$val['cate_id']?>" class="form-control text-center">
    </td>
    <td><a style="color:#000" href="<?=base_url('admin/category/edit/'.$val['cate_id'])?>"><?=$str.' '.$val['cate_title']?></a></td>
    <td class="text-center">
        <img onclick="onDeleteImg(<?=$val['cate_id']?>,'<?=$val['cate_img']?>')" style="width:50px;cursor:pointer" src="<?=base_url('upload/images/'.$val['cate_img'])?>" alt="">
    </td>
    <td>
        <?php 
            $module = $this->Module_M->all(['module_id'=>$val['cate_module_id']]);
            echo $module[0]['module_title'];
        ?>
    </td>
    <td class="text-center">
        <input onchange="setCkb(this,'cate_is_menu',<?=$val['cate_id']?>)" type="checkbox" <?=$val['cate_is_menu']==1 ? 'checked':''?> >
    </td>
    <td class="text-center">
        <input onchange="setCkb(this,'cate_is_public',<?=$val['cate_id']?>)" type="checkbox" <?=$val['cate_is_public']==1 ? 'checked':''?> >
    </td>
    <td>
        <a href="<?=base_url('admin/category/edit/'.$val['cate_id'])?>">
            <button class="btn btn-default">
                    <span class="fa fa-eye"></span>
            </button>
        </a>
        <button onclick="onDelete(<?=$val['cate_id']?>)" class="btn btn-default">
            <span class="fa fa-trash"></span>
        </button>
    </td>
</tr>