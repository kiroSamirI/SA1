@extends('layouts.app')
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!--start subject-->
<div class="row">
        <div class="col-sm-12" align="center">
       
               
                   <input id='watch-me' name='test' type='radio' checked /> <label >الابتدائى</label>
                   <input id='see-me' name='test' type='radio' /><label>  الاعدادى</label>
                   <input id='look-me' name='test' type='radio' /> <label>الثانوى</label>
               
               <br><br>
               <div id='show-me'>
                   <!-- Nav tabs -->
                   @foreach($primarys as $primary)
                    <div class="form-check" style="text-align: center">
                            <input type="checkbox" name="subject[]" class="" value="{{$primary->id}}"> &nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" >{{$primary->name}}-{{$primary->year}}-{{$primary->stage}}</label>
                        </div>
                @endforeach
               </div>
               
               <div id='show-me-two' style='display:none; border:2px solid #ccc'>
                    @foreach($middels as $middel)
                    <div class="form-check" style="text-align: center">
                            <input type="checkbox" name="subject[]" class="form-check-input" value="{{$middel->id}}">&nbsp;&nbsp;&nbsp;
                    <label class="form-check-label" for="materialUnchecked">{{$middel->name}}-{{$middel->year}}-{{$middel->stage}}</label>
                        </div>
                @endforeach
               </div>
               <div id='show-me-three' style='display:none; border:2px solid #ccc'>
                    @foreach($secondarys as $secondary)
                    <div class="form-check" style="text-align: center">
                            <input type="checkbox" name="subject[]" class="form-check-input" value="{{$secondary->id}}">&nbsp;&nbsp;&nbsp;
                    <label class="form-check-label" for="materialUnchecked">{{$secondary->name}}-{{$secondary->year}}-{{$secondary->stage}}</label>
                        </div>
                @endforeach
                        @if ($errors->has('0'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('0') }}</strong>
                                    </span>
                                @endif
               </div>
                 
        </div>
       </div>
       <!------>

<!--end subject-->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
