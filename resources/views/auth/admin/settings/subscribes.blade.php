@extends('admin')

@section('h3')
	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Subscribes</h1>
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
							<th style="width:40%;">Email</th>
							<th style="width:30%;">Unique Code</th>
							<th style="width:15%;">Status</th>
							<th style="width:15%;">Joined</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subscribes as $item)
						<tr>
							<td>{!!$item->email!!}</td>
							<td>{!!$item->unique_code!!}</td>
							<td>{{$query->get_status($item->status)}}</td>
							<td>{{date('d, M Y',strtotime($item->created_at))}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $subscribes->links(); !!}
			</div>
		</div>	
		<br><br><br>&nbsp;
	</div>			
@endsection