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
					<!--
                    <div class="header-sub">
                        <ul class="header-list-sub">
                            <li>
                                <a href="#!">求人情報検索</a>
                            </li>

                            <li>
                                <a href="#!">マイページ</a>
                            </li>
                        </ul>
                    </div>
					-->
                </div>
            </div>

            <div class="col-md-6 col-md-6 col-xs-6">
               	<div class="icontopmenu">
                    <div class="dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown"><img src="/front/images/user.png"></div>
                        <ul class="dropdown-menu pull-right">
                            <li><a target="_blank" href="{{route('admin.login')}}">Admin</a></li>
                            <li><a href="{{route('hiragana')}}">Hiragana</a></li>
                            <li><a href="{{route('katakana')}}">Katakana</a></li>
                        </ul>
                    </div>
<!-- 					<div class="dropdown"> -->
<!-- 						<div class="dropdown-toggle" data-toggle="dropdown"><img alt="image" src="../images/user.png" ><span class="badge pull-right top-notify" > 1 </span></div> -->
<!-- 						<ul class="dropdown-menu pull-right"> -->
<!-- 							<li><a href="#">求職者名様<span class="badge pull-right"> 42 </span> </a></li> -->
<!-- 							<li><a href="#">登録情報</a></li> -->
<!-- 							<li><a href="#">ログアウト </a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 					<div class="dropdown"> -->
<!-- 						<div class="dropdown-toggle" data-toggle="dropdown"><img alt="image" src="../images/mail.png" ><span class="badge pull-right top-notify" >3 </span></div> -->
<!-- 						<ul class="dropdown-menu pull-right"> -->
<!-- 							<li><a href="#"><table><tr><td><img alt="image" src="../images/mess_user.png" class="h40 mg_r10" ></td><td>求職者名〇〇〇〇<br > <span class="block-blue">世話になっております。この度は</span></td></tr></table></a></li> -->
<!-- 							<li><a href="#"><table><tr><td><img alt="image" src="../images/mess_user.png" class="h40 mg_r10" ></td><td>求職者名〇〇〇〇<br > <span class="block-blue">世話になっております。この度は</span></td></tr></table></a></li> -->
<!-- 							<li><a href="#"><table><tr><td><img alt="image" src="../images/mess_user.png" class="h40 mg_r10" ></td><td>求職者名〇〇〇〇<br > <span class="block-blue">世話になっております。この度は</span></td></tr></table></a></li> -->
<!-- 							<li><a href="#"><table><tr><td><img alt="image" src="../images/mess_user.png" class="h40 mg_r10" ></td><td>求職者名〇〇〇〇<br > <span class="block-blue">世話になっております。この度は</span></td></tr></table></a></li> -->
<!-- 							<li><a href="#"><table><tr><td><img alt="image" src="../images/mess_user.png" class="h40 mg_r10" ></td><td>求職者名〇〇〇〇<br > <span class="block-blue">世話になっております。この度は</span></td></tr></table></a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 					<div class="dropdown"> -->
<!-- 						<div class="dropdown-toggle" data-toggle="dropdown"><img alt="image" src="../images/ring.png" ><span class="badge pull-right top-notify" > 5 </span></div> -->
<!-- 						<ul class="dropdown-menu pull-right"> -->
<!-- 							<li><a href="#">Ring Settings</a></li> -->
<!-- 							<li><a href="#">Ring </a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 					<div class="dropdown"> -->
<!-- 						<div class="dropdown-toggle" data-toggle="dropdown"><img alt="image" src="../images/menu.png" ><span class="badge pull-right top-notify" > 2 </span></div> -->
<!--     						<ul class="dropdown-menu pull-right"> -->
<!--     							<li><a href="#">運営会社情報</a></li> -->
<!--     							<li><a href="#">利用規約</a></li> -->
<!--     							<li><a href="#">特定商取引法に基づく表記</a></li> -->
<!--     							<li><a href="#">個人情報保護方針</a></li> -->
<!--     							<li><a href="#">サイトマップ</a></li> -->
<!--     						</ul> -->
<!-- 					</div> -->
				</div>
            </div>
        </div>
    </div>
</div>

<div class="menu-main">
    <div class="container">
        <div class="row">
        	<nav class="navbar navbar-expand-lg navbar-light bg-light">
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