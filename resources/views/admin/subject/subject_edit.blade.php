@extends('layouts.admin.index')
@section('content')

<section class="content-header">
    <h1>Subject Edit</h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="box">
            <div class="box-body">
                    <p>Back</p>
                    <a href="/admin/subject" class="btn btn-default btn-flat pull-right">Back</a>
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
                                <th>English</th>
                                <td>
                                    <p class="text-red" id="name_eng_error"></p>
                                    <input id="name_eng" name="name_eng" value="{{ $subject->name_eng }}"  type="text" class="box_inline form-control w50">
                                </td>
                            </tr>
                            <tr>
                                <th>Viet</th>
                                <td>
                                    <p class="text-red" id="name_vi_error"></p>
                                    <input id="name_vi" name="name_vi" value="{{ $subject->name_vi }}"  type="text" class="box_inline form-control w50">
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
                    <h4>■Delete Subject</h4>

                    <div class="col-md-12">
                        <form method="post" id="dellForm">
                            {{ csrf_field() }}
                            <input name="edittype" value="delete_subject" type="hidden">
                            <button id="comfirmDelete" type="button" class="btn btn-danger btn-flat pull-right">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            function validateEnglish() {
                $('#name_eng_error').html("");
                if ($.trim($('#name_eng').val()) == '') {
                    $('#name_eng_error').html('The field is require');
                    return false;
                }
                if ($('#name_eng').val().length > 255) {
                    $('#name_eng_error').html('subject must be less than 255 characters');
                    return false;
                }

                return true;
            }

            function validateViet() {
                $('#name_vi_error').html('');
                var name_vi = $('#name_vi').val();

                if ($.trim(name_vi) == '') {
                    $('#name_vi_error').html('The field is require');
                    return false;
                }

                if (name_vi.length > 255) {
                    $('#name_vi_error').html('Viet must be less than 255 characters');
                    return false;
                }

                return true;
            }

            $('#confirmInfo').click(function(){
                if($('#name_eng').val() != '{{ $subject->name_eng }}') {
                    $.ajax({
                        type: 'post',
                        url: '{{route("admin.subject.coundsubject")}}',
                        data: {'name_eng': $('#name_eng').val().trim()},
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (result) {
                            if (result.count > 0) {
                                $('#name_eng_error').html('This Subject is already exist');
                            }
                            else {
                                var valEnglish = validateEnglish();
                                var valViet = validateViet();
                                if (valEnglish && valViet) {
                                    $('#infoForm').submit();
                                }
                            }
                        }
                    });
                }
                else {
                    var valEnglish = validateEnglish();
                    var valViet = validateViet();
                    if (valEnglish && valViet) {
                        $('#infoForm').submit();
                    }
                }
            });

            $('#comfirmDelete').click(function(){
                var r = confirm("Are you sure to delete this subject?");
                if (r == true) {
                    $('#dellForm').submit();
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
