@extends('inc.admin')

@section('main_content')


          <table class="table table-striped">
              <tr>
                <th style="float: right">العنوان</th>
                <th></th>
                <th></th>
              </tr>
                    @foreach($vacancies as $vacancy)
                  <tr>
                      <td>{{$vacancy->title}}</td>
                      <td><a href="/vacancies/{{$vacancy->id}}/edit" class="btn btn-default">تعديل</a></td>              

                  <td>
                        {!! Form::open(['action' => ['vacanciesController@destroy' ,$vacancy->id], 'method' => 'POST' , 'class' => 'mine']  ) !!}  
                    
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('مسح' , ['class' =>'btn btn-danger'])}}
                        {!! Form::close() !!}
                      </td>

                  </tr>
                  @endforeach

          </table>
@endsection