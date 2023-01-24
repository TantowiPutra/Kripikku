@extends('template.template')

@section('container')
    <div class="container row p-3 justify-content-center">
        <span class="d-flex position-relative mb-2">
            <span class="li_page_product" style="margin-left: 6px;"><a class="animated_underline font-bolder"
                    href="#">{{ $title }}</a></span>
            <form action="/home/profile/cart" method="GET" style="margin-left: auto;">
                @csrf
                @if (request('sort'))
                    <input type="hidden" name="sort" id="sort" value="{{ request('sort') }}">
                @endif

                @if (request('alph'))
                    <input type="hidden" name="alph" id="alph" value="{{ request('alph') }}">
                @endif
                <div class="d-flex" style="margin-right: 15px;">
                    <input class="form-control me-2 w-100" id="name" name="name" type="text"
                        placeholder="Cari Produk" aria-label="Search movie" value="{{ request('name') }}">
                    <button class="btn btn-danger" type="submit"><span class="bi bi-search"
                            style="margin-right: 3px;"></span>Search</button>
                </div>
            </form>
        </span>
        <div class="col-md-3 p-0" style="max-width: 30%;">
            <div class="accordion position-relative body-2 p-4" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            SORT BY TIME
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body justify-content-center">
                            <ul class="accordion-item-ul">
                                <li class="my-2"><a href="/home/profile/cart?sort=asc" class="accordion-item-link">Produk
                                        Terdahulu</a>
                                </li>
                                <li>
                                    <hr style="color: orangered;">
                                </li>
                                <li class="my-2"><a href="/home/profile/cart?sort=desc" class="accordion-item-link">Produk
                                        Baru</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            SORT BY ALPHABET
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="accordion-item-ul justify-content-center">
                                <li class="my-2"><a href="/home/profile/cart?alph=asc" class="accordion-item-link">A-Z</a>
                                </li>
                                <li>
                                    <hr style="color: orangered;">
                                </li>
                                <li class="my-2"><a href="/home/profile/cart?alph=desc"
                                        class="accordion-item-link">Z-A</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10 body-1 p-3 position-relative" style="max-width: 70%;">
            @if (session()->has('successDeleteCart'))
                <div class="alert alert-warning alert-dismissible fade show position-relative justify-content-center box-shadow-template mb-3"
                    style="width: fit-content; margin: auto;" role="alert">
                    <strong>Sukses!!! </strong>Kamu Baru saja Menghapus Produk dari Cart
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('successTransaction'))
                <div class="alert alert-success alert-dismissible fade show position-relative justify-content-center box-shadow-template mb-3"
                    style="width: fit-content; margin: auto;" role="alert">
                    <strong>Sukses!!! </strong> Transaksimu Berhasil!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('errorValidation'))
                <div class="alert alert-danger alert-dismissible fade show position-relative justify-content-center box-shadow-template mb-3"
                    style="width: fit-content; margin: auto;" role="alert">
                    <strong>Gagal!!! </strong>Kamu Harus Memilih Setidaknya Satu Produk!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="/home/profile/cart/validation" method="POST">
                @csrf
                @if ($myItems->count() > 0)
                    <div class="mb-4">
                        <span class="font-bolder fs-4 mx-2">PRODUK DIPILIH: </span>
                        <span class="font-bolder fs-4 product_count" id="product_count">0</span>
                        <button class="btn d-inline" style="float: right;" type="submit">CHECKOUT SEKARANG!</button>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <p class="font-bolder fs-3"
                            style="color: orange; font-family:Verdana, Geneva, Tahoma, sans-serif; text-align: center;">
                            Produk Pada Cart Tidak Ditemukan!</p>
                        <img src="https://i.ibb.co/TbLmJw2/sad-cat-removebg-preview.png" alt=""
                            style="max-width: 30%;">
                    </div>
                @endif
                @foreach ($myItems as $item)
                    <input type="hidden" name="product_id[]" id="product_id" value="{{ $item->product_id }}">
                    <div class="mb-3 body-3 d-flex" style="width: 100%">
                        <img src="{{ asset('storage/' . $item->product_thumbnail) }}" class="m-2 rounded w-40"
                            style="width: 30%; object-fit: cover;" alt="...">
                        <a href="/home/products/{{ $item->product_id }}/cart">
                            <button class="position-absolute mt-1 mx-1"
                                style="background-color: red; border: solid red 5px; border-radius: 10px; left: 0;"
                                type="button" class="btn btn-primary"
                                onclick="return confirm('Hapus Produk dari Cart?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </a>
                        <div class="py-2">
                            <h2 class="font-bolder" style="color: rgb(255, 123, 0); text-decoration: none;"
                                href="/home/products/{{ $item->id }}">{{ $item->product_name }}</h2>
                            <div class="row w-100">
                                <div class="col-md-8 w-70">
                                    <p style="text-align: justify;">
                                        {!! substr($item->description, 0, 150) !!}... <a href="/home/products/{{ $item->id }}"
                                            style="text-decoration: none;">Lihat
                                            Detail</a>
                                    </p>
                                </div>

                                <div class="col-md-4 w-30">
                                    <input type="checkbox" class="cart-checkbox" style="width: 15px; height: 15px;"
                                        onclick="addItem(this)" id="cart-checkbox" name="checkbox[]"
                                        value="{{ $item->id }}">
                                    <span style="color: rgb(255, 119, 0);" class="font-bolder">Pilih produk</span>
                                </div>
                            </div>

                            <p class="text-danger font-bolder">{{ $item->product_stock }} Left!</p>

                            <p>
                                <button onclick="increment({{ $item->id }})"
                                    style="border: rgb(203, 14, 14) solid 2px; background-color: rgb(203, 14, 14);border-radius: 3px; color: white;"
                                    type="button">+</button>
                                <input id="inputQuantity-{{ $item->id }}" type="number" min="1"
                                    max="{{ $item->product_stock }}" value="{{ $item->quantity }}" name="quantity[]">
                                <button onclick="decrement({{ $item->id }})"
                                    style="border: rgb(203, 14, 14) solid 2px; background-color: rgb(203, 14, 14);border-radius: 3px; color: white;"
                                    type="button">-</button>
                            </p>

                            <div class="d-flex align-items-center">
                                <h3 class="list-group-item font-bold my-1" style="color: green; border-color: orange;">
                                    @currency($item->product_price)</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
    </div>

    <script>
        var increment2 = 0;
        $('.cart-checkbox').on('click', function() {
            if (this.checked) {
                increment2++;
            } else {
                increment2--;
            }
            $('.product_count').html('(' + increment2 + ')');
        })
    </script>
@endsection
