<div>
    @role('admin')
    <div class="container col-md-6 offset-md-3 mt-3 alert alert-secondary text-center">This is how the user sees the items in the user view.</div>
  @endrole
  <div class="uindex-page container mt-4">
    <div id="" class=" row">
      @if($products->count() == 0)
      <div class="card p-3" style="background: #fff5f5">
        <h1 class="text-center">The shop has nothing to show</h1>

    </div>
      @else
       @foreach ($products as $product )
       <div class="mb-3 w-25 ">
         <a id="product-{{ $product->id }}" class="col-4 product-to-view">
           <div id="" class="product-card card mb-3 {{ $product->stocks == 0 ? 'sold-out-container':'product-container' }} " >
           <div class="">
             <div id="image-box" class=" m-3">
               @php
                   $images = App\Models\Image::where('code', $product->code)->get();
               @endphp
   
               @foreach ($images as $img)
                   <img id="" class="" src="{{ asset('uploads/all')}}/{{ $img->image }}" alt="">
                   
               @endforeach
             </div>
           </div>
           <div class="card-body details">
            <h6 class="text-center">{{ $product->name }}</h6>
           </div>
           <div class="card-footer">
             <a class="btn" href="{{url('/like',['product'=>$product->id]) }}">
                 <span>
                   <i class="fa-regular fa-heart"></i>
                 </span>
                 <span>{{ $product->likes }}</span>
             </a>
             @role('customer')
              <a class="btn" href="{{url('/comment',['product'=>$product->id]) }}"> 
                  <i class="fa-regular fa-comment"></i>
              </a>
              <a class="btn" href="{{url('/add-to-cart',['product'=>$product->id]) }}">
                  <i class="fa-solid fa-cart-shopping"></i>
              </a>
             @endrole
           </div>
            
           </div>
          
         </a>
         
       </div>
 
       
 
     @endforeach
      @endif
   
      
     </div>
  </div>

    <style>
      .details{
        /* background: #000; */
        width: 300px;
      }
      .details h6{
        /* background: rgb(255, 255, 255); */
        width: 100%;
      }
      #image-box img{
          height: 180px;
          width: 390%;
          object-fit: cover;
      }
      a{
          color: black;
          text-decoration: none;
      }
      a:hover{
          color: black;
          text-decoration: none;
      }

      .product-card{
        
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.266);
      }

      body{
        /* background: rgb(203, 239, 208); */
      }
      
    </style>
</div>
