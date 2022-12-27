<?php

namespace App\Http\Livewire\Product;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class AddToCart extends Component
{
    public $productId;

    public $name, $quantity;

    public function getProductProperty(){
        return Product::find($this->productId);
    }

    public function mount(){
        $this->name = $this->product->name;
    }

    public function addToCart(){
        $this->validate([
            'quantity' => ['int', 'required']
        ]);

        $cart = Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $this->product->id,
            'quantity' => $this->quantity,
            'total_amount' => $this->quantity * $this->product->price,
        ]);

        $this->product->update([
            'stock' => $this->product->stock - $this->quantity,
        ]);

        Alert::success('Added to cart');
        return redirect(route('products-list'));
    }
    
    public function back(){
        return redirect(route('products-list'));

    }

    public function render()
    {
        return view('livewire.product.add-to-cart');
    }
}
