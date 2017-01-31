<div class="f16 bg p10 cw">Filter</div>
{!! Form::open(['action'=>'ProductController@filter','method'=>'get']) !!}
<div class="p10"><!-- FILTER -->
  <b class="f12">Price</b>
  <?php
  $val =5000000;
    if(isset($_GET['range'])){
      $val = $_GET['range'];
    } ?>
  <div>
  <span class="left">{{$query->currency_format($val)}}</span>
  <input type="range" onchange="submit()" name="range" value="{{$val}}" min="1000" max="10000000"></div>
  <span class="left">1.000</span>
  <span class="right">10.000.000</span>
</div>
<hr>

<div class="p10">
  <b class="f12">Brand</b>
  <div>
    @foreach($getquery->get_data('brands')->get() as $brand)
    <?php $checked ="";
    if(isset($_GET['brands'])){
      $brands = array_values($_GET['brands']);
      if(in_array($brand->id,$brands)){
        $checked = "checked";
      }
    } ?>

    <div class="mt10" style="border-bottom: 1px dotted #ddd">
      <span>{{$brand->name}}</span>
      <input type="checkbox" name="brands[]" {{$checked}} onchange="submit()" value="{{$brand->id}}" class="right" />
    </div>
    @endforeach
  </div>
</div>
<div class="p10">
  <b class="f12">Category</b>
  <div>
    @foreach($getquery->get_data('categories')->get() as $cat)
    <div class="mt10" style="border-bottom: 1px dotted #ddd">
      <?php $checked ="";
      if(isset($_GET['categories'])){
        $categories = array_values($_GET['categories']);
        if(in_array($cat->id,$categories)){
          $checked = "checked";
        }
      } ?>
      <span>{{$cat->name}}</span>
      <input type="checkbox" name="categories[]" {{$checked}} onchange="submit()" value="{{$cat->id}}" class="right" />
    </div>
    @endforeach
  </div>
</div><!-- END FILTER -->
{!! Form::close() !!}