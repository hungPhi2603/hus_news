<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="admin/dashboard">
                    <h1>Hus News</h1>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>Thể Loại</a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fas fa-table"></i>Loại Tin</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Tin Tức</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-users"></i>Người Dùng</a>
                </li>
                
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <h1>Hus News</h1>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                
                <li>
                    <a href="admin/category">
                        <i class="fas fa-chart-bar"></i>Thể Loại</a>
                </li>
                <li>
                    <a href="admin/newstype">
                        <i class="fas fa-table"></i>Loại Tin</a>
                </li>
                <li>
                    <a href="admin/news">
                        <i class="far fa-check-square"></i>Tin Tức</a>
                </li>
                <li>
                    <a href="admin/slide">
                        <i class="far fa-check-square"></i>Slide</a>
                </li>
                <li>
                    <a href="admin/user">
                        <i class="fas fa-users"></i>Người Dùng</a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>

@section('script1')
<!-- remove all .active Neu url == href thi add .active -->
<script type="text/javascript">
    $(document).ready(function() {
        var url = location.pathname.split('/').slice(1)[3];
        
        jQuery('ul.navbar__list a').each(function() {
            $(this).parent().removeClass('active');
            if($(this).attr('href').split('/').slice(-1)[0] == url)
                $(this).parent().addClass('active');
        });
    });
</script>
@endsection