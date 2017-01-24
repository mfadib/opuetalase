@if(Session::has('message_error'))
    <div class="alert alert-danger">
        {!! Session::get('message_error') !!}
    </div>
@endif
@if(Session::has('message_success'))
    <div class="alert alert-success">
        {!! Session::get('message_success') !!}
    </div>
@endif
@if(Session::has('message_warning'))
    <div class="alert alert-warning">
        {!! Session::get('message_warning') !!}
    </div>
@endif
@if(Session::has('message_info'))
    <div class="alert alert-info">
        {!! Session::get('message_info') !!}
    </div>
@endif