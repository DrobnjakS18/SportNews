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
                  <li><a><i class="fa fa-users"></i> Admins <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ route('admin.admins.create') }}">Add</a></li>
                        <li><a href="{{ route('admin.admins') }}">All</a></li>
                      </ul>
                  </li>
{{--                   <li><a><i class="fa fa-user" aria-hidden="true"></i> Users <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.users.unverified') }}">Unverified</a></li>--}}
{{--                          <li><a href="{{ route('admin.users.verified') }}">Verified</a></li>--}}
{{--                          <li><a href="{{ route('admin.users') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li> --}}
{{--                   <li><a><i class="fa fa-question"></i> Questions <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.questions.unverified') }}">Unverified</a></li>--}}
{{--                          <li><a href="{{ route('admin.questions.verified') }}">Verified</a></li>--}}
{{--                          <li><a href="{{ route('admin.questions') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li> --}}
{{--                  <li><a><i class="fa fa-file"></i> Demos <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.demos') }}">All</a></li>--}}
{{--                          <li><a href="{{ route('admin.demos.create') }}">Add</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}
{{--                  <li><a><i class="fa fa-exclamation-circle"></i> Answers <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.answers.unverified') }}">Unverified</a></li>--}}
{{--                          <li><a href="{{ route('admin.answers.verified') }}">Verified</a></li>--}}
{{--                          <li><a href="{{ route('admin.answers') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}
{{--                  <li><a><i class="fa fa-graduation-cap"></i> Tutorials <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.tutorials.create') }}">Add</a></li>--}}
{{--                          <li><a href="{{ route('admin.tutorials') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}
{{--                  <li><a><i class="fa fa-file-code-o"></i> Docs <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.documentation.api.versions') }}">API & Devs Docs versions</a></li>--}}
{{--                          <li><a href="{{ route('admin.documentation.developer') }}">Developer Docs</a></li>--}}
{{--                          <li><a href="{{ route('admin.documentation.api') }}">API Docs</a></li>--}}
{{--                          <li><a href="#">Modelar Docs</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}
{{--                  <li><a><i class="fa fa-question-circle"></i> FAQs <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.faqs.create') }}">Add</a></li>--}}
{{--                          <li><a href="{{ route('admin.faqs') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}
{{--                  <li><a><i class="fa fa-newspaper-o"></i> Blog <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.blog.create') }}">Add</a></li>--}}
{{--                          <li><a href="{{ route('admin.blog') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}
{{--                  <li><a><i class="fa fa-comments-o"></i> Testimonials <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          <li><a href="{{ route('admin.testimonials.create') }}">Add</a></li>--}}
{{--                          <li><a href="{{ route('admin.testimonials') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}
{{--                  <li><a><i class="fa fa-money"></i> Pricings <span class="fa fa-chevron-down"></span></a>--}}
{{--                      <ul class="nav child_menu">--}}
{{--                          --}}{{-- <li><a href="">Add</a></li> --}}
{{--                          <li><a href="{{ route('admin.pricings') }}">All</a></li>--}}
{{--                      </ul>--}}
{{--                  </li>--}}

              </ul>
          </div>
      </div>
      <!-- /sidebar menu -->
    </div>
</div>
