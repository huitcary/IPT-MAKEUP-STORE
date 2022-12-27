<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function inventory(){
        return view('pages.products.admin.index');
    }
    public function create(){
        return view('pages.products.admin.add');
    }
    public function edit($id){
        return view('pages.products.admin.edit', compact('id'));
    }
    public function delete($id){
        
        Product::find($id)->delete();
        
        Alert::info('Product removed from database');
        return redirect(route('admin-page'));
    }
    public function productsList(){
        return view('pages.products.user.products');
    }
    public function addToCart($id){
        return view('pages.products.user.add-to-cart', compact('id'));
    }
    public function userCart(){
        return view('pages.products.user.cart');
    }
    public function checkout(){
        $items = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($items as $item) {
            $item->delete();
        } 
        
        Alert::success("Items checked out successfully");
        return redirect(route('user-cart'));
    }

}
