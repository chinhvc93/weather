<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Project 3
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ request()->is('data/import') ? 'active' : '' }}">
                <a class="nav-link" href="{{route("data.import")}}">
                    <i class="material-icons">dashboard</i>
                    <p>Nhập dữ liệu</p>
                </a>
            </li>
            {{--<li class="nav-item {{ request()->is('dashboard/analysis') ? 'active' : '' }} ">--}}
                {{--<a class="nav-link" href="{{route("home.analysis")}}">--}}
                    {{--<i class="material-icons">content_paste</i>--}}
                    {{--<p>Thống kê</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="nav-item {{ request()->is('analysis/by-days') ? 'active' : '' }} ">
                <a class="nav-link" href="{{route("analysis.byDay")}}">
                    <i class="material-icons">content_paste</i>
                    <p>Thống kê theo ngày</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('analysis/by-hours') ? 'active' : '' }} ">
                <a class="nav-link" href="{{route("analysis.byHour")}}">
                    <i class="material-icons">content_paste</i>
                    <p>Thống kê theo giờ</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('analysis/by-minutes') ? 'active' : '' }} ">
                <a class="nav-link" href="{{route("analysis.byMinute")}}">
                    <i class="material-icons">content_paste</i>
                    <p>Thống kê theo phút</p>
                </a>
            </li>
        </ul>
    </div>
</div>