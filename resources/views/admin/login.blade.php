<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in - Zenrin Call System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ URL::to('/admin/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::to('/admin/') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::to('/admin/') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::to('/admin/') }}/dist/css/AdminLTE.min.css">
    <!-- Fix Style -->
    <link rel="stylesheet" href="{{ URL::to('/admin/') }}/dist/css/style.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::to('/admin/') }}/plugins/iCheck/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ URL::to('/admin/') }}/css/custom-styles.css">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<div class="login-box login-frm">
    <div class="login-logo">
        <a href="{{ URL::to('/auth/') }}"><b>Thuc</b>App</a>
    </div>
    <div class="login-box-body">
        @if($errors)
            <p class="login-box-msg">{{ $errors }}</p>
        @endif
        <form  method="POST">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="email" class="form-control"autofocus>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
