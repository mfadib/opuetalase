@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('MemberController@memberarea')}}" class="cb">Member Area</a></li>
              <li class="breadcrumb-item active"><b>Home</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection
  
@section('content')
	<div class="alert alert-info">
		<h3>{{Auth::user()->name}}, Welcome to system</h3>
	</div>
@endsection