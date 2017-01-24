@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('MemberController@memberarea')}}" class="cb">Member Area</a></li>
              <li class="breadcrumb-item active"><b>Your Reviews</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection
  
@section('content')
	<h3>Your reviews</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th style="width:50%;">Product Item</th>
				<th style="width:10%;">Product</th>
				<th style="width:10%;">Service</th>
				<th style="width:20%;">Message</th>
				<th style="width:10%;">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reviews->get() as $item)
				<tr>
					<td>{{$query->get_field_data('products',['id'=>$item->product_id],'title')}}</td>
					<td>{{$query->get_review($item->quality_product)}}</td>
					<td>{{$query->get_review($item->quality_service)}}</td>
					<td>{{$item->message}}</td>
					<td><a href="{{URL::action('ProductController@detail',['slug'=>$query->get_field_data('products',['id'=>$item->product_id],'slug')])}}" title="View Product" class="btn btn-default btn-xs">View</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection