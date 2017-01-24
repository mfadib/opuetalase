@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">List Products</h1>
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
							<th style="width:20%;">Category</th>
							<th style="width:35%;">Title</th>
							<th style="width:20%;">How to buy</th>
							<th style="width:5%;text-align:center;">Reviews</th>
							<th style="width:5%;text-align:center;">Top Week</th>
							<th style="width:5%;text-align:center;">Recommended</th>
							<th style="width:5%;text-align:center;">Edit</th>
							<th style="width:5%;text-align:center;">Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $item)
						<tr>
							<td>{{$query->get_field_data('categories',['id'=>$item->category_id],'name')}}</td>
							<td>{{$item->title}}</td>
							<td>{!! $item->how_to_buy !!}</td>
							<td style="text-align:center;">{!! $query->get_data('reviews',['product_id'=>$item->id])->count() !!}</td>
							<td style="text-align:center;">{!! $query->get_yesno($item->recommended) !!}</td>
							<td style="text-align:center;">{!! $query->get_yesno($item->special) !!}</td>
							<td style="text-align:center;"><a href="{{URL::action('AdminController@product_edit',['id'=>$item->id])}}" title="Edit" class="btn btn-info">Edit</a></td>
							<td style="text-align:center;">
								{!! Form::open(['action'=>'AdminController@product_delete','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		{!! $products->links() !!}
	</div>			
@endsection