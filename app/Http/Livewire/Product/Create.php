<?php

namespace App\Http\Livewire\Product;

use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
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

        $equipment = Product::create([
            'name' => $this->name,
            'code' => strtoupper(Str::random(5)),
            'artist' => $this->artist,
            'price' => $this->price,
            'status' => "Available",
            'description' => $this->description,
        ]);


        foreach($this->image as $key => $image){
            $pimage = new Image();
            $pimage->code = $equipment->code;

            $imageName = now()->timestamp . $key . "." .$this->image[$key]->extension();
            $this->image[$key]->storeAs('all',$imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }

        Alert::success($equipment->name, "was added to gallery");
        return redirect(route('curator-view'));
        
    }

    public function render()
    {
        return view('livewire.art.create');
    }
}
