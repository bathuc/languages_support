<div class="btn-top"></div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-6 col-xs-6">
                <div class="header-left">
                    <div id="logo" class="logo">
                        <a href="#!">
                            <img src="/front/images/logo.png" alt="logo" >
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-6 col-xs-6">
                <div class="icontopmenu">
                    <div class="dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown"><img src="/front/images/user.png"></div>
                        <div class="dropdown-menu pull-right">
                            <li><a target="_blank" href="{{route('admin.login')}}">Admin</a></li>
                            <li><a href="{{route('hiragana')}}">Hiragana</a></li>
                            <li><a href="{{route('katakana')}}">Katakana</a></li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu-main">
    <div class="container">
        <div class="row">
        	<nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" onclick="menuMobile(this)">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </button>

                @include('layouts.frontend.navigate_bar')
            </nav>
        </div>
    </div>
</div>