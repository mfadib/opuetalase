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
      <div class="mt10">
        <span>Name *</span>
        <input type="text" name="name" value="{{Auth::user()->name}}" readonly=true class="form-control">
        @if($errors->has())
          <p class="text-danger">{{$errors->first('name')}}</p>
        @endif
      </div>
      
      <div class="mt20">
        <span>Give your testimony on our website *</span>
        <textarea class="form-control" name="testimony" style="height: 120px"></textarea>
        @if($errors->has())
          <p class="text-danger">{{$errors->first('testimony')}}</p>
        @endif
      </div>


    <button class="btn btn-default right mt20" id="done">
      <span class="fa fa-check"></span>
      Save</button><br><br>

    {!! Form::close() !!}
  </div>
</div>
@endsection

{{--
<!-- 
      <div class="mt20">
        <span class="left mr20">Rate: </span>
        <span class="left" id="rate"></span>
      </div>

      <script type="text/javascript">
        $(function () {

          $("#rate").rateYo({
            starWidth: "20px",
            rating: 0,
          });
         
        });
      </script> 
      <br>-->
<!-- 
      <div class="mt10">
        <span>Email</span>
        <input type="email" name="" class="form-control">
      </div>

      <div class="mt20">
        <span>Are You Human? <b>How much is: </b></span>
        <input type="text" class="f12" id="a" style="border: none" />
      </div>

      <div class="">
        <span>Answer</span>
        <input type="text" class="form-control" id="b"/>
      </div>

      <script type="text/javascript">
        $(document).ready(function() {
            var n1 = Math.round(Math.random() * 10 + 1);
            var n2 = Math.round(Math.random() * 10 + 1);
            $("#a").val(n1 + " + " + n2);
            $("#done").click(function() {
                if (eval($("#a").val()) == $("#b").val()) {
                    $("#form").submit();
                } else {
                    alert("Error Input!");
                }
            });
        });
      </script>
 --> --}}