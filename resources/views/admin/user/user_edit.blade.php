@extends('layouts.admin.index')
@section('content')

<section class="content-header">
    <h1>User Edit</h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="box">
            <div class="box-body">
                    <p>Back</p>
                    <a href="/admin/user" class="btn btn-default btn-flat pull-right">Back</a>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                @if(!empty($message['info']))
                    @if($message['info']['success'])
                        <div class="alert alert-success"> {{ $message['info']['message'] }} </div>
                    @else
                        <div class="alert alert-danger"> {{ $message['info']['message'] }} </div>
                    @endif
                @endif

                @if(!empty($message['pass']))
                    @if($message['pass']['success'])
                        <div class="alert alert-success"> {{ $message['pass']['message'] }} </div>
                    @else
                        <div class="alert alert-danger"> {{ $message['pass']['message'] }} </div>
                    @endif
                @endif

                <div class="box-bor clearfix">
                    <form method="post" id="infoForm">
                        {{ csrf_field() }}
                        <h4>■Edit</h4>
                        <input name="edittype" value="editinfo" type="hidden">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>
                                    <p class="text-red" id="name_error"></p>
                                    <input id="name" name="name" value="{{ $user->name }}"  type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <p class="text-red" id="email_error"></p>
                                    <input id="email" name="email" value="{{ $user->email }}"  type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <button id="confirmInfo" type="button" class="btn btn-primary btn-flat">Edit</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </form>
                </div>

                <div class="box-bor clearfix">
                    <h4>■Lock User</h4>

                    <div class="col-md-12">
                        <div class="pull-right">
                            <label class="switch">
                                <?php $locked = ($user->avail_flg==0)? 'checked' : ''; ?>
                                <input id="lockuser" type="checkbox" {{ $locked }}>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>

                    {{--<div class="col-md-12">
                        <form method="post" id="lockForm">
                            {{ csrf_field() }}
                            <input name="edittype" value="lock_user" type="hidden">
                            <button id="comfirmLock" type="button" class="btn btn-danger btn-flat pull-right">Lock</button>
                        </form>
                    </div>--}}
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            function validateName() {
                $('#name_error').html("");
                if ($.trim($('#name').val()) == '') {
                    $('#name_error').html('The field is require');
                    return false;
                }
                return true;
            }

            function validateEmail() {
                $('#email_error').html('');
                var email = $('#email').val();

                if ($.trim(email) == '') {
                    $('#email_error').html('The field is require');
                    return false;
                }
                return true;
            }

            $('#confirmInfo').click(function(){
                if($('#email').val() != '{{ $user->email }}') {
                    $.ajax({
                        type: 'post',
                        url: '{{route("admin.user.counduser")}}',
                        data: {'email': $('#email').val().trim()},
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (result) {
                            if (result.count > 0) {
                                $('#email_error').html('This email is already exist');
                            }
                            else {
                                var valName = validateName();
                                var valEmail = validateEmail();
                                if (valName && valEmail) {
                                    $('#infoForm').submit();
                                }
                            }
                        }
                    });
                }
                else {
                    var valName = validateName();
                    var valEmail = validateEmail();
                    if (valName && valEmail) {
                        $('#infoForm').submit();
                    }
                }
            });

            $('#lockuser').on('change',function(){
                var check = ($(this).is(':checked'))? 0 : 1;
                $.ajax({
                    type: 'post',
                    url: '{{route("admin.user.lock.user")}}',
                    data: {'id': <?php echo $user->id ?>, 'available': check},
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                });
            });

            $('#comfirmLock').click(function(){
                var r = confirm("Are you sure to lock this user?");
                if (r == true) {
                    $('#lockForm').submit();
                }
            });
        });
    </script>
    <style>
        input {
            width: 40% !important;
        }
    </style>
</section>

@endsection
