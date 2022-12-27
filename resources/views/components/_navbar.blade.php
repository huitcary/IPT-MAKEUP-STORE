@if(auth()->check())
    <nav id="navbar-box" class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            @role('admin')
                <h1>
                    <a id="navbar-link-title" class="navbar-brand" href="{{ route('admin-page') }}">
                    <img id="" class="" src="{{ asset('logo.png')}}" alt="">
                    </a>
                </h1>
            @endrole
            @role('customer')
                <h1>
                    <a id="navbar-link-title" class="navbar-brand" href="{{route('home')}}">
                    <img id="" class="" src="{{ asset('logo.png')}}" alt="">
                    </a>
                </h1>
            @endrole
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    
                    @role('customer')
                    <li class="nav-item">
                        <a id="navbar-links" class="nav-link {{ Request::is('home') ? 'active':'' }}" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a id="navbar-links" class="nav-link {{ Request::is('products-list') ? 'active':'' }}" href="{{ route('products-list') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a id="navbar-links" class="nav-link {{ Request::is('user-cart') ? 'active':'' }}" href="{{ route('user-cart') }}">Cart</a>
                    </li>
                
                    @endrole

                    @role('admin')
                        <li class="nav-item">
                            <a id="navbar-links" class="nav-link {{ Request::is('inventory') ? 'active':'' }}" href="{{ route('admin-page') }}">Inventory</a>
                        </li>
                        <li class="nav-item">
                            <a id="navbar-links " class="nav-link {{ Request::is('products-list') ? 'active':'' }}" href="{{ route('products-list') }}">
                                Shop View
                            </a>
                        </li>
                    @endrole

                    @hasanyrole('admin|customer')
                    
                        <li class="nav-item">
                            
                            <a id="navbar-links" class="nav-link" href="/logout">Leave</a>
                            
                            
                        </li>
                        <li class="nav-item">
                            
                            <a id="navbar-links" class="nav-link" href="" onclick="return: false;" style="color: black">{{ Auth::user()->name }}</a>  
                            
                        </li>
                    @endrole
                </ul>
            </div>
        </div>
    </nav>
@endif


<style>
nav div h1 a img {
    width: 200px;
}
#navbar-box{
    height: 80px;
    padding-left: 20px; 
    padding-right: 20px; 
    background-color: #fff5f5;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.266);
}

.navbar-brand{
    font-size: 30px;
}

#navbar-link-title{
    color: #96031a;
    
    font-weight: bold;
}
a.nav-link:hover{
    color: rgb(30, 1, 30);
}

.nav-link{
    margin-left: 25px;
    color: rgb(187, 101, 115);
}
.active{
    border-bottom: rgb(213, 126, 141) 2px solid;
    color: #000;
}
.cart-count-div .cart-count{
    padding: 5px;
    font-size: 10px;
    position: relative;
    top: -33px;
    color: white;
    right: -14px;
    height: 10px;
    border-radius: 50%;
}
.cart-count-div{
    position: absolute;
    
}
</style>