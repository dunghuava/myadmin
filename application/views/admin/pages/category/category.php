<div class="col-md-12">
    <table class="datatable table table-striped table-bordered">
        <thead>
            <tr>
                <th style="width: 5%">
                    <input type="checkbox" name="" value="">
                </th>
                <th style="width: 5%">ID</th>
                <th>Tên danh mục</th>
                <th style="width:10%">Hình ảnh</th>
                <th>Loại</th>
                <th style="width: 5%">Menu</th>
                <th style="width: 10%">Hiển thị</th>
                <th style="width: 10%">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($arr_category as $val){
                    $str='';
                    include ('item_table.php');
                    $sub = $this->Category_M->all(['cate_parent_id'=>$val['cate_id']]);
                    if (count($sub)>0){
                        foreach ($sub as $val){
                            $str='|__';
                            include ('item_table.php');
                            $sub1 = $this->Category_M->all(['cate_parent_id'=>$val['cate_id']]);
                            if (count($sub1)>0){
                                foreach ($sub1 as $val){
                                    $str='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__';
                                    include ('item_table.php');
                                    $sub2 = $this->Category_M->all(['cate_parent_id'=>$val['cate_id']]);
                                    if (count($sub2)>0){
                                        foreach ($sub2 as $val){
                                            $str='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__';
                                            include ('item_table.php');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</div>