<div>
    @extends('components.base')

    @section('content')
      <div class="container mt-5 mb-5">
        @if ($carts->count() == 0)
            <div class="card p-3" style="background: #fff5f5">
                <h1 class="text-center">Try adding to cart</h1>

            </div>
    
          @else
          <br>
          <div class="">
            <div class="">
                @php
                    $total_amount = 0;
                @endphp
              @foreach ($carts as $cart)
                <div class="d-flex justify-content-center">
                  <div class="details d-flex justify-content-center ">
                    <div class="card bg-light mb-3" style="width: 600px; box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.266); ">
                        <table class="table border-light">
                            <tr>
                              <td>
                                Product
                              </td>
                              <td style="">
                                {{ $cart->name }}
                              </td>
                              </tr>
                              <tr>
                              <td>
                                  Quantity
                              </td>
                              <td style="">
                                  {{ $cart->quantity }}
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Price
                              </td>
                              <td style="">
                                  price here
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <hr>
                                Total
                              </td>
                              <td style="">
                                <hr >
                                Php {{ $cart->total_amount }}
                              </td>
                            </tr>
                              @php
                              $total_amount += $cart->total_amount;
                              @endphp
                          </table>
                    </div>
                  </div>
                </div>
                @endforeach
               
            </div>
           <div class="d-flex justify-content-center mt-2 mb-2">
                <div class="d-flex justify-content-end" style="width: 600px">
                    Total Amount To Be Paid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php{{ $total_amount }}.00
                </div>
           </div>
            <div class="d-flex justify-content-center">
               
                <div class=" d-flex justify-content-end" style="width: 600px">
                    <a href="{{ route('checkout') }}" class="btn" style="background: pink">Checkout</a>
                  </div>
            </div>
          </div>
        @endif
      </div>
        
    
      <style>
          #image-box img{
            height: 180px;
            /* width: 100%; */
            object-fit: cover;
          }
          .details tr td{
            margin-right: 50px;
          }
      </style>
    @endsection
    
</div>
