@php
    $check0 = ($wordNumber == 0)? 'checked' : '';
    $check1 = ($wordNumber == 1)? 'checked' : '';
    $check2 = ($wordNumber == 2)? 'checked' : '';
    $check3 = ($wordNumber == 3)? 'checked' : '';
    $checkRandom = ($wordNumber === 'random')? 'checked' : '';
@endphp
<div class="pt-3"></div>

<div class="header-row d-flex flex-wrap justify-content-between align-items-center m-2">
    <div class="d-none d-lg-block">
        <input type="radio" name="wordNumber" id="wordRadio0" value="0" {{ $check0 }} >
        <label for="wordRadio0">First 40 words</label>
    </div>
    <div class="d-none d-lg-block">
        <input type="radio" name="wordNumber" id="wordRadio1" value="1" {{ $check1 }}>
        <label for="wordRadio1">40 - 80 words</label>
    </div>
    <div class="d-none d-lg-block">
        <input type="radio" name="wordNumber" id="wordRadio2" value="2" {{ $check2 }}>
        <label for="wordRadio2">80 - 120 words</label>
    </div>
    {{--<div class="d-none">
        <input type="radio" name="wordNumber" id="wordRadio3" value="3" {{ $check3 }}>
        <label for="wordRadio3">120 -160 words</label>
    </div>--}}
    <div class="d-none d-lg-block">
        <input type="radio" name="wordNumber" id="wordRandom" value="random" {{ $checkRandom }}>
        <label for="wordRandom">Random</label>
    </div>
    <div class="d-flex align-items-center">
        <label for="showTime" class="pr-2">Time</label>
        <input type="number" name="showTime" id="showTime" class="form-control" value="{{ $showTime }}">
    </div>

    <div class="">
        <select id="range" name="range" class="box_inline form-control w25">
            @for($i = 0; $i<=$range; $i++)
                @if($wordNumber ==$i)
                    <option value="{{ $i }}" selected="selected">{{ $i*40 }} - {{ ($i+1)*40 }} words</option>
                @else
                    <option value="{{ $i }}">{{ $i*40 }} - {{ ($i+1)*40 }} words</option>
                @endif
            @endfor
        </select>
    </div>

    <div>
        <select name="subjectId" id="dropDownId" class="form-control w50">
            @foreach($subject as $item)
                @if($subjectId == $item->id)
                    <option value="{{ $item->id }}" selected="selected">{{ $item->name_vi }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->name_vi }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div>
        <button type="button" class="btn btn-success play-sound header-block">Play</button>
    </div>
</div>

@if(!empty($word))
    <div class="word-space"></div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <span id="hira_show">{{ $word['word'] }}</span>
            <div class="page-content pt-3">
                <div class="wrapper-word">
                    <div class="show-meaning" style="display: none">
                        @if(!empty($word['sound']))
                            <audio autoplay class="audio">
                                <source src="{{$word['sound']}}" type="audio/mpeg">
                            </audio>
                        @endif
                        @if(!empty($word['ipa']))
                            <span>{{$word['ipa']}}</span><br>
                        @endif
                        <p id="meaning">​</i>{{ $word['meaning'] }}</p>
                        @if(!empty($word['example']))
                            <span id="example">{{ $word['example'] }}</span><br>
                        @endif
                        @if(!empty($word['example1']))
                            <span id="example1" class="d-none d-sm-block">{{ $word['example1'] }}</span><br>
                        @endif
                    </div>
                </div>

                <button class="btn btn-primary btn-lg btn-next">Next Word</button>
            </div>
        </div>
        <div class="d-none d-lg-block col-lg-6">
            <table class="table table-bordered info-table" cellspacing="0" cellpadding="0">
                <tbody>
                @for($i=0; $i<count($wordList)+1; $i++)
                    <tr>
                        @for($j = 0; $j<5; $j++)
                            @php $index = $i*5 + $j; @endphp
                            @if(isset($wordList[$index]))
                                <td>
                                    <a href="javascript:void(0)" class="word"
                                       data-word-id="{{ $wordList[$index]['id'] }}">{{ $wordList[$index]['word'] }}</a>
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>

@endif
<script>
    $(document).ready(function () {
        $('.btn-next').click(function () {
            getNextWord();
        });

        $('input[name=wordNumber]').change(function() {
            getNextWord();
        });

        $('#dropDownId').on('change', function () {
            getNextWord();
        });

        function getNextWord() {
            var range = $('#range').val();
            var wordNumber = $('input[name=wordNumber]:checked').val();
            if(wordNumber == undefined) {
                wordNumber = range;
            }
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '{{ route('word.random') }}',
                data: {
                    'wordNumber': wordNumber,
                    'showTime': $('input[name=showTime]').val(),
                    'subjectId': $('#dropDownId').val(),
                },
                success: function (respond) {
                    $('#ajaxBox').html(respond);
                }
            });
        }

        $('#range').change(function() {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '{{ route('word.random') }}',
                data: {
                    'wordNumber': $('#range').val(),
                    'showTime': $('input[name=showTime]').val(),
                    'subjectId': $('#dropDownId').val(),
                },
                success: function (respond) {
                    $('#ajaxBox').html(respond);
                }
            });
        });

        var showTime = {{ $showTime }} * 1000;
        setTimeout(function () {
            $('.show-meaning').show();
        }, showTime);

        /*$('.btn-show-meaning').click(function () {
            $('.show-meaning').show();
        });*/

        var soundPath = "{{$word['sound']}}";
        var sounnd = new Audio(soundPath);
        $('#hira_show').click(function(){
            sounnd.play();
        });

        $('.word').click(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '{{ route('word.random') }}',
                data: {
                    'wordId': $(this).data('word-id'),
                    'wordNumber': $('input[name=wordNumber]:checked').val(),
                    'showTime': $('input[name=showTime]').val(),
                    'subjectId': $('#dropDownId').val(),
                },
                success: function (respond) {
                    $('#ajaxBox').html(respond);
                }
            });
        });

        $('.play-sound').click(function(){
            var soundList = @json($wordSound);
            var showTime = $('#showTime').val();
            var soundTime = 0;
            soundList.forEach(function(sound){
                setTimeout(function (sound){
                    $('#hira_show').html(sound.word);
                    var html = '<span>'+sound.ipa+'</span><br>'+
                                '<p id="meaning">​</i>'+sound.meaning+'</p>'+
                                '<span id="example">'+sound.example+'</span><br>'+
                                '<span id="example1" class="d-none d-sm-block">'+sound.example1+'</span><br>';
                    $('.show-meaning').html(html).show();
                    var audio = new Audio(sound.sound);
                    audio.play();
                }, soundTime, sound);
                soundTime += showTime * 1000;
            });
        });

        $('#example').click(function(){
            var isMobile = '{{MainHelper::isMobile()}}';
            var example = $('#example').html();
            var example1 = $('#example1').html();

            console.log('mobile',isMobile);
            console.log('example',example);
            console.log('example1',example1);
            if(isMobile == '1'){
                $('#example').html(example1);
                $('#example1').html(example);

            }
        });
    });
</script>


