<style>
    html,body{
        background:#F3F4F7;
    }
    .sec-duan-list .container{
        box-shadow: 0 2px 20px 0 rgba(0, 0, 0, 0.05);
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
<section class="sec-duan-list" style="margin-top:15px">
    <div id="container_h" class="container" style="width:98%;margin:auto;height:84vh;background:#fff;"><br>
        <div class="row">
            <div class="col-md-7">
                <form id="frmSearchApi" action="" class="frm-top-search">
                    <input type="hidden" id="cate_id" value="<?=$cate_id?>">
                    <select name="" id="" class="form-control">
                        <option value="0">---Loại dự án---</option>
                        <option value="">---Mua---</option>
                        <option value="">---Bán---</option>
                        <option value="">---Cho thuê---</option>
                    </select>
                    <input placeholder="Tìm kiếm theo tên dự án, khu vực..." type="text" class="form-control">
                    <button type="submit" style="background:#fff" class="btn btn-default"><span class="fa fa-search"></span></button>
                    <button type="button" style="background:#fff" class="btn btn-default">Loại hình&nbsp;<span class="fa fa-angle-down"></span></button>
                    <button type="button" style="background:#fff" class="btn btn-default">Phòng ngủ&nbsp;<span class="fa fa-angle-down"></span></button>
                    <button type="button" style="background:#fff" class="btn btn-default">Diện tích&nbsp;<span class="fa fa-angle-down"></span></button>
                </form>
                <div class="row">
                    <div id="spinner" class="text-center"><br><br><br><br><br><br><br><br>
                        <img style="width:40px;" src="https://www.afri.tn/wp-content/plugins/interactive-3d-flipbook-powered-physics-engine/assets/images/dark-loader.gif" alt="">
                        <p>Đang tải dữ liệu...</p>
                    </div>
                    <div style="overflow:auto;" id="root_project"></div>
                </div>
            </div>
            <div class="col-md-5">
                <?php include ('mapapi.php') ?>
            </div>
        </div>
    </div>
</section>
<script>
    $('#frmSearchApi').submit(function (e) { 
        e.preventDefault();
        searchProject();
    });
    $(document).ready(function () {
        var parentHeight = $('#container_h').innerHeight();
        $('#root_project').css({'height':parentHeight-80});
        $('#map').css({'height':parentHeight-40});
        searchProject();
    });
    function searchProject(){
        $('#spinner').show();
        $('#root_project').hide();
        var data={
            'search':true,
            'cate_id':$('#cate_id').val()
        };
        $.ajax({
            type: "post",
            url: "<?=base_url('web/searchApi')?>",
            data: {'data':data},
            success: function (response) {
                setTimeout(() => {
                    $('#spinner').hide();
                    $('#root_project').html(response);
                    $('#root_project').fadeIn();
                }, 500);
            }
        });
    }
</script>