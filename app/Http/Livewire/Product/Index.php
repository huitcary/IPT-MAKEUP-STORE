<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function loadProducts(){
        $products = Product::orderBy('created_at', 'desc')->get();
        return compact('products');
    }
    public function render()
    {
        return view('livewire.product.index', $this->loadProducts());
    }
}
