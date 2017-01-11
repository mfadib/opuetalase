@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('MemberController@memberarea')}}" class="cb">Member Area</a></li>
              <li class="breadcrumb-item active"><b>Your Testimonials</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection
  
@section('content')
<div class="col-md-6 col-md-offset-3 pb40">

  <span class="f12">
    SUBMIT <b>YOUR REVIEW</b>
  </span>
  <div class="p10">
    {!! Form::open(['action'=>'MemberController@testimony_commit','method'=>'post']) !!}
      @foreach($testi->get() as $item)
      <div class="mt10">
        <span>Name *</span>
        <input type="text" name="name" value="{{Auth::user()->name}}" readonly=true class="form-control">
        @if($errors->has())
          <p class="text-danger">{{$errors->first('name')}}</p>
        @endif
      </div>
      
      <div class="mt20">
        <span>Give your testimony on our website *</span>
        <textarea class="form-control" name="testimony" style="height: 120px">{{$item->testimony}}</textarea>
        @if($errors->has())
          <p class="text-danger">{{$errors->first('testimony')}}</p>
        @endif
      </div>

      <div class="mt20">
        <span>Your testimony is</span>
        <label>{{$query->get_status($item->status)}}</label><span>status</span>
      </div>


    <button class="btn btn-default right mt20" id="done">
      <span class="fa fa-check"></span>
      Save</button><br><br>
    @endforeach
    {!! Form::close() !!}
  </div>
</div>
@endsection