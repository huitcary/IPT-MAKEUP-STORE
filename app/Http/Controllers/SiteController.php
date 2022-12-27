<?php

namespace App\Http\Controllers;


use App\Models\Art;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiteController extends Controller
{
       public function home(){
       return view('pages.site.home');
    }
    public function viewArtDetails($id){
       return view('pages.art.user.view-art', compact('id'));
    }
    public function orderArt($id){
        $art = Art::where('id', $id)->first();

         Order::create([
            'user_id' => auth()->user()->id,
            'art_id' => $art->id,
            'status' => "incomplete",
         ]);

        Alert::success("Order placed.");
      return redirect(route('galleria'));
    }
   
}
