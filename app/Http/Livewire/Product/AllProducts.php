<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class AllProducts extends Component
{
    public function loadAllProducts(){
        $products = Product::where('status', "Available")->get();

        return compact('products');
    }
    public function render()
    {
        return view('livewire.product.all-products', $this->loadAllProducts());
    }
}
