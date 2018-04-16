<nav class="navbar navbar-expand-md navbar-light nav-main fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main" aria-controls="nav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-main">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item {{ Request::is('admin/login') ? 'active' : '' }}">
                        <a href="{{ route('login') }}" class="nav-link">
                            登入
                        </a>
                    </li>
                @else
                    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                        <a href="{{ route('admin.home.index') }}" class="nav-link">
                            首頁
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('admin/posts*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            文章
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('admin.posts.index') }}" class="dropdown-item">一覽</a>
                            <a href="{{ route('admin.posts.add') }}" class="dropdown-item">新增</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('admin/items*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            品項
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('admin.items.index') }}" class="dropdown-item">一覽</a>
                            <a href="{{ route('admin.items.add') }}" class="dropdown-item">新增</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('admin/itemElements*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            品項選項
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('admin.itemElements.index', ['type' => 'Country']) }}" class="dropdown-item">國家</a>
                            <a href="{{ route('admin.itemElements.index', ['type' => 'First Genre']) }}" class="dropdown-item">類型一</a>
                            <a href="{{ route('admin.itemElements.index', ['type' => 'Second Genre']) }}" class="dropdown-item">類型二</a>
                            <a href="{{ route('admin.itemElements.index', ['type' => 'First Unit']) }}" class="dropdown-item">單位一</a>
                            <a href="{{ route('admin.itemElements.index', ['type' => 'Second Unit']) }}" class="dropdown-item">單位二</a>
                            <a href="{{ route('admin.itemElements.index', ['type' => 'Bestseller']) }}" class="dropdown-item">暢銷排行榜</a>
                            <a href="{{ route('admin.itemElements.index', ['type' => 'Keyword']) }}" class="dropdown-item">熱門檢索詞</a>
                            <a href="{{ route('admin.itemElements.index', ['type' => 'Speciality']) }}" class="dropdown-item">精選酒款</a>
                            <a href="{{ route('admin.itemElements.add') }}" class="dropdown-item">新增</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.items.index') }}" target="_blank" class="nav-link">
                            回到前台
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            登出
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>