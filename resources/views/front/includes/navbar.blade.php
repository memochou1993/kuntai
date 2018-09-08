<nav class="navbar navbar-expand-md navbar-light nav-main fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            &nbsp;
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main" aria-controls="nav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-main">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if (Request::is('/')) {{ 'active' }} @endif">
                    <a href="{{ route('front.home.index') }}" class="nav-link">
                        首頁
                    </a>
                </li>
                {{-- <li class="nav-item @if (Request::is('items') or Request::is('items*')) {{ 'active' }} @endif">
                    <a href="{{ route('front.items.index') }}" class="nav-link">
                        酒款一覽
                    </a>
                </li> --}}
                <li class="nav-item @if (Request::is('about')) {{ 'active' }} @endif">
                    <a href="{{ route('front.home.about') }}" class="nav-link">
                        門市資訊
                    </a>
                </li>
                <li class="nav-item @if (Request::is('contact')) {{ 'active' }} @endif">
                    <a href="{{ route('front.home.contact') }}" class="nav-link">
                        連絡我們
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a href="{{ route('admin.home.index') }}" target="_blank" class="nav-link">
                            回到後台
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
                @endauth
            </ul>
        </div>
    </div>
</nav>