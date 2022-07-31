@extends('layouts.front')

@section('title')
hi
@endsection

  
{{-- Content Start --}}
@section('content')

@include('layouts.includes.frontSlider')
<div class="py-5">
  <div class="container">
    <div class="row">
      <h2>Trend products</h2>
      <div class="owl-carousel trend-carousel owl-theme">
        
        @foreach ($product_trend as $prod)     
        <div class="item">
        <div class="card">
          <img src=" {{asset ('assets/uploads/products/'.$prod->image) }}" alt="image" >
          <div class="card-body">
            <h5>{{$prod->name}}</h5>
            <span class="float-start">{{$prod->selling_price}}</span>
            <span class="float-end"> <s>{{$prod->original_price}}</s></span>
          </div>
        </div>
      </div>
      @endforeach 
    </div>
      
    </div>
  </div>
</div>


<div class="py-5">
  <div class="container">
    <div class="row">
      <h2>Popular categories</h2>
      <div class="owl-carousel trend-carousel owl-theme">
        
        @foreach ($popular_cat as $p_c)     
        <div class="item">
          
          <a href="{{route('view.category', $p_c->slug)}}">
        <div class="card">
          <img src=" {{asset ('assets/uploads/category/'.$p_c->image) }}" alt="image" >
          <div class="card-body">
            <h5>{{$p_c->name}}</h5>
            <span class="float-start">{{$p_c->description}}</span>
            
          </div>
        </div>
          </a>
      </div>
      @endforeach 
    </div>
      
    </div>
  </div>
</div>
@endsection
{{-- Content end --}}


@section('scripts')
<script>
  $('.trend-carousel').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:6
      }
  }
})
</script>

@endsection


