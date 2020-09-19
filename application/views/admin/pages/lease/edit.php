<style type="text/css">
    .inline-flex label {
        min-width: 120px;
    }

    .select2-selection__choice{
        color: black!important;
    }

    img{
        max-width: 200px;
        max-height: 200px;
    }

    .aaaa{
        display: inline-block;
    }
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="project_id" id="project_id" value="<?php echo $info_project['project_id'] ?>">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh đại hiện</label>
            <input  type="file" name="project_img" id="project_img" class="">
        </div>
        <div class="col-md-8 inline-flex" id="div_image">
            <label for=""></label>
            <img src="<?=base_url().'upload/images/'.$info_project['project_img']?>" onclick="onDeleteImg()" title="Bấm vào đây để xóa" style="cursor: pointer;">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh chi tiết</label>
            <input type="file" name="project_images[]" id="project_images" class="" multiple="multiple">
        </div>

        <div class="col-md-12 inline-flex" id="">
            <label for=""></label>
            <div style="display: flex;overflow: auto;">
            <?php foreach ($list_images as $images) {?>
                <img id="pro_img_<?php echo $images['project_images_id'] ?>" src="<?=base_url().'upload/images/'.$images['project_images']?>" onclick="onDeleteImages(<?php echo $images['project_images_id'] ?>)" title="Bấm vào đây để xóa" style="cursor: pointer;margin-right: 10px; ">
            <?php } ?>
            </div>
        </div>


        <div class="col-md-8 inline-flex" >
            <label for="">Danh mục</label>
            <select name="project_category" id="project_category" class="form-control" required>
                <option value="">Chọn danh mục</option>
                <?php echo $list_category; ?>

            </select>
        </div>


        <!-- <div class="col-md-8 inline-flex" >
            <label for="">Loại</label>
            <select name="project_kind" id="project_kind" class="form-control" required>
                <option value="">Chọn loại</option>
                <option value="0" <?php if ($info_project['project_kind'] == 0) echo "selected='selected'";?>>Dự án</option>
                <option value="1" <?php if ($info_project['project_kind'] == 1) echo "selected='selected'";?>>Mua</option>
                <option value="2" <?php if ($info_project['project_kind'] == 2) echo "selected='selected'";?>>Cho thuê</option>
            </select>
        </div> -->

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input onkeyup="addText(this,'#project_alias')" required type="text" name="project_title" id="project_title" value="<?php echo $info_project['project_title'] ?>" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="project_alias" id="project_alias" value="<?php echo $info_project['project_alias'] ?>" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Mô tả ngắn</label>
            <textarea name="project_introduce_short" id="project_introduce_short" cols="30" rows="3" class="form-control" required><?php echo $info_project['project_introduce_short'] ?></textarea>
        </div>  

        <div class="col-md-12 inline-flex">
            <label for="">Giới Thiệu</label>
            <textarea name="project_introduce" id="project_introduce" cols="30" rows="5" class="form-control html_editor" required><?php echo $info_project['project_introduce'] ?></textarea>
        </div> 


        <div class="col-md-8" style="display: block;">
            <label for="">Thông tin chi tiết</label>
            <br>
            <!-- <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Trạng thái</label>
                <select name="project_status" id="project_status" class="form-control" required>
                    <option value="">Chọn trạng thái</option>
                    <?php foreach ($list_status as $status) {
                        if ($status['id_status_project'] == $info_project['project_status']) {
                            $selected_status = 'selected';
                        }else{
                            $selected_status = '';
                        }
                        echo '<option value="'.$status['id_status_project'].'" '.$selected_status.'>'.$status['status_project'].'</option>';
                    } ?>
                </select>
            </div> -->

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Loại hình</label>
                <select name="project_type[]" id="project_type" class="form-control select2 tags-field" multiple="multiple" required>
                <?php foreach ($list_type as $type) {
                    $project_type = explode(',', $info_project['project_type']);
                ?>
                    <option value="<?php echo $type['id_type_project'] ?>" <?php foreach ($project_type as $pr_type) {if($type['id_type_project'] == $pr_type) echo "selected='selected'";} ?>><?php echo $type['type_project'] ?></option>
                <?php } ?>

                </select>
            </div>

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Diện tích (m²)</label>
                <input type="text" name="project_acreage" id="project_acreage" value="<?php echo $info_project['project_acreage'] ?>" class="form-control" placeholder="" required>
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Giá cho thuê</label>
                <input type="text" name="project_price" id="project_price" value="<?php echo $info_project['project_price'] ?>" class="form-control" placeholder="" required>
            </div>


            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Hướng</label>
                <select name="project_direction" id="project_direction" class="form-control" >
                    <option value="">Chọn hướng</option>
                    <option <?php if($info_project['project_direction'] == 'Đông') echo "selected='selected'"; ?> value="Đông">Đông</option>
                    <option <?php if($info_project['project_direction'] == 'Tây') echo "selected='selected'"; ?> value="Tây">Tây</option>
                    <option <?php if($info_project['project_direction'] == 'Nam') echo "selected='selected'"; ?> value="Nam">Nam</option>
                    <option <?php if($info_project['project_direction'] == 'Bắc') echo "selected='selected'"; ?> value="Bắc">Bắc</option>
                    <option <?php if($info_project['project_direction'] == 'Đông Bắc') echo "selected='selected'"; ?> value="Đông Bắc">Đông Bắc</option>
                    <option <?php if($info_project['project_direction'] == 'Tây Bắc') echo "selected='selected'"; ?> value="Tây Bắc">Tây Bắc</option>
                    <option <?php if($info_project['project_direction'] == 'Đông Nam') echo "selected='selected'"; ?> value="Đông Nam">Đông Nam</option>
                    <option <?php if($info_project['project_direction'] == 'Tây Nam') echo "selected='selected'"; ?> value="Tây Nam">Tây Nam</option>
                </select>
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">View</label>
                <input type="text" name="project_view" id="project_view" class="form-control" placeholder="" value="<?php echo $info_project['project_view'] ?>">
            </div>


             <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Số phòng ngủ</label>
                <input type="number" name="number_bedroom" id="number_bedroom" value="<?php echo $info_project['number_bedroom'] ?>" class="form-control" placeholder="">
            </div>
             <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Số tolet</label>
                <input type="number" name="number_tolet" id="number_tolet" value="<?php echo $info_project['number_tolet'] ?>" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Số tầng</label>
                <input type="number" name="number_floors" id="number_floors" value="<?php echo $info_project['number_floors'] ?>" class="form-control" placeholder="">
            </div>

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Dự án</label>
                <select name="in_project" id="in_project" class="form-control" >
                    <option value="">Thuộc dự án</option>
                    <?php foreach ($list_project as $key => $item) {

                        if ($info_project['in_project'] == $item['project_id']) {
                            $selected_in_project = 'selected';
                        }else{
                            $selected_in_project = '';
                        } 
            
                        echo '<option value="'.$item['project_id'].'" '.$selected_in_project.'>'.$item['project_title'].'</option>';
                    } ?>
                </select>
            </div>
            
            
        </div>


         <div class="col-md-8 inline-flex">
            <label for="">Tiện ích</label>
            <select name="project_extension[]" id="project_extension" class="form-control select2" multiple="multiple">
                <?php foreach ($list_extension as $extension) {
                    $project_extension = explode(',', $info_project['project_extension']);
                ?>
                    <option value="<?php echo $extension['extension_id'] ?>" <?php foreach ($project_extension as $pr_ex) {if($extension['extension_id'] == $pr_ex) echo "selected='selected'";} ?>><?php echo $extension['extension_name'] ?></option>
                <?php } ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Nội thất</label>
            <select name="project_furniture[]" id="project_furniture" class="form-control select2" multiple="multiple">
                <?php foreach ($list_furniture as $furniture) {
                    $project_furniture = explode(',', $info_project['project_furniture']);
                ?>
                    <option value="<?php echo $furniture['id_furniture_project'] ?>" <?php foreach ($project_furniture as $pr_fur) {if($furniture['id_furniture_project'] == $pr_fur) echo "selected='selected'";} ?>><?php echo $furniture['furniture_project'] ?></option>
                <?php } ?>
            </select>
        </div> 
        

        <div class="col-md-8 inline-flex">
            <label for="">Khu dân cư</label>
            <select name="project_residential" id="project_residential" class="form-control">
                <option value="">Chọn khu dân cư</option>
                <?php foreach ($list_residential as $residential) {
                    if ($residential['residential_id'] == $info_project['project_residential']) {
                        $selected_residential = 'selected';
                    }else{
                        $selected_residential = '';
                    }
                    echo '<option value="'.$residential['residential_id'].'" '.$selected_residential.'>'.$residential['residential_title'].'</option>';
                } ?>
            </select>
        </div> 


        <div class="col-md-8 inline-flex">
            <label for="">Địa chỉ</label>
            <input type="text" name="project_address" id="project_address" onFocus="geolocate()" class="form-control" value="<?php echo $info_project['project_address'] ?>" placeholder="nhập địa chỉ" required>
            
        </div>  

            <!-- <div class="col-md-12 inline-flex" >
                <label for=""></label>
                <select name="project_province_id" id="project_province_id" class="form-control" required>
                    <option value="">Chọn Thành Phố - Tỉnh</option>
                    <?php foreach ($list_province as $province) {
                        if ($province['province_id'] == $info_project['project_province_id']) {
                            $selected_province = 'selected';
                        }else{
                            $selected_province = '';
                        }
                        echo '<option value="'.$province['province_id'].'" '.$selected_province.'>'.$province['province_name'].'</option>';
                    } ?>
                </select>
                <select name="project_district_id" id="project_district_id" class="form-control" required>
                    <option value="">Chọn Quận - Huyện</option>
                </select>
                <select name="project_ward_id" id="project_ward_id" class="form-control" required>
                    <option value="">Chọn Phường - Xã</option>
                </select>
            </div>
 -->

        <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="project_keyword" id="project_keyword" cols="30" rows="3" class="form-control"><?php echo $info_project['project_keyword'] ?></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="project_description" id="project_description" cols="30" rows="3" class="form-control"><?php echo $info_project['project_description'] ?></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <?php if ($info_project['project_active'] == 1) {
                    $checked = 'checked';
                }else{
                    $checked = '';
                } 
            ?>
            <input type="checkbox" name="project_active" id="project_active" value="1" style="margin-top: 12px;" <?php echo $checked; ?>>
        </div> 

        
        <br>
        <br>
        <div class="col-md-6 inline-flex">
            <label for=""></label>
            <button type="reset" class="btn btn-danger">Xóa</button>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
    <br><br>
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjwJQRCuf970OLe6UuBiMvg_DyYW2PL6Y&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
<script>
    function addText(e,target){
        var val = make_alias(e.value);
        $(target).val(val);
    }

    $(document).ready(function () {
        $('.select2').select2();
        $(".tags-field").select2({
            tokenSeparators: [','],
            tags: true,
        });
        $('input').attr('autocomplete','off');
    });


    $('#project_category').val(<?=$info_project['project_category']?>);


    var province_id = $('#project_province_id').val();
    var district_id ='<?php echo $info_project['project_district_id'] ?>';
    var ward_id ='<?php echo $info_project['project_ward_id'] ?>';
    $.ajax({
        type: "post",
        url: "<?=base_url('admin/project/getListDistrict_byProvince')?>",
        data: {'province_id':province_id,'district_id':district_id},
        success: function (response) {
            $('#project_district_id').html(response);
        }
    });

    $.ajax({
        type: "post",
        url: "<?=base_url('admin/project/getListWard_byDistrict')?>",
        data: {'district_id':district_id,'ward_id':ward_id},
        success: function (response) {
            $('#project_ward_id').html(response);
        }
    });


    $('#project_province_id').change(function (e) { 
        var district_id = '';
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?=base_url('admin/project/getListDistrict_byProvince')?>",
                data: {'province_id':$(this).val()},
                success: function (response) {
                    $('#project_district_id').html(response);
                    $('#project_district_id').trigger('change');
                }
            });
        });


    $('#project_district_id').change(function (e) { 
        var ward_id = '';
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?=base_url('admin/project/getListWard_byDistrict')?>",
                data: {'district_id':$(this).val()},
                success: function (response) {
                    $('#project_ward_id').html(response);
                }
            });
        });

    function onDeleteImg(){
        Swal.fire({
            title: 'Bạn có muốn xóa mục này?',
            text: "Dữ liệu đã xóa sẽ không thể phục hồi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Xóa'
            }).then((result) => {
            if (result.value) {
                $('#div_image').css("display","none");
                $('#project_img').attr("required","required");
            }
        });
    }

    function onDeleteImages(pro_img_id){
        var project_id = $('#project_id').val();
        Swal.fire({
            title: 'Bạn có muốn xóa mục này?',
            text: "Dữ liệu đã xóa sẽ không thể phục hồi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy',
            confirmButtonText: 'Xóa'
            }).then((result) => {
            if (result.value) {
                $('#pro_img_'+pro_img_id).css("display","none");
                $.ajax({
                    type: "post",
                    url: "<?=base_url('admin/project/destroyImages')?>",
                    data: {'pro_img_id':pro_img_id,'project_id':project_id},
                    success: function (response) {
                        if (response<2) {
                            $('#project_images').attr("required","required");
                            
                        }
                    }
                });
            }
        });
    }
</script>

<script>
      "use strict";

      // This sample uses the Autocomplete widget to help the user select a
      // place, then it retrieves the address components associated with that
      // place, and then it populates the form fields with those details.
      // This sample requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script
      // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      let placeSearch;
      let project_address;
      const componentForm = {
        street_number: "short_name",
        route: "long_name",
        locality: "long_name",
        administrative_area_level_1: "short_name",
        country: "long_name",
        postal_code: "short_name"
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        project_address = new google.maps.places.Autocomplete(
          document.getElementById("project_address"),
          {
            types: ["geocode"]
          }
        ); // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.

        project_address.setFields(["address_component"]); // When the user selects an address from the drop-down, populate the
        // address fields in the form.

        project_address.addListener("place_changed", fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the project_address object.


        const place = project_address.getPlace();

        console.log(place);

        for (const component in componentForm) {
          document.getElementById(component).value = "";
          document.getElementById(component).disabled = false;
        } // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.

        for (const component of place.address_components) {
          const addressType = component.types[0];

          if (componentForm[addressType]) {
            const val = component[componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      } // Bias the project_address object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.

      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(position => {
            const geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            const circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            project_address.setBounds(circle.getBounds());
          });
        }
      }
    </script>

