$(document).ready(function (){

    // addToCart function end

    // Increment function start
  $('.increment-btn').click(function(e){
    e.preventDefault();
    // var inc_value=$('.qty-input').val();
    var inc_value=$(this).closest('.product_data').find('.qty-input').val();
    var value= parseInt(inc_value,10);
    value=isNaN(value)? 0 : value;
    if(value<10)
    {
      value++;
      $(this).closest('.product_data').find('.qty-input').val(value);
    }
  });
   // Increment function end

  // Decrement function start
  $('.decrement-btn').click(function(e){           
  
    e.preventDefault();
    var dec_value=$(this).closest('.product_data').find('.qty-input').val();
    var value= parseInt(dec_value,10);
    value=isNaN(value)?0:value;
    if(value>1)
    {
      value--;
      $(this).closest('.product_data').find('.qty-input').val(value);
    }
  });
  // Decrement function end
});     
//Document end

