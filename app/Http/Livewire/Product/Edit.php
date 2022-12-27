<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $productId;
    public $name, $stock, $price;

    public function getProductProperty(){
        return Product::find($this->productId);
    }

    public function mount(){
        $this->name = $this->product->name;
        $this->stock = $this->product->stock;
        $this->price = $this->product->price;
    }

    public function save(){
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer'],
            'price' => ['required']
        ]);

        $this->product->update([
            'name' => $this->name,
            'stock' => $this->stock,
            'price' => $this->price,
        ]);

        Alert::success('Updated successfully');
        return redirect(route('admin-page'));
    }
    public function back(){
        return redirect(route('admin-page'));
    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}
