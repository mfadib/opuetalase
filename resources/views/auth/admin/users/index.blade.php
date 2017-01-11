@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">List User</h1>
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
							<th style="width:20%;">Name</th>
							<th style="width:20%;">Type</th>
							<th style="width:30%;">Email</th>
							<th style="width:10%;">Actived</th>
							<th style="width:10%;text-align: center;">Status</th>
							<th style="width:5%;text-align: center;">Edit</th>
							<th style="width:5%;text-align: center;">Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $item)
						<tr>
							<td>{{$item->name}}</td>
							<td>{{$query->get_usertype($item->status)}}</td>
							<td>{{$item->email}}</td>
							<td>{{$query->get_status($item->actived)}}</td>
							<td>
								{!! Form::open(['action'=>'AdminController@user_actived','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::hidden('actived',$item->actived) !!}
									{!! Form::submit('Change active',['class'=>'btn btn-success']) !!}
								{!! Form::close() !!}
							</td>
							<td><a href="{{URL::action('AdminController@user_edit',['id'=>$item->id])}}" title="Edit" class="btn btn-info">Edit</a></td>
							<td>
								{!! Form::open(['action'=>'AdminController@user_delete','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $users->links() !!}
			</div>
		</div>
	</div>			
@endsection