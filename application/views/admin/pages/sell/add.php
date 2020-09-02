<style type="text/css">
    .inline-flex label {
        min-width: 120px;
    }

    .select2-selection__choice{
        color: black!important;
    }
</style>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh đại hiện</label>
            <input required type="file" name="project_img" id="project_img" class="">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Hình ảnh chi tiết</label>
            <input required type="file" name="project_images[]" id="project_images" class="" multiple="multiple">
        </div>

        <div class="col-md-8 inline-flex" >
            <label for="">Danh mục</label>
            <select name="project_category" id="project_category" class="form-control" required>
                <option value="">chọn loại danh mục</option>
                <?php echo $list_category; ?>
            </select>
            <input type="hidden" name="project_kind" id="project_kind" value="0">
        </div>

        <!-- <div class="col-md-8 inline-flex">
            <label for="">Loại</label>
            <select name="project_kind" id="project_kind" class="form-control" required>
                <option value="">chọn loại</option>
                <option value="0">Dự án</option>
                <option value="1">Mua</option>
                <option value="2">Cho thuê</option>
            </select>
        </div> -->

        <div class="col-md-8 inline-flex">
            <label for="">Tiêu đề</label>
            <input onkeyup="addText(this,'#project_alias')" required type="text" name="project_title" id="project_title" class="form-control">
        </div>

        <div class="col-md-8 inline-flex">
            <label for="">Đường dẫn</label>
            <input type="text" name="project_alias" id="project_alias" class="form-control" placeholder="Tạo đường dẫn tự động">
        </div>


        <div class="col-md-12 inline-flex">
            <label for="">Giới thiệu</label>
            <textarea name="project_introduce" id="project_introduce" cols="30" rows="5" class="form-control html_editor" required></textarea>
        </div> 


        <div class="col-md-8" style="display: block;">
            <label for="">Thông tin chi tiết</label>
            <br>
            <!-- <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Trạng thái</label>
                <select name="project_status" id="project_status" class="form-control" required>
                    <option value="">Chọn trạng thái</option>
                    <?php foreach ($list_status as $status) {
                        echo '<option value="'.$status['id_status_project'].'">'.$status['status_project'].'</option>';
                    } ?>
                </select>
            </div> -->

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Loại hình</label>
                <select name="project_type[]" id="project_type" class="form-control select2" multiple="multiple" required>
                    <option value="">Chọn loại hình</option>
                    <?php foreach ($list_type as $type) {
                        echo '<option value="'.$type['id_type_project'].'">'.$type['type_project'].'</option>';
                    } ?>
                </select>
            </div>

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Diện tích</label>
                <input type="text" name="project_acreage" id="project_acreage" class="form-control" placeholder="" required>
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Giá bán</label>
                <input type="text" name="project_price" id="project_price" class="form-control" placeholder="" required>
            </div>

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Hướng</label>
                <select name="project_direction" id="project_direction" class="form-control" >
                    <option value="">Chọn hướng</option>
                    <option value="Đông">Đông</option>
                    <option value="Tây">Tây</option>
                    <option value="Nam">Nam</option>
                    <option value="Bắc">Bắc</option>
                    <option value="Đông Bắc">Đông Bắc</option>
                    <option value="Tây Bắc">Tây Bắc</option>
                    <option value="Đông Nam">Đông Nam</option>
                    <option value="Tây Nam">Tây Nam</option>
                </select>
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">View</label>
                <input type="text" name="project_view" id="project_view" class="form-control" placeholder="">
            </div>

            <!-- <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Giá thuê</label>
                <input type="text" name="project_price_lease" id="project_price_lease" class="form-control" placeholder="">
            </div> -->

            <!-- <div class="col-md-12 inline-flex" style="padding-right: 0px;">
            <label for="" style="margin-left: 113px">Chủ đầu tư</label>
            <select name="project_investor" id="project_investor" class="form-control" >
                <option value="">Chọn chủ đầu tư</option>
                <?php foreach ($list_investor as $investor) {
                    echo '<option value="'.$investor['investor_id'].'">'.$investor['investor_title'].'</option>';
                } ?>
            </select>
        </div>  -->

            <!-- <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Thời gian giao nhà</label>
                <input type="text" name="project_delivery_time" id="project_delivery_time" class="form-control datepicker" placeholder="" style="padding: 10px;">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Mật độ xây dựng</label>
                <input type="text" name="project_building_density" id="project_building_density" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Bàn giao</label>
                <select name="project_handing_over" id="project_handing_over" class="form-control">
                    <option value="">Chọn loại bàn giao</option>
                    <option value="1">Thô</option>
                    <option value="2">Nội thất cơ bản</option>
                    <option value="3">Full nội thất</option>
                </select>
            </div> -->
            
             <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Số phòng ngủ</label>
                <input type="number" name="number_bedroom" id="number_bedroom" class="form-control" placeholder="">
            </div>
             <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Số tolet</label>
                <input type="number" name="number_tolet" id="number_tolet" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Số tầng</label>
                <input type="number" name="number_floors" id="number_floors" class="form-control" placeholder="">
            </div>
            <!-- <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Số căn</label>
                <input type="number" name="number_units" id="number_units" class="form-control" placeholder="">
            </div>
            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Số block</label>
                <input type="number" name="number_blocks" id="number_blocks" class="form-control" placeholder="">
            </div> -->

            <div class="col-md-12 inline-flex" style="padding-right: 0px;">
                <label for="" style="margin-left: 113px">Dự án</label>
                <select name="in_project" id="in_project" class="form-control" >
                    <option value="">Thuộc dự án</option>
                    <?php foreach ($list_project as $key => $item) {
                        echo '<option value="'.$item['project_id'].'">'.$item['project_title'].'</option>';
                    } ?>
                </select>
            </div>
            
            
        </div>

        <!-- <div class="col-md-8 inline-flex">
            <label for="">Mô tả</label>
            <textarea name="project_introduce" id="project_introduce" cols="30" rows="3" class="form-control" required></textarea>
        </div>    -->


         <div class="col-md-8 inline-flex">
            <label for="">Tiện ích</label>
            <select name="project_extension[]" id="project_extension" class="form-control select2" required multiple="multiple">
                <?php foreach ($list_extension as $extension) {
                    echo '<option value="'.$extension['extension_id'].'">'.$extension['extension_name'].'</option>';
                } ?>
            </select>
        </div> 

        <div class="col-md-8 inline-flex">
            <label for="">Nội thất</label>
            <select name="project_furniture[]" id="project_furniture" class="form-control select2" multiple="multiple">
                <?php foreach ($list_furniture as $furniture) {
                    echo '<option value="'.$furniture['id_furniture_project'].'">'.$furniture['furniture_project'].'</option>';
                } ?>
            </select>
        </div>

        

        <div class="col-md-8 inline-flex">
            <label for="">Khu dân cư</label>
            <select name="project_residential" id="project_residential" class="form-control">
                <option value="">Chọn khu dân cư</option>
                <?php foreach ($list_residential as $residential) {
                    echo '<option value="'.$residential['residential_id'].'">'.$residential['residential_title'].'</option>';
                } ?>
            </select>
        </div> 


        <div class="col-md-8 inline-flex">
            <label for="">Địa chỉ</label>
        
            <input type="text" name="project_address" id="project_address" onFocus="geolocate()" class="form-control" value="" placeholder="nhập địa chỉ" required>
            
        </div>  

            <!-- <div class="col-md-12 inline-flex" >
                <label for=""></label>
                <select name="project_province_id" id="project_province_id" class="form-control" required>
                    <option value="">Chọn Thành Phố - Tỉnh</option>
                    <?php foreach ($list_province as $province) {
                        echo '<option value="'.$province['province_id'].'">'.$province['province_name'].'</option>';
                    } ?>
                </select>
                <select name="project_district_id" id="project_district_id" class="form-control" required>
                    <option value="">Chọn Quận - Huyện</option>
                </select>
                <select name="project_ward_id" id="project_ward_id" class="form-control" required>
                    <option value="">Chọn Phường - Xã</option>
                </select>
            </div> -->


        <div class="col-md-8 inline-flex">
            <label for="">Keyword (SEO)</label>
            <textarea name="project_keyword" id="project_keyword" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Description (SEO)</label>
            <textarea name="project_description" id="project_description" cols="30" rows="3" class="form-control"></textarea>
        </div>  

        <div class="col-md-8 inline-flex">
            <label for="">Hiển thị</label>
            <input type="checkbox" name="project_active" id="project_active" value="1" style="margin-top: 12px;" checked>
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

    // $(document).ready(function () {
    //     $('.select2').select2();
    //     $(".tags-field").select2({
    //         tokenSeparators: [','],
    //         tags: true,
    //     });
    //     $('input').attr('autocomplete','off');
    // });

  //   function clear_form_elements() {
  //   $('#add_post').find('input:text').attr('value','');
  //   $('#add_post').find('select > option').removeAttr('selected');
  // }

  $('#project_province_id').change(function (e) { 
        var district_id = '';
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?=base_url('admin/project/getListDistrict_byProvince')?>",
                data: {'district_id':district_id,'province_id':$(this).val()},
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
                data: {'ward_id':ward_id,'district_id':$(this).val()},
                success: function (response) {
                    $('#project_ward_id').html(response);
                }
            });
        });
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