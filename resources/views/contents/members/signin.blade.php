@extends('app')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Login</h3>
            {!! Form::open(['method'=>'post','action'=>'MemberController@login','role'=>'form']) !!}
                <div class="form-group">
                    {!! Form::label('inputEmail','Email') !!}
                    {!! Form::email('email',null,['class'=>'form-control','id'=>'inputEmail','placeholder'=>'Email']) !!}
                    @if($errors->has())
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('inputPassword','Password') !!}
                    {!! Form::password('password',['class'=>'form-control','id'=>'inputPassword','placeholder'=>'Password']) !!}
                    @if($errors->has())
                        <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                      <input name="remember" type="checkbox"> Check me out
                    </label>
                </div>
                {!! Form::submit('Login',['class'=>'btn btn-default']) !!}
                <p>Not yet a member? <a href="{{URL::action('MemberController@register')}}" title="Signup now">Sign Up</a></p>
            {!! Form::close() !!}
            <br>
        </div>
    </div>
@endsection