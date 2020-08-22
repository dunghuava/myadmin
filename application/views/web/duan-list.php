<style>
    html,body{
        background:#F3F4F7;
    }
    #fullwidth{
        width:99%;
        margin:5px auto;
    }
    .list_type li{
        display:inline-block;
        text-transform:uppercase;
        padding:0px 10px;
    }
    .bg-white{
        background:#fff;
    }
    #root_project::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #65BA69;
    }
    #root_project::-webkit-scrollbar
    {
        width: 0px;
        background-color: #65BA69;
    }
    #root_project::-webkit-scrollbar-thumb
    {
        background-color: #65BA69;
    }
</style>
<?php 
    $loaihinh  = $this->Type_M->all();
    $tienich = $this->Extension_M->all();
?>
<section id="fullwidth" class="page-duan-list container">
    <div class="row font16_all">
        <div class="col-md-7">
            <input type="hidden" id="cate_id" value="<?=$cate_id?>">
            <input type="hidden" id="trang_thai">
            <input type="hidden" id="loai_hinh">
            <input type="hidden" id="phong_ngu">
            <input type="hidden" id="tien_ich">
            <ul class="list_option">
                <li class="root_modal">Trạng thái
                    <ul class="m1 list-modal">
                        <li><input type="radio" name="trang_thai" class="rdo_trangthai" value="1" id="">&nbsp;Đang mở bán</li>
                        <li><input type="radio" name="trang_thai" class="rdo_trangthai" value="2" id="">&nbsp;Sắp mở bán</li>
                        <li><input type="radio" name="trang_thai" class="rdo_trangthai" value="3" id="">&nbsp;Đã bán</li>
                        <li>
                            <hr>
                            <button class="closed_modal btn btn-danger">Hủy</button>
                            <button class="btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li class="root_modal">
                    Loại hình
                    <ul class="m2 list-modal" style="width:340px">
                        <?php foreach ($loaihinh as $k => $item){ ?>
                            <li style="width:125px"><input type="radio" name="loaihinh" value="<?=$item['id_type_project']?>" id="">&nbsp;<?=$item['type_project']?></li>
                        <?php } ?>
                        <li>
                            <hr>
                            <button class="closed_modal btn btn-danger">Hủy</button>
                            <button class="btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li class="root_modal">
                    Phòng ngủ
                    <ul class="m3 list-modal" style="width:250px">
                        <li style="float:left"><input type="radio" name="phongngu[]">&nbsp;01 phòng</li>
                        <li style="float:left"><input type="radio" name="phongngu[]">&nbsp;02 phòng</li>
                        <li style="float:left"><input type="radio" name="phongngu[]">&nbsp;03 phòng</li>
                        <li style="float:left"><input type="radio" name="phongngu[]">&nbsp;04 phòng</li>
                        <li style="float:left"><input type="radio" name="phongngu[]">&nbsp;05 phòng</li>
                        <li style="float:left"><input type="radio" name="phongngu[]">&nbsp;06 phòng</li>
                        <li>
                            <hr>
                            <button class="closed_modal btn btn-danger">Hủy</button>
                            <button class="btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li class="root_modal">
                    Xem thêm
                    <ul class="m4 list-modal" style="width:500px">
                        <?php foreach ($tienich as $k => $item){ ?>
                            <li style="width:fit-content"><input type="checkbox" name="ckb_<?=$k?>" value="<?=$item['extension_id']?>" id="">&nbsp;<?=$item['extension_name']?></li>
                        <?php } ?>
                        <li style="width:100%">
                            <hr>
                            <button class="closed_modal btn btn-danger">Hủy</button>
                            <button class="btn btn-primary">Áp dụng</button>
                        </li>
                    </ul>
                </li>
                <li>
                    <input type="search" placeholder="Tìm kiếm dự án..." id=""/>
                    <button class="search-item" type="button"><span class="fa fa-search"></span></button>
                </li>
            </ul>
            <div class="text-left">
                <!-- <h3 class="mg0"><b>Mua bán nhà đất căn hộ Hồ Chí Minh...3446 căn</b></h3><br> -->
            </div>
            <div id="spinner" class="text-center"><br><br><br><br>
                <img style="width:40px;" src="https://www.afri.tn/wp-content/plugins/interactive-3d-flipbook-powered-physics-engine/assets/images/dark-loader.gif" alt="">
                <p>Đang tải dữ liệu...</p>
            </div>
            <div id="root_project" class="list-project-horizontal" style="height:390px;overflow-y:auto;overflow-x:hidden">
            </div>
        </div>
        <div class="col-md-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6481.03549625265!2d106.73151269999998!3d10.792893800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526068f53b349%3A0x8e1091a78fa2c77b!2zS8O9IHTDumMgeMOhIFRyxrDhu51uZyDEkOG6oWkgaOG7jWMgR2lhbyB0aMO0bmcgduG6rW4gdOG6o2kgVHAuSOG7kyBDaMOtIE1pbmg!5e1!3m2!1sen!2s!4v1597851575576!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</section>

<script>
    $('#frm-top-search').submit(function (e) { 
        e.preventDefault();
        searchProject();
    });
    $(document).ready(function () {
        searchProject();
    });
    function searchProject(){
        $('#spinner').show();
        $('#root_project').hide();
        var data={
            'search':true,
            'project_category':$('#cate_id').val(),
            'project_title':$('#project_title').val()
        };
        $.ajax({
            type: "post",
            url: "<?=base_url('web/searchApi')?>",
            data: {'data':data},
            success: function (response) {
                response=JSON.parse(response);
                console.log(response);
                if (response.project_locate.lenght>0){
                    project_locate=response.project_locate;
                }
                setTimeout(() => {
                    $('#spinner').hide();
                    $('#root_project').html(response.data_html);
                    $('#root_project').fadeIn();

                }, 500);
            }
        });
    }
    $('.root_modal').click(function (e) { 
        $('.list-modal').hide();
        $(this).find('.list-modal').toggle();
    });
    $('.root_modal').mouseleave(function () { 
        $('.list-modal').hide();
    });
</script>