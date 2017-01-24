@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">List News</h1>
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
							<th style="width:20%;">Image</th>
							<th style="width:30%;">Title</th>
							<th style="width:40%;">Brief</th>
							<th style="width:5%;">Edit</th>
							<th style="width:5%;">Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($news as $item)
						<tr>
							<td><img src="{{URL::asset('images/news/'.$item->image)}}" alt="{{$item->title}}" class="img-thumbnail img-responsive"></td>
							<td>{{$item->title}}</td>
							<td>{!! $item->brief !!}</td>
							<td><a href="{{URL::action('AdminController@news_edit',['id'=>$item->id])}}" title="Edit" class="btn btn-info">Edit</a></td>
							<td>
								{!! Form::open(['action'=>'AdminController@news_delete','method'=>'post']) !!}
									{!! Form::hidden('id',$item->id) !!}
									{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $news->links() !!}
			</div>
		</div>
	</div>			
@endsection