<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Languages support</title>
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
            '/front/js/popper.min.js',
            '/front/js/bootstrap.min.js',
            '/front/js/jquery.validate.js',
        ];
        ?>
		{!! renderCss($arrayCss) !!}
		{!! renderJs($arrayJs) !!}
        {!! Html::style('admin/front/css/font-awesome.min.css') !!}
    </head>
    <body>
        @include('layouts.frontend.navigate_bar')
        <div class="container">
			@yield('content')
        </div>
		@yield('script')
    </body>
</html>