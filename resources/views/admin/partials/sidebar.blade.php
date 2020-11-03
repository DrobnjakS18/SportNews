<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin.dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>SportsNews</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('gentelella/production/images/img.jpg') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</h2>
            </div>
            <div class="clearfix"></div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
              <ul class="nav side-menu">
                  <li><a><i class="fa fa-list" aria-hidden="true"></i> General Settings <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
{{--                          <li><a href="{{ route('admin.email') }}">Email</a></li>--}}
                      </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Admins <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="{{ route('admin.admins.create') }}">Add</a></li>
                          <li><a href="{{ route('admin.admins') }}">All</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="{{ route('users.create') }}">Add</a></li>
                          <li><a href="{{ route('users.users') }}">All</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-newspaper-o"></i> Articles <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="{{ route('admin.post.unverified') }}">Unverified</a></li>
                          <li><a href="{{ route('admin.post.verified') }}">Verified</a></li>
                          <li><a href="{{ route('admin.post.index') }}">All</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-comments"></i> Comments <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="{{ route('admin.comment.unverified') }}">Unverified</a></li>
                          <li><a href="{{ route('admin.comment.verified') }}">Verified</a></li>
                          <li><a href="{{ route('admin.comment.index') }}">All</a></li>
                      </ul>
                  </li>
{{--                  <li><a><i class="fa fa-comment"></i> Answers to Commants<span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('users.create') }}">Add</a></li>--}}
{{--                          <li><a href="{{ route('users.users') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}

              </ul>
          </div>
      </div>
      <!-- /sidebar menu -->
    </div>
</div>
