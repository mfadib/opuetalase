@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Testimonials</h1>
        </div>
        <!--End Page Header -->
    </div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th style="width:40%;">Username</th>
							<th style="width:30%;">Testimonials</th>
							<th style="width:15%;">Status</th>
							<th style="width:15%;">Joined</th>
						</tr>
					</thead>
					<tbody>
						@foreach($testimonials as $item)
						<tr>
							<td>{!!$query->get_field_data('users',['id'=>$item->user_id],'name')!!}</td>
							<td>{!!$item->testimony!!}</td>
							<td>{{$query->get_status($item->status)}}</td>
							<td>
								{!! Form::open(['action'=>'AdminController@testimony_status','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::hidden('status',$item->status) !!}
									{!! Form::submit('Change',['class'=>'btn btn-info btn-sm']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $testimonials->links(); !!}
			</div>
		</div>	
		<br><br><br>&nbsp;
	</div>			
@endsection