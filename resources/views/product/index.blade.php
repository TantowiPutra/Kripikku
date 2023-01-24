@extends('template.template')

@section('container')
    <div class="container row p-3 justify-content-center">
        <span class="d-flex position-relative mb-2">
            <span class="li_page_product"><a class="animated_underline font-bolder"
                    href="#">{{ $title }}</a></span>
            <form action="/home/products" method="GET" style="margin-left: auto;">
                @csrf
                @if (request('category') != null)
                    <input type="hidden" name="category" id="category" value="{{ request('category') }}">
                @endif

                @if (request('sort') != null)
                    <input type="hidden" name="sort" id="sort" value="{{ request('sort') }}">
                @endif

                @if (request('alph') != null)
                    <input type="hidden" name="alph" id="alph" value="{{ request('alph') }}">
                @endif
                <div class="d-flex">
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
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <small>SORT BY CATEGORY</small>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body justify-content-center">
                            <ul class="accordion-item-ul">
                                <li class="my-2"><a href="/home/products" class="accordion-item-link">All Category</a>
                                </li>
                                <li>
                                    <hr style="color: orangered;">
                                </li>
                                @foreach ($categories as $category)
                                    <li class="my-2"><a href="/home/products/?category={{ $category->id }}"
                                            class="accordion-item-link">{{ $category->category_name }}</a>
                                    </li>
                                    <li>
                                        <hr style="color: orangered;">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
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
                                <li class="my-2"><a href="/home/products/?sort=asc" class="accordion-item-link">Produk
                                        Terdahulu</a>
                                </li>
                                <li>
                                    <hr style="color: orangered;">
                                </li>
                                <li class="my-2"><a href="/home/products/?sort=desc" class="accordion-item-link">Produk
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
                                <li class="my-2"><a href="/home/products?alph=asc" class="accordion-item-link">A-Z</a>
                                </li>
                                <li>
                                    <hr style="color: orangered;">
                                </li>
                                <li class="my-2"><a href="/home/products?alph=desc" class="accordion-item-link">Z-A</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10 body-1 p-3 position-relative" style="max-width: 70%;">
            <div class="row justify-content-center" style="margin-bottom: 80px;">
                @foreach ($products as $product)
                    @if ($product->isDeleted != 'true')
                        <div class="card mx-2 mb-2 col-md-4 body-3" style="width: 30%;">
                            <div class="content m-auto mt-2 position-relative bg-image"
                                style="width: 200px!important; height: 150px!important; max-width: 100%; max-height: 100%;">
                                <div class="content-overlay"></div>
                                <img src="{{ asset('storage/' . $product->product_thumbnail) }}"
                                    class="card-img-top mt-2 rounded" alt="..."
                                    style="object-fit: cover; max-width: 100%; max-height: 100%;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-bolder" style="color: rgb(255, 123, 0);">
                                    <a class="font-bolder" style="color: rgb(255, 123, 0); text-decoration: none;"
                                        href="/home/products/{{ $product->id }}">{{ $product->product_name }}</a>
                                </h5>
                                <p class="card-text" style="text-align: justify;">
                                    {{ substr(strip_tags($product->description), 0, 50) }}... <a
                                        href="/home/products/{{ $product->id }}" style="text-decoration: none;">Lihat
                                        Detail</a>
                                </p>
                            </div>
                            <ul class="list-group list-group-flush body-4 mb-2 mt-0">
                                <li class="list-group-item font-bolder" style="border-color: orange;">By
                                    <a
                                        href="/home/profile/{{ $product->owner->username }}">{{ $product->owner->username }}</a>
                                </li>
                                <li class="list-group-item" style="border-color: orange;">
                                    @foreach ($product->categories as $category)
                                        | <b style="color: rgb(255, 119, 0)">{{ $category->category->category_name }}</b>
                                    @endforeach
                                </li>
                                <li class="list-group-item font-bold" style="color: green; border-color: orange;">
                                    @currency($product->product_price)</li>
                                <li class="list-group-item text-danger font-bolder"
                                    style="border-color: orange!important;">
                                    {{ $product->product_stock }} Left!</li>
                            </ul>
                            <div class="card-body">

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div style="bottom: 0;" class="position-absolute row justify-content-center w-100">
                <div class="d-flex justify-content-center mt-2 w-100">
                    {{ $products->links() }}
                </div>
                <div class="d-flex justify-content-center w-100">
                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                    {{ $products->total() }} results
                </div>
            </div>
        </div>
    </div>
@endsection
