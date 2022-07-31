<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $product_trend=Product::where('trending','1')->take(15)->get();
        $popular_cat=Category::where('popular','1')->take(10)->get();
        return view('frontend.index',compact('product_trend','popular_cat'));
    } 

    public function category()
    {
        $categories=Category::where('status','0')->get();
        return view('frontend.category',compact('categories'));
    }

    public function viewCategory($slug)
{
    if (Category::where('slug',$slug)->exists())
    {
        $category=Category::where('slug', $slug)->first();
        $products=Product::where('category_id', $category->id)->where('status','0')->get();
        return view('frontend.products.index',compact('products', 'category'));
    }
    else return redirect()->route('index')->with('status', "Slug doesn't exists");
    
}

public function showProduct($category_slug, $product_slug)
{
    if (Category::where('slug',$category_slug )->exists())
    {
        if (Product::where('slug', $product_slug)->exists())
        {
           $product=Product::where('slug',$product_slug)->first();
           return view('frontend.products.show', compact('product'));
        }

        else return redirect()->route('index')->with('status', "The link was broken");
    }
    else return redirect()->route('index')->with('status', "No such category found");
    
}

}
