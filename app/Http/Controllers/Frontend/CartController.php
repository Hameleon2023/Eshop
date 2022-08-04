<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request){        
        
        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');
       
        if (Auth::check())  
        {
            $product_check=Product::where('id',$product_id)->first();     
             
            if ($product_check)
            {
                if (Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>$product_check->name." Already added to cart"]);
                }
                else 
                {
                $cartItem=new Cart();
                $cartItem->product_id=$product_id;
                $cartItem->user_id=Auth::id();
                $cartItem->product_qty=$product_qty;
                $cartItem->save();
                return response()->json(['status'=> $product_check->name."Added to cart"]);  
                }                
            }
        }
        else {
            return response()->json(['status' => "login to continue"]);            
        }   
    }   
    public function showCart(){
        $itemcart=Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('itemcart'));
    } 
}
