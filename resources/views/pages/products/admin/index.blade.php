@extends('components.base')

@section('content')

  <div class="inventory">
    <div class="container p-5">
      <livewire:product.index/>
    </div>
  
  </div>


  <style>
    .inventory {
      width: 100%;
      height: 100vh;
      background-size: contain;
    }

    .inventory .container {
      opacity: 1.0;
    }
  </style>
@endsection
