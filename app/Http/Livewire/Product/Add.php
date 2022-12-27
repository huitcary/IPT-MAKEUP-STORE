<?php

namespace App\Http\Livewire\Product;

use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class Add extends Component
{
    use WithFileUploads; 
    public $name, $stock, $price, $image;

    public function add(){
        $this->validate([
            'name' => ['required','string'],
            'stock' => ['required','int'],
            'price' => ['required','int'],
            'image' => ['required'],
        ]);

        $product = Product::create([
            'name' => $this->name,
            'code' => strtoupper(Str::random(5)),
            'stock' => $this->stock,
            'price' => $this->price,
            'status' => "Available",
        ]);


        foreach($this->image as $key => $image){
            $pimage = new Image();
            $pimage->code = $product->code;

            $imageName = now()->timestamp . $key . "." .$this->image[$key]->extension();
            $this->image[$key]->storeAs('all',$imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }

        Alert::success("$product->name was added to inventory");
        Alert::success("hi");
        return redirect(route('admin-page'));
        
    }
    
    public function back(){
        return redirect(route('admin-page'));
    }

    public function render()
    {
        return view('livewire.product.add');
    }
}
