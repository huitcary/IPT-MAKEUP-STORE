<div>
    <div class="d-flex justify-content-between align-items-center">
        <h3>All Products</h3>
        <div class="btns">
          <a class="btn btn-sm" style="background-color: rgb(187, 101, 115); margin-left: 20px; " href="{{ route('new-product') }}">
            New
          </a>
        </div>
    </div>

    <div class="container mt-3">
        <div id="" class="row">
          @if ($products->count() == 0)
            <h1 class="text-center">
              <div class="card p-5" style="background: #fff5f5; border-radius: 10px;">
                <h3 class="text-center text-dark">
                  Try adding something to inventory.
                </h3>
              </div>
            </h1>
  
            @else
            <table class="table table-bordered table-striped table-responsive table-hover">
              <thead class="bg-dark" style="color: #fff5f5">
                <tr class="text-center">
                  
                  <th>Product</th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product )
                <tr>
                  
                  <td class="d-flex justify-content-center">
                    @php
                      $images = App\Models\Image::where('code', $product->code)->get();
                    @endphp
    
                    @foreach ($images as $img)
                    <img id="" class="" src="{{ asset('uploads/all')}}/{{ $img->image }}" alt="">
                    @endforeach
    
                  </td>
                  <td>{{ $product->id }}</td>
                  <td>
                    {{ $product->name }}
                  </td>
                  <td>
                    <a href="{{url('/edit',['product'=>$product->id]) }}" class="m-2 btn  bg-dark">
                      <i class="fa-solid fa-pen text-info"></i> 
                    </a>
                    <a href="{{url('/delete',['product'=>$product->id]) }}" class="m-2 btn bg-dark"><i class="fa-solid fa-trash text-danger"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          @endif
  
        </div>
  
     
      </div>
  
      <style>
        td img{
          height: 150px;
          width: 200px;
          object-fit: cover;
        }
      </style>
     </div>

</div>
