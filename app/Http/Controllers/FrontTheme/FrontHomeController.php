<?php

namespace App\Http\Controllers\FrontTheme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class FrontHomeController extends FrontThemeController
{
    public function home(){
        
        $products = Product::get()->take(9);
        
        $latestProducts = Product::orderByDesc('id')->take(5)->get();
        
        $categorys = Category::get()->take(3);
        
        $allCategorys = Category::get();
        
        $category['category'] = Category::get(["name", "id"]);
        
        return view('frontHome.home',compact('products','categorys','allCategorys','latestProducts','category'));
    }

    public function about(){
        $categorys = Category::get();
        return view('frontHome.about',compact('categorys'));
    } 

    public function product($id){
        $categorys = Category::find($id);

        $products = Product::get();
        
        $subcategorys = SubCategory::get(); 
        
        return view('frontHome.product',compact('categorys','products','subcategorys'));
    }

    public function productPage($id){
        
        $subcategory = SubCategory::find($id);
        
        $subcategorys = SubCategory::get();
        
        $categorys = Category::get(); 
        
        $products = Product::get();
        
        return view('frontHome.product-page',compact('subcategorys','subcategory','products','categorys'));
    }

    public function productDetail($slug){
        
        $categorys = Category::get();
        
        $products = Product::get();
        
        $product = Product::where('slug', $slug)->first();
        
        return view('frontHome.product-detail',compact('categorys','products','product'));
    }


    /**
     * Write code on Method
     *
     * Cart In Product 
     */
    public function cart()
    {
        return view('frontHome.checkout-order');
    }
  
    /**
     * Write code on Method
     *
     * Add To Cart Product
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back();
    }
  
    /**
     * Write code on Method
     *
     * Update Cart
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * remove cart()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function contact(){
        
        $categorys = Category::get();
        
        return view('frontHome.contact',compact('categorys'));   
    }
    
}
