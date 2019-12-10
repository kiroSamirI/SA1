@extends('inc.user')
@section('main_content')
<script>
    function toggle_div_fun(id,bid,buttonid){
        var answer_div=document.getElementById(id);
        if(answer_div.style.display =='none'){
            answer_div.style.display ='block';
            document.getElementById("show" + buttonid).value="اظهار الاجابه"
        }else{
            answer_div.style.display='none';
            document.getElementById("show" + buttonid).value="اخفاء الاجابه"

        }
    }
</script>
<h1>test</h1> 
<?php
$x=0;
 
$x_id=0;
?>
@foreach($units as $unit)

    <input type="radio" name="radio_unit" id="choose_unit{{$x_id}}" > {{$unit[0]->unit}} &nbsp;
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
       
@foreach($unit as $question)
<?php
$x++;
?> 
<div class="border bborder-secondaryy " style="margin-bottom:50px">

        <div class="question jumbotron" >
                {{$question->question}}
    </div>

    <!--<button id="toggle" onclick="toggle_div_fun('answer','toggle');">show answer</button> -->
<input type="button" class="btn btn-primary"onclick="toggle_div_fun('answer{{$question->id}}','show{{$question->id}}','{{$question->id}}');" value="اظهار الاجابه" id="show{{$question->id}}">

    <div id="answer{{$question->id}}" class="jumbotron" style="display:none" >
            {!!$question->answer!!}
    </div>

</div>
                    @if($x>9)
                        @break
                    @endif
    @endforeach
    <?php
        $x=0;
    ?>
    </div>
    @endforeach
    <script src="../../assets/js/jquery.js"></script>

    <script src="../../unit/unit.js"></script>
    @endsection