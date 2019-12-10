@extends('inc.user')
@section('main_content')

<h1>exam</h1>
<?php
$x=0;
 
$x_id=0;
?>
@foreach($units as $unit)
    <input type="radio" name="radio_unit" id="choose_unit{{$x_id}}" >{{$unit[0]->unit}}
    <?php
        $x_id++ ;
    ?>
@endforeach
<?php
    $x_id = 0;  
?>
@foreach($units as $unit)
        <?php
        $num = count($unit);
        ?>
        <div id="unit{{$x_id}}" style="display: none" >
            <?php
                $x_id++; 
            ?>
        {!! Form::open(['action' => [ 'examController@calculate' ,$num , $sub_id ], 'method' => 'POST']) !!}

        @foreach($unit as $question)
        <div class="border bborder-secondaryy " style="margin-bottom:50px">

                <div class="question jumbotron" >
                        {{$question->question}}
            </div>
        </div>
            <!--start of if statments-->
        @if($question->question_type=='اختر')
        <!-- put the four answers in an array-->
        <?php
        $answers = array($question->right_answer,
        $question->wrong_answer1,
        $question->wrong_answer2,
        $question->wrong_answer3);
        shuffle($answers);

        ?>
        <!--shuffle the array -->
        {{Form::label('title','الاجابه')}}<br>
        <input  name='answer{{$x}}' type='radio' value='{{$answers[0]}}_{{$question->id}}' /> {{$answers[0]}} <br>
        <input  name='answer{{$x}}' type='radio' value='{{$answers[1]}}_{{$question->id}}' /> {{$answers[1]}} <br>
        <input  name='answer{{$x}}' type='radio' value='{{$answers[2]}}_{{$question->id}}' /> {{$answers[2]}} <br>
        <input  name='answer{{$x}}' type='radio' value='{{$answers[3]}}_{{$question->id}}' /> {{$answers[03]}} <br>
        <?php
        $x++;
        ?>
        @endif

                @if($question->question_type=='اكمل')
                        <div class="form-group">
                            {{Form::label('title','الاجابه')}}
                        <input type="hidden" name="answer{{$x}}" class="form-control" value="Complete_{{$question->id}}">
                        <input type="text" name="Complete_answer{{$x}}" class="form-control" >
                        </div>
                        <?php
                            $x++;
                        ?>
                @endif
                @if($question->question_type=='صح او خطا')
                    <div class="form-group">
                            {{Form::label('title','الاجابه')}}<br>
                            <input id='watch-me' name='answer{{$x}}' type='radio' value='true_{{$question->id}}'/> صح<br>
                            <input id='see-me' name='answer{{$x}}' type='radio' value='wrong_{{$question->id}}'/> خطأ <br>
                            
                    </div>
                    <?php
                        $x++;
                    ?> 
                @endif
                    <!--end of if statments-->
                    @if($x>9)
                        @break
                    @endif
                    @endforeach
                    <?php
                        $x=0;
                    ?>
                    <div class="form-group">
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    </div>
                    </br>
                    {!! Form::close() !!}
        </div>

@endforeach

    <div id="count_down"></div>
    <script src="../../assets/js/jquery.js"></script>

    <script src="../../unit/unit.js"></script>
    
@endsection