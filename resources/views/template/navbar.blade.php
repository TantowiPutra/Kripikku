 <nav class="navbar navbar-expand-sm navbar-light w-100" id="neubar" style="z-index: 5;">
     <div class="container mt-3 mb-2">
         <div class="frame position-absolute mt-3" style="width: 125px; height: 125px;">
             <a class="navbar-brand" href="/home"><img src="{{ asset('storage/logo/kripikku_logo.png') }}"
                     style="width: 100%; height: 100%; object-fit: cover;" /></a>
         </div>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
             aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class=" collapse navbar-collapse" id="navbarNavDropdown">
             <ul class="navbar-nav ms-auto ">
                 <li class="nav-item">
                     <a class="nav-link mx-2 {{ $active == 'Home' ? 'active' : '' }}" aria-current="page" href="/home"
                         style="font-weight: bolder;">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link mx-2 {{ $active == 'All Products' ? 'active' : '' }}" href="/home/products"
                         style="font-weight: bolder;">All Products</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link mx-2 {{ $active == 'About' ? 'active' : '' }}" href="/home/aboutus"
                         style="font-weight: bolder;">About Us</a>
                 </li>

                 {{-- Akan ditampilkan jika belum login --}}
                 @if (!auth()->user())
                     <li class="nav-item">
                         <form action="/login" method="GET">
                             <button class="btn">Login</button>
                         </form>
                     </li>
                     <li class="nav-item">
                         <form action="/register#register_body" method="GET">
                             <button class="btn">Register</button>
                         </form>
                     </li>
                 @else
                     <li class="nav-item">
                         <form action="/logout" method="GET">
                             <div class="btn-group">
                                 <button class="btn dropdown-toggle font-bolder" data-bs-toggle="dropdown"
                                     aria-expanded="false">Selamat Datang, {{ auth()->user()->username }}!</button>
                                 <ul class="dropdown-menu dropdown_styling">
                                     <li><a class="dropdown-item font-bolder"
                                             href="/home/profile/{{ auth()->user()->username }}">Profile</a></li>
                                     @can('user')
                                         <li><a class="dropdown-item font-bolder" href="/home/profile/cart">My Cart</a></li>
                                         <li><a class="dropdown-item font-bolder" href="/home/dashboard">My Dashboard</a>
                                         </li>
                                         <li><a class="dropdown-item font-bolder"
                                                 href="/home/transaction_history">Transaction History</a>
                                         </li>
                                     @endcan
                                     <li>
                                         <hr class="dropdown-divider">
                                     </li>
                                     <li><a class="dropdown-item font-bolder" href="/logout">Logout</a></li>
                                 </ul>
                             </div>
                         </form>
                     </li>
                 @endif
             </ul>
         </div>
     </div>
 </nav>
