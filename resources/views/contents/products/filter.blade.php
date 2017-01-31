@extends('app')

@section('titlebar')
      <div class="row">
        <div class="container">
          <div class="col-md-12 p10">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::action('HomeController@index')}}" class="cb">Home</a></li>
              <li class="breadcrumb-item active"><b>Products</b></li>
            </ol>
          </div>
        </div>
      </div>
@endsection

@section('content')

  <div class="row">

            @if(Auth::check())
              @if(Auth::user()->status == 0)
                @section('sidebar_left')

                <div style="border: 1px solid #ccc">
              <div class="f16 bg p10 cw">CATEGORY</div>
                  <div class="p10">
              <div><a href="{{url('products')}}">All Category ({{$query->get_data('products')->count()}})</a></div>
              @foreach($categories as $item)
              <div><a href="{{url('product/category/'.$item->slug)}}">{{$item->name}} ({{$query->get_data('products',['category_id'=>$item->id])->count()}})</a></div>
              @endforeach
                    </div>
                </div>
              @endif
              <div class="col-md-12 col-xs-12 p10" style="margin-top: -20px">
            @else
            <div class="col-md-3 top-nav">
              <div style="border: 1px solid #ccc">
                <div class="f16 bg p10 cw">CATEGORY</div>
                <div class="p10">
            <div><a href="{{url('products')}}">All Category ({{$query->get_data('products')->count()}})</a></div>
            @foreach($categories as $item)
            <div><a href="{{url('product/category/'.$item->slug)}}">{{$item->name}} ({{$query->get_data('products',['category_id'=>$item->id])->count()}})</a></div>
            @endforeach
                  </div>
                  <hr>
                  @include('menus.filter')
              </div>
            </div>
              <div class="col-md-9 col-xs-12 p10" style="margin-top: -20px">
            @endif
            <div class="p10">

            <div class="row">
              <span class="f16 ml20"><b>All Category</b></span>
            </div>

            <div class="row">
      @foreach($products as $product)
              <div class="col-md-3 col-sm-4 col-xs-12 p10">
                <div class="">
                  {!! $query->get_detail_product($product->slug,URL::asset('images/products/'.$product->cover),"200px") !!}
                  <div class="tc fprod"><a href="{{URL::action('ProductController@detail',['slug'=>$product->slug])}}" class="cb" title="{{$product->title}}">{{$query->get_ellipsis($product->title,20)}}</a></div>
                  {!!$query->get_rate($product->id)!!}
                  <div class="tc fprod"><b>{{$query->currency_format($product->price)}}</b></div>
                </div>
              </div>
      @endforeach
              </div>

              <div class="row">
                <div class="col-xs-12 col-md-4 right p10">
                  <div class="tr">
                  {{ $products->appends(['range' => \Request::get('range'),'brands'=>\Request::get('brands'),'categories'=>\Request::get('categories')])->links() }}
                  </div>
                </div>
              </div>

            </div>
        </div>
  </div>
  <div class="row">
    <div class="col-md-3 dis768">
      <div style="border: 1px solid #ccc">
        <div class="f16 bg p10 cw">CATEGORY</div>
          <div class="p10">
            <div><a href="{{url('products')}}">All Category ({{$query->get_data('products')->count()}})</a></div>
    @foreach($categories as $item)
    <div><a href="{{url('product/category/'.$item->slug)}}">{{$item->name}} ({{$query->get_data('products',['category_id'=>$item->id])->count()}})</a></div>
    @endforeach
          </div>
          <hr>
          @include('menus.filter')
      </div>
    </div>
  </div>
@endsection
