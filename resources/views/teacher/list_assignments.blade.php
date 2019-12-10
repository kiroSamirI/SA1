@extends('inc.teacher')
@section('main_content')
@if(count($files)==0)
    <h1>ther's no assignments</h1>
    @endsection
@else
    <div class="wrapper" style="margin:0px auto;margin-top:10px;">
        <section class="panel panel-primary">
    <div class="panel-heading">
    homeworks
    </div>
    <div class="panel-body">
    <table class="table table-bordred">
        <thead>
            <th>title</th>
            <th>upload date</th>
            <th>delete</th>
            <th>view</th>
            <th>edit</th>
        </thead>
        <tbody>
            @foreach($files as $file)
                <tr>
                    <td dir="ltr">{{$file->title}}</td>
                    <td dir="ltr">{{$file->created_at}}</td>
                    <td dir="ltr">
                        {!!Form::open(['action'=>['filesController@destroy' , $file->id], 'method' => 'POST' ,'class'=>'pull-right' ])!!}
                    {{Form::hidden('_method' , 'DELETE')}}
                    {{Form::submit('Delete' , ['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
                    </td>

                    <td dir="ltr">
                        <a href="/storage/homework/{{$file->title}} " target="_blank">
                            <button type="button" class="btn btn-primary">
                                view
                            </button>
                    </a>
                    </td>

                    <td dir="ltr">
                    <a href="/assignments/{{$file->id}}/edit">
                            <button type="button" class="btn btn-primary">
                                edit
                            </button>
                    </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
@endif