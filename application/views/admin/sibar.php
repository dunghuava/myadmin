<style>
    .main-sidebar{
      background:<?=$setting['sibar_background_color']?>;
    }
    .main-sidebar *{
      color:<?=$setting['sibar_text_color']?> !important;
    }
    .main-sidebar .user-panel {
      border-bottom: 1px solid <?=$setting['sibar_text_color']?>;
    }
    .elevation-4{box-shadow:none !important}
    .app_say{
      font-size: 20px;
      font-weight: bold;
      display: block;
    }

    .number-contact{
      background-color: red;
      color: #fff;
      display: inline-block;
      padding-left: 8px;
      padding-right: 8px;
      text-align: center;
      border-radius: 50%
    }
</style>
<?php 
  function appSay(){
    $hour = date('H');
    $sayText ='';
    if ($hour>=0 && $hour <5){
      $sayText='Chào buổi tối';
    }else if ($hour>=5 && $hour<12){
      $sayText='Chào buổi sáng';
    }else if ($hour>=12 && $hour<=19){
      $sayText='Chào buổi chiều';
    }else if ($hour>=19 && $hour<=23){
      $sayText='Chào buổi tối';
    }
    return '<span class="app_say">'.$sayText.'</span>';
  }

?>

<input type="hidden" id="primary_color" value="<?=$setting['sibar_background_color']?>b0">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host"><div class="os-resize-observer observed" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer observed"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 483px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image" >
          <img onerror="this.src='dist/img/user.png'" style="width:35px;height:35px" src="dist/img/user.png" class="img-circle" alt="User Image">
        </div> -->
        <div class="info">
          <a href="javascript:void(0)" class="d-block">
              <?=appSay().''.$admin_infor['user_fullname']?>
              <!-- <span style="font-size: 11px;position: absolute;bottom: 0;right: 0;"><?=sprintf('%02d',$online)?> Online</span> -->
          </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?=$page_menu=='category' ? 'menu-open':''?>">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Danh mục
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/category',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Tất cả</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/category/add',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=$page_menu=='project' ? 'menu-open':''?>">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Dự án
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/project',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Tất cả</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/project/add',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Thêm dự án</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?=$page_menu=='sell' ? 'menu-open':''?>">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Bán
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/sell',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Tất cả</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/sell/add',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Thêm nhà đất bán</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview <?=$page_menu=='lease' ? 'menu-open':''?>">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Cho thuê
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/lease',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Tất cả</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/lease/add',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Thêm nhà đất cho thuê</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?=$page_menu=='post' ? 'menu-open':''?>">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/post',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Tất cả</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/post/add',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Thêm bài viết</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?=$page_menu=='extend' ? 'menu-open':''?>">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Mở rộng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/region',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Khu vực hiển thị</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/residential',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Khu dân cư</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/investor',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Chủ đầu tư</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?=$page_menu=='staff' ? 'menu-open':''?>">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Nhân viên
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/staff',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Tất cả</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/staff/add',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Thêm nhân viên</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?=getLink($arr_permissionAllowed,'admin/themes/orther',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Khác</p>
                </a>
              </li> -->
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?=$page_menu=='themes' ? 'menu-open':''?>">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Giao diện
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/themes/banner',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=getLink('admin/themes/domain',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Thông tin</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?=getLink($arr_permissionAllowed,'admin/themes/orther',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Khác</p>
                </a>
              </li> -->
            </ul>
          </li>

          <li class="nav-item has-treeview <?=$page_menu=='contact' ? 'menu-open':''?>">
            <a href="<?=getLink('admin/contact',$admin_infor['is_admin'])?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                <?php $list_contact = $this->Contact_M->all(['contact_status' => 0]); ?>
                Liên hệ 
                <?php if (count($list_contact) >0) {?>
                  <span class="number-contact"><?php echo count($list_contact) ?></span>
                <?php } ?>
              </p>
            </a>
          </li>

          <li class="nav-header">Nâng cao</li>
          <li class="nav-item has-treeview <?=$page_menu=='account' ? 'menu-open':''?> ">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Tài khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=getLink('admin/user',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Tất cả</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?=getLink('admin/user/add',$admin_infor['is_admin'])?>" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Thêm tài khoản</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview <?=$page_menu=='setting' ? 'menu-open':''?>">
            <a href="<?=getLink('admin/setting',$admin_infor['is_admin'])?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Cài đặt
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="admin/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"></i>
              <p>
                Exit
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 38.4738%; transform: translate(0px, 76.2274px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>