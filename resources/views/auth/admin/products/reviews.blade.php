@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Reviews Product</h1>
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
							<th style="width:10%;">User</th>
							<th style="width:40%;">Product</th>
							<th style="width:5%;">Quality Product</th>
							<th style="width:5%;">Quality Service</th>
							<th style="width:25%;">Message</th>
							<th style="width:10%;">Status</th>
							<th style="width:5%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($reviews as $item)
						<tr>
							<td>{{$query->get_field_data('users',['id'=>$item->user_id],'name')}}</td>
							<td>{{$query->get_field_data('products',['id'=>$item->product_id],'title')}}</td>
							<td>{{$query->get_review($item->quality_product)}}</td>
							<td>{{$query->get_review($item->quality_service)}}</td>
							<td>{{$item->message}}</td>
							<td>{{$query->get_status($item->status)}}</td>
							<td style="text-align:center;">
								{!! Form::open(['action'=>'AdminController@product_review_update','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::hidden('status',$item->status) !!}
									{!! Form::submit('Change Status',['class'=>'btn btn-info']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $reviews->links() !!}
			</div>
		</div>
	</div>			
@endsection