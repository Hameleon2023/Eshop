<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        
        $products=Product::all();
        
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }
    
    public function store(Request $request)
    {
     $product=new Product;
     if ($request->hasFile('image'))
     {
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension($file);
        $filename=time().'.'.$ext;
        $file->move('assets/uploads/products/',$filename);
        $product->image=$filename;
     }
        $product->category_id=$request->input('category_id');
        $product->name=$request->input('name');
        $product->slug=$request->input('name');
        $product->small_description=$request->input('small_description');
        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->tax=$request->input('tax');
        $product->qty=$request->input('qty');
        $product->status=$request->input('status')== TRUE?'1':'0';
        $product->trending=$request->input('trendi')== TRUE?'1':'0';
        $product->meta_title=$request->input('meta_title');
        $product->meta_keywords=$request->input('meta_keywords');
        $product->meta_description=$request->input('meta_description');

        $product->save();
        return redirect()->route('admin.products.index')->with('status','Product Added Successfully');

    }

    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::all();
        return view('admin.product.edit',compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        if($request->hasFile('image'))        
        {
           $path="{{assets/uploads/products}}".$product->image;
           
           if (File::exists($path))
           {
            File::delete($path);
           }

           $file=$request->file('image');
           $ext=$file->getClientOriginalExtension('$file');
           $filename=time().'.'.$ext;
           $file->move('assets/uploads/products',$filename);
           $product->image=$filename;
        }
           
        $product->category_id=$request->input('category_id');
        $product->name=$request->input('name');
        $product->slug=$request->input('name');
        $product->small_description=$request->input('small_description');
        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->tax=$request->input('tax');
        $product->qty=$request->input('qty');
        $product->status=$request->input('status')== TRUE?'1':'0';
        $product->trending=$request->input('trendi')== TRUE?'1':'0';
        $product->meta_title=$request->input('meta_title');
        $product->meta_keywords=$request->input('meta_keywords');
        $product->meta_description=$request->input('meta_description');

        $product->update();
        return redirect()->route('admin.products.index')->with('status','Product Updated Successfully');
    }

    public function destroy($id)
    {
        $product=Product::find($id);
      
      if ($product->image)
      
      {
        $path="assets/uploads/products/".$product->image;
        if (File::exists($path))
        {
          File::delete($path);
        }
      }
      $product->delete();
      return redirect()->route('admin.products.index')->with('status', 'Product Deleted Successfully' );
    }
}
