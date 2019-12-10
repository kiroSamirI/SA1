@extends('inc.user')
@section('main_content')
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
            <th>download</th>
            <th>view</th>
        </thead>
        <tbody>
            @foreach($downloads as $down)
                <tr>
                    <td dir="ltr">{{$down->title}}</td>
                    <td dir="ltr">{{$down->created_at}}</td>
                    <td dir="ltr">
                        <a href="/storage/homework/{{$down->title}}"download="{{$down->title}}">
                            <button type="button" class="btn btn-primary">
                                <i class="glyphicon glyphicon-download">download</i>
                            </button>
                        </a>
                    </td>

                    <td dir="ltr">
                        <a href="/storage/homework/{{$down->title}} " target="_blank">
                            <button type="button" class="btn btn-primary">
                                <i class="glyphicon glyphicon-download">view</i>
                            </button>
                    </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
