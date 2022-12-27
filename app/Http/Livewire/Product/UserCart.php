<?php

namespace App\Http\Livewire\Product;

use App\Models\Cart;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class UserCart extends Component
{
    public function loadItemsInCart(){
        $carts = Cart::where('user_id', auth()->user()->id)->get();

        return compact('carts');
    }

    public function render()
    {
        return view('livewire.product.user-cart', $this->loadItemsInCart());
    }
}
