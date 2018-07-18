<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>My default App</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="/favicon.ico?v=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<?php
        $arrayCss = [
            '/front/css/bootstrap.min.css',
            '/front/css/style.css',
            '/front/css/remodal-default-theme.min.css',
            '/front/css/remodal.css',
            '/front/vendor/cropper/css/cropper.css',
            '/front/css/responsive.css',
        ];
        $arrayJs = [
            '/front/js/jquery.min.js',
            '/front/js/bootstrap.min.js',
            '/front/js/jquery.validate.js',
            '/front/js/style.js',
            '/front/vendor/cropper/js/cropper.js',
            '/front/js/remodal.min.js',
            //'/front/vendor/byte-counter/utf8.js',
            '/front/vendor/byte-counter/eff.js'
        ];
        ?>
		{!! renderCss($arrayCss) !!}
		{!! renderJs($arrayJs) !!}
        {!! Html::style('admin/front/css/font-awesome.min.css') !!}
    </head>
    <body>
        @include('layouts.frontend.header')
        <div class="container">
			@yield('content')
        </div>
		@yield('script')
    </body>
</html>