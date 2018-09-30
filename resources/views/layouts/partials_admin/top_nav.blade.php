<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="
                <?php 
                if(isset($user))
                    echo "admin/user/search";
                else if (isset($category))
                    echo "admin/category/search";
                else if (isset($newstype))
                    echo "admin/newstype/search";
                else if (isset($news))

                    echo "admin/news/search";
                ?>
                " method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="au-input au-input--xl" type="text" name="keyword" placeholder="Tìm kiếm..." id="myInput" />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="upload/user/{{Auth::user()->avatar}}" alt="Avatar" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="upload/user/{{Auth::user()->avatar}}" alt="Avatar" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{Auth::user()->name}}</a>
                                        </h5>
                                        <span class="email">{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    
                                    <div class="account-dropdown__item">
                                        <a href="admin/user/edit/{{Auth::user()->id}}">
                                            <i class="zmdi zmdi-settings"></i>Cài đặt</a>
                                    </div>
                                    
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="admin/logout">
                                        <i class="zmdi zmdi-power"></i>Đăng xuất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--  -->