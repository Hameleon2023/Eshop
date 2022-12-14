@extends('layouts.front')

@section('title')
{{$product->name}}
@endsection 


{{-- Content Start --}}
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
      <h6 class="mb-0">Collectios/{{$product->category->name}}/{{$product->name}}</h6>
    </div>
</div>

<div class="container">
  <div class="card shadow">
    <div class="card-body">
    <div class="row product_data">
      <div class="col-md-4 border-right">
        <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="w-100" alt="">
      </div>
      <div class="col-md-8">
        <h2 class = "mb-0">
          {{$product->name}}
          @if ($product->trending=='1')
          <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
          @endif
        </h2>
        <hr>
        <label class="me-3">Original Price: <s> Rs {{$product->original_price}}</s></label>
        <label class="fw-bold">Selling Price: Rs {{$product->original_price}}</label>
        <p class= "mt-3">
          {{$product->small_description}}          
        </p>
        <hr>
        @if ($product->qty>0)
            <label class="badge bg-success">In stock</label>
        @else
            <label class="badge bg-danger">Out of stock</label>
        @endif
        <div class="row mt-2">
          <div class="col-md-2">
            <input type="hidden" value="{{$product->id}}" class="prod_id">
            <label for="Quantity">Quantity</label>
                <div class="input-group text-center mb-3">
                   <button class="input-group-text decrement-btn">-</button>
                   <input type="text" name="quantity " value="1" class="form-control qty-input text-center">
                   <button class="input-group-text increment-btn">+</button>
                 </div>

          </div>

          <div class="col-md-10">
            <br>
            <button type="button" class="btn btn-success me-3 float-start"> Add to wish list <i class="fas fa-heart"></i> </button>
            <button   id ="addtocart" type="button" class="btn btn-primary me-3 addToCartBtn float-start "> Add to cart <i class="fas fa-cart-plus"></i> </button>
          </div>
        </div>

      </div>
      <div col-md-12>
        <hr>
        <h3>Description</h3>
        <p class= "mt-3">{{$product->description}}</p>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection
{{-- Content end --}}


@section('scripts')
<script>

  $(document).ready(function (){
// addToCart function start
$("#addtocart").click(function  (e) { 
  e.preventDefault();

 var product_id=$(this).closest('.product_data').find('.prod_id').val();
 var product_qty=$(this).closest('.product_data').find('.qty-input').val();   
   // csrf token start


 $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
 });
  // csrf token end
  
  // ajax start
  $.ajax({
    url:"{{route('addToCart')}}",
    type: "get",
    data: {
      'product_id': product_id,
      'product_qty': product_qty,
    },
      success: function (response) {
      alert(response.status);
    }      
  });
  //ajax end
});
 // addToCart function end
}); 
</script>

@endsection

      
        
 
