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
  <div class="card shadow product_data">
    <div class="card-body">
    <div class="row">
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
            <label for="Quantity">Quantity</label>
                {{-- <input type="hidden" value="{{$product->id}}" class="prod_id"> --}}
                 <div class="input-group text-center mb-3">
                   <button class="input-group-text decrement-btn">-</button>
                   <input type="text" name="quantity " value="1" class="form-control qty-input text-center">
                   <button class="input-group-text increment-btn">+</button>
                 </div>

          </div>

          <div class="col-md-10">
            <br>
            <button type="button" class="btn btn-success me-3 float-start"> Add to wish list <i class="fas fa-heart"></i> </button>
            <button   type="button" class="btn btn-primary me-3 addToCartBtn float-start " value="{{$product->id}}"> Add to cart <i class="fas fa-cart-plus"></i> </button>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   --}}
<script>

  // Document start
  $(document).ready(function (){
     
    // addToCart function start
    $('.addToCartBtn').click(function (e) { 
      e.preventDefault();
      var product_id=$(this).val();
      var product_qty=$(this).closest('.product_data').find('.qty-input').val();      
      
      // csrf token start
      $.ajaxSetup({
             headers:
             { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
         });     
      //csrf token end
      
      // ajax start
      $.ajax({
        url: '{{url('add-to-cart')}}',
        method: "GET",
        data: {
          "product_id": product_id,
          "product_qty":  product_qty,
        },
        success: function (response) {
          alert(response.status);
        }
      
      });
      //  axios.post('/add-to-cart', {'product_id': product_id, 'product_qty':  product_qty })
      //   .then(function (response) {
      //   console.log(response);
      // })
      //   .catch(function (error) {
      //   console.log(error);
      // }); 
       
      //ajax end
    });
     // addToCart function end

      // Increment function start
    $('.increment-btn').click(function(e){
      e.preventDefault();
      var inc_value=$('.qty-input').val();
      var value= parseInt(inc_value,10);
      value=isNaN(value)?0:value;
      if(value<10)
      {
        value++;
        $('.qty-input').val(value);
      }
    });
     // Increment function end

    // Decrement function start
    $('.decrement-btn').click(function(e){           
    
      e.preventDefault();
      var dec_value=$('.qty-input').val();
      var value= parseInt(dec_value,10);
      value=isNaN(value)?0:value;
      if(value>1)
      {
        value--;
        $('.qty-input').val(value);
      }
    });
    // Decrement function end
 });     
//Document end
</script>
@endsection

      
        
 
