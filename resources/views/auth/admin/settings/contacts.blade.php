@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Your messages</h1>
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
							<th style="width:20%;">Email</th>
							<th style="width:30%;">Message</th>
							<th style="width:15%;">Status</th>
							<th style="width:15%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($contacts as $item)
						<tr>
							<td>{{ $item->name }}</td>
							<td>{{ $item->email }}</td>
							<td>{{ $item->message }}</td>
							<td>{{$query->get_read($item->status)}}</td>
							<td><a href="{{URL::action('AdminController@contact_reply',['id'=>$item->id])}}" class="btn btn-success" title="Reply">Reply</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $contacts->links(); !!}
			</div>
		</div>	
		<br><br><br>&nbsp;
	</div>			
@endsection