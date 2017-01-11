<div class="col-md-3 top-nav">
<div style="border: 1px solid #ccc">
  <div class="f16 bg p10 cw">MEMBER AREA</div>
    <div class="p10">
      <div><a href="{{URL::action('MemberController@reviews')}}">Reviews</a></div>
      <div><a href="{{URL::action('MemberController@wishlist')}}">Wishlist</a></div>
      <div><a href="{{URL::action('MemberController@testimony')}}">Testimony</a></div>
      <div><a href="{{URL::action('MemberController@setting')}}">Setting</a></div>
    </div>
</div>
@yield("sidebar_left")
</div>