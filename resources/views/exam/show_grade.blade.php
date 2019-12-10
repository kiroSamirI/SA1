@extends('inc.user')
@section('main_content')
            <div class="lock-screen">
            <h2><img src="../../../emoji/{{$image}}" width="50%" height="100%"></h2>
                <a href="/see_exam/{{$subject_id}}"><button class="btn btn-primary">امتحان جديد</button></a>
                <div class="btn btn-default">{{$result}}</div>
            </div><! --/lock-screen -->
               
@endsection