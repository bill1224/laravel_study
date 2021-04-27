<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @notifyJs
    <x:notify-messages />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- jquery -->
    <script src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="/css/main.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @notifyCss
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="h-screen">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 h-full flex flex-col">
            @yield('content')
        </main>
    </div>
</body>

    <script type="text/javascript">
        $(function(){ 
            $(".popup_user dt").click(function(){
                
                if($(this).next().css("display") == "none"){
                    $(this).next().slideDown(200);
                }else{
                    $(this).next().slideUp(200);                    
                }
                
            });
        });

        $(document).ready(function() {

            var test = $('#setTimeout_xp');
            var moveTimer;

            test.on("mouseout",function(){
                $('#show_xp').css("display", 'none');
                clearTimeout(moveTimer);
            });

            test.on("mousemove",function(){        
                clearTimeout(moveTimer);
                moveTimer = setTimeout(function(){
                $('#show_xp').css("display", 'inline-block');
                },700)

                $('#show_xp').css("display", 'none');
            });
        });

        /* 단축키 추가하기 */
        var shortcut = new Array();
        shortcut['w'] = "/forum/"; /* 새 글 쓰기 */
        shortcut['h'] = "/"; /* 새 글 쓰기 */

        $(document).keypress(function(e){
            var key = e.key;
            var tagName = e.target.tagName;

            if(tagName!='INPUT' && tagName!='TEXTAREA'){
                key = key.toLowerCase();

                for (var i in shortcut){
                    if (key == i){
                        window.location = shortcut[i];
                    }
                }
            }
        });
    </script>
</html>
