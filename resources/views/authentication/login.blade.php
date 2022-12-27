@extends('components.base')

@section('content')

  <div class="login-background">
    @if(session('message'))
    <div class="container col-md-6 offset-md-3 mt-4 alert alert-success text-center">{{ session('message') }}</div>
    @endif
    @if(session('error'))
      <div class="container col-md-6 offset-md-3 mt-4 alert alert-danger text-center">{{ session('error') }}</div>
    @endif
    <div id="login-box" class="container col-md-6 offset-md-3 mt-3 card p-5">
    
      <form action="{{'/'}}" method="POST">
        {{csrf_field()}}
      
        <div class="form-floating">
          <input type="email" name="email" id="email" class="form-control" value="caridadhuit@gmail.com" >
          <label for="email">Email</label>
          @error('email')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-floating mt-3">
          <input type="password" name="password" id="password" class="form-control" value="customer">
          <label for="password">Password</label>
          @error('password')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
  
        <div class="d-flex mt-5 mb-3">
          <div class="flex-grow-1">
            <a id="register-link" href="{{ '/register' }}" class="href">Want to sign up?</a>
          </div>
          <button id="login-btn" class="btn px-5" type="submit">Sign In</button>
        </div>
      </form>
    </div>
  </div>
    


  <style>
    #login-box{
      border-radius: 10px;
      background-color: #f7f2f2d9;
      color: #5cb5c9;
    }
    #login-btn{
      background-color: #5cb5c9;
      color: #000;
      
    }
    #register-link{
      color: #5cb5c9;
      font-weight: bold;
    }

    .login-background{
      padding-top: 10%;
      width: 100%;
      height: 100vh;
      background-image: url('makeup-bg.jpg');
      background-size: cover;
    }
  </style>

@endsection
