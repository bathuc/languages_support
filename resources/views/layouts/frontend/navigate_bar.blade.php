<?php
    $url = URL::current();
    $hiraganaActive = strpos($url, 'hiragana') ? 'active' : '';
    $katakanaActive = strpos($url, 'katakana') ? 'active' : '';
    $tensesActive = strpos($url, 'tenses') ? 'active' : '';
    $wordsActive = strpos($url, 'words') ? 'active' : '';
    $phrasesActive = strpos($url, 'phrases') ? 'active' : '';
?>
<div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link {{ $hiraganaActive }}" href="{{route('hiragana')}}">Hiragana</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link {{ $katakanaActive }}" href="{{route('katakana')}}">Katakana</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link {{ $tensesActive }}" href="{{route('tenses')}}">Tenses</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link {{ $wordsActive }}" href="{{route('words')}}">Words</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link {{ $phrasesActive }}" href="{{route('phrases')}}">Phrases</a>
        </li>
    </ul>
</div>