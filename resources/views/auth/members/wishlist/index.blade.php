@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('MemberController@memberarea')}}" class="cb">Member Area</a></li>
              <li class="breadcrumb-item active"><b>Your List Wishlists</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection
  
@section('content')
	<h3>Your Wishlist</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th style="width:80%;">Product Item</th>
				<th style="width:10%;">View</th>
				<th style="width:10%;">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($wishlist->get() as $item)
				<tr>
					<td>{{$query->get_field_data('products',['id'=>$item->product_id],'title')}}</td>
					<td><a href="{{URL::action('ProductController@detail',['slug'=>$query->get_field_data('products',['id'=>$item->product_id],'slug')])}}" title="View Product" class="btn btn-default btn-xs">View Product</a>
					<td>
					
						{!! Form::open(['action'=>'MemberController@remove_wishlist','method'=>'post']) !!}
							{!! Form::hidden('product_id',$item->product_id) !!}
							{!! Form::submit('Remove Wishlist',['class'=>'btn btn-danger btn-xs']) !!}
						{!! Form::close() !!}</td>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection