<?php
    $url = URL::current();
    $hiraganaActive = strpos($url, 'hiragana') ? 'active' : '';
    $katakanaActive = strpos($url, 'katakana') ? 'active' : '';
    $tensesActive = strpos($url, 'tenses') ? 'active' : '';
    $wordsActive = strpos($url, 'words') ? 'active' : '';
    $phrasesActive = strpos($url, 'phrases') ? 'active' : '';
?>
<div class="logo-menu">
  <div class="logo-wrapper container d-flex justify-content-between align-items-center">
    <h1 class="text-success">languages</h1>
    <div class="user-login">
        <a target="_blank" href="{{route('admin.login')}}"><img src="/front/images/user.png"></a>
    </div>
  </div>
</div>

{{--  add active in a.nav-link for active menu  --}}
<div class="navigation-bar">
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-expand-sm">
        <button class="navbar-toggler" type="button" onclick="menuMobile(this)">
          <span class="bar1"></span>
          <span class="bar2"></span>
          <span class="bar3"></span>
        </button>

        {{--right bar--}}
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link {{ $wordsActive }}" href="{{route('words')}}">Words</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link {{ $phrasesActive }}" href="{{route('phrases')}}">Phrases</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link {{ $tensesActive }}" href="{{route('tenses')}}">Tenses</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ $hiraganaActive }}" href="{{route('hiragana')}}">Hiragana</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link {{ $katakanaActive }}" href="{{route('katakana')}}">Katakana</a>
              </li>

          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>

<script>
  function menuMobile(event) {
    event.classList.toggle("change");
  }
  $(document).ready(function () {
    $(".navbar-toggler").click(function () {
      $(".collapse").slideToggle(300);
    });
  });
</script>
