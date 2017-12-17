<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="trangchu">Trang Chủ</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Giới thiệu</a>
                </li>
                <li>
                    <a href="#">Liên hệ</a>
                </li>
                <li>
                    <a href="forum">Diễn đàn</a>
                </li>
            </ul>

            <form class="navbar-form navbar-left"  action="search" method="get" role="search">
            
          <div class="form-group">
            <input type="text" class="form-control" name="key" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
      </form>

      <ul class="nav navbar-nav pull-right">
            @if(!Auth::check())
                <li>
                    <a href="signup">Đăng ký</a>
                </li>
                <li>
                    <a href="login">Đăng nhập</a>
                </li>
             @else
                <li>
                  <a href='sua/{{ Auth::user()->id }}'>
                    <span class ="glyphicon glyphicon-user"></span>
                    {{ Auth::user()->name }}
                  </a>
                </li>

                <li>
                  <a href="logout">Đăng xuất</a>
                </li>
              @endif
            </ul>
        </div>



        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
