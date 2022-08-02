  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('dashboard')}}" class="brand-link">
      <img src="{{asset('images/favicon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{user('name')}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- bệnh nhân --}}
          <li class="nav-header ative-menu"><i class="ion ion-person-add nav-icon"></i>BỆNH NHÂN</li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/insurance/add')}}" class="nav-link">
              <p>Thêm bệnh nhân</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/insurance/all')}}" class="nav-link">
              <p>Bệnh nhân & bảo hành</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/insurance/contact')}}" class="nav-link">
              <p>Bệnh nhân liên hệ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/insurance/old-customer')}}" class="nav-link">
              <p>Bệnh nhân hết bảo hành</p>
            </a>
          </li>
          {{-- bệnh nhân --}}
          <li class="nav-header  ative-menu"><i class="nav-icon fas fa-th nav-icon"></i>CHỨC NĂNG</li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/product')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/blog')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Bài viết
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/page')}}" class="nav-link">
              <i class="nav-icon fas fa-copy nav-icon"> </i> 
              <p>
                Trang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/card')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Thẻ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('dashboard/user')}}" class="nav-link">
              <i class="ion ion-person-add nav-icon"></i>
              <p>
                Quản trị viên
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('logout')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Đăng xuất</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>