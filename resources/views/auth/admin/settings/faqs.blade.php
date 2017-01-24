@extends('admin')

@section('header')
	<script src="{{URL::asset('assets/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({ selector:'textarea'});
    </script>
@endsection

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">FAQs</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-4">
		<h3>New FAQs</h3>
		{!! Form::open(['action'=>'AdminController@faq_insert','method'=>'post','role'=>'form']) !!}
			<div class="form-group">
				{!! Form::label('question','Question') !!}
              	<div class="col-md-12">
	                {!! Form::textarea('question',null,['placeholder'=>'Question','rows'=>7,'class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('question')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('answer','Answer') !!}
              	<div class="col-md-12">
	                {!! Form::textarea('answer',null,['placeholder'=>'Answer','rows'=>7,'class'=>'form-control col-md-12 col-xs-12']) !!}
	                @if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('answer')!!}</span>
	                @endif
              	</div>
			</div>

			<div class="form-group">
				{!! Form::label('Status','Status') !!}
              	<div class="col-md-12">
		            <div class="checkbox">
		                <label>
		                  <input name="status" value="1" type="checkbox"> Actived
		                </label>
		            </div>
					@if($errors->has())
	                    <span class="label label-danger">{!!$errors->first('status')!!}</span>
	                @endif
              	</div>
			</div>
			<div class="form-group">
				<div class="col-md-8 col-md-offset-4">
	                {!! Form::submit('Save',['class'=>'btn btn-default']) !!}
              	</div>
			</div>
		{!! Form::close() !!}
		</div>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th style="width:35%;">Question</th>
							<th style="width:35%;">Answer</th>
							<th style="width:15%;">Status</th>
							<th style="width:5%;">Change</th>
							<th style="width:5%;">Edit</th>
							<th style="width:5%;">Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($faqs as $item)
						<tr>
							<td>{!!$item->question!!}</td>
							<td>{!!$item->answer!!}</td>
							<td>{{$query->get_status($item->status)}}</td>
							<td>
								{!! Form::open(['action'=>'AdminController@faq_change_status','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::hidden('status',$item->status) !!}
									{!! Form::submit('Change',['class'=>'btn btn-success']) !!}
								{!! Form::close() !!}
							</td>
							<td><a href="{{URL::action('AdminController@faq_edit',['id'=>$item->id])}}" title="Edit" class="btn btn-info">Edit</a></td>
							<td>
								{!! Form::open(['action'=>'AdminController@faq_delete','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $faqs->links(); !!}
			</div>
		</div>	
		<br><br><br>&nbsp;
	</div>			
@endsection