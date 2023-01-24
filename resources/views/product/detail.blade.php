@extends('template.template')

@section('container')
    <div class="row d-flex justify-content-center" data-aos="fade-in" data-aos-delay="200" data-aos-duration="1000">
        @if (session()->has('successAddKomen'))
            <div class="alert alert-success alert-dismissible fade show position-relative justify-content-center box-shadow-template"
                style="width: fit-content; margin: auto;" role="alert">
                <strong>Sukses!!! </strong> Masukanmu sudah kami terima!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('successDeleteKomen'))
            <div class="alert alert-danger alert-dismissible fade show position-relative justify-content-center box-shadow-template"
                style="width: fit-content; margin: auto;" role="alert">
                <strong>Sukses!!! </strong>Kamu Baru saja Menghapus Komen!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('succesAddCart'))
            <div class="alert alert-success alert-dismissible fade show position-relative justify-content-center box-shadow-template"
                style="width: fit-content; margin: auto;" role="alert">
                <strong>Sukses!!! </strong>Kamu Baru saja Menambahkan Produk ke Cart
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('successDeleteCart'))
            <div class="alert alert-warning alert-dismissible fade show position-relative justify-content-center box-shadow-template"
                style="width: fit-content; margin: auto;" role="alert">
                <strong>Sukses!!! </strong>Kamu Baru saja Menghapus Produk dari Cart
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class=" body-2 col-lg-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="images p-2 body-2 my-3 w-100 m-3">
                        <h4 class="font-bolder font-color-orange-solid p-3 center mb-0 animated_underline">Preview
                            Produk</h4>
                        <div class="text-center p-4"> <img id="main-image"
                                src="{{ asset('storage/' . $product->product_thumbnail) }}" width="400" /> </div>
                        <div class="thumbnail text-center"> <img onclick="change_image(this)"
                                src="{{ asset('storage/' . $product->product_thumbnail) }}" width="100"> <img
                                onclick="change_image(this)" src="{{ asset('storage/' . $product->product_background) }}"
                                width="100">
                        </div>
                    </div>

                    <div class="product-review container body-2 m-3 p-3 w-80" margin-left: 48px!important;">
                        <h2 class="font-bolder animated_underline mb-4" style="color:black">Latest Review</h2>
                        @if (auth()->user() && $isComment == null && auth()->user()->id != $product->user_id)
                            @can('user')
                                <form action="/home/products/{{ $product->id }}" method="POST" class="body-1 p-4 mb-4">
                                    @csrf
                                    <input type="hidden" value="{{ auth()->user()->id }}" id="id" name="id">
                                    <label class="form-label font-bolder" for="rating">Give Star Rating</label>
                                    <select class="form-select form-control" aria-label="Default select example" id="rating"
                                        name="rating">
                                        <option value="" selected>~ Pilih Rating ~</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    @error('rating')
                                        <div class="text-danger">
                                            Anda harus memilih rating
                                        </div>
                                    @enderror
                                    <div class="form-outline mb-4 mt-4">
                                        <label class="form-label font-bolder" for="comment">+ Add A Comment</label>
                                        <input type="text" id="comment" name="comment" class="form-control"
                                            placeholder="Masukan Komen" />
                                        @error('comment')
                                            <div class="text-danger">
                                                Comment tidak boleh kosong
                                            </div>
                                        @enderror
                                    </div>

                                    <button class="btn-2 font-bolder">+ ADD COMMENT</button>
                                </form>
                            @endcan
                        @endif
                        @foreach ($review as $review)
                            @if (auth()->user() && $isComment != null && $review->user_id == auth()->user()->id)
                                <div class="card mb-4 mx-auto box-shadow-template"
                                    style="max-width: 95%; margin-left: 15px;">
                                    <div class="card-body box-shadow-template">
                                        <p>{{ $review->comment }}</p>
                                        <p class="small mb-2 font-bolder"><i class="bi bi-star-fill"
                                                style="color: rgb(233, 196, 12); margin-right: 3px;"></i>{{ $review->rating }}/5
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <img src="{{ asset('storage/' . $review->owner->image) }}" alt="avatar"
                                                    width="25" height="25" />
                                                <p class="small mb-0 ms-2">{{ $review->owner->username }}</p>
                                            </div>
                                            <form action="/home/products/{{ $product->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" id="id"
                                                    value="{{ auth()->user()->id }}">
                                                <button
                                                    style="background-color: red; border-color: red; color: white; margin-left: auto; width: 125px!important; border-radius: 25px; border: none;"><i
                                                        class="bi bi-trash3 position-absloute"></i><small
                                                        style="font-size: 8pt; margin-left: 3pt;">Delete
                                                        Comment</small></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card mb-4 mx-auto box-shadow-template"
                                    style="max-width: 95%; margin-left: 15px;">
                                    <div class="card-body">
                                        <p>{{ $review->comment }}</p>
                                        <div class="d-inline mb-2">
                                            <p class="small mb-2 font-bolder"><i class="bi bi-star-fill"
                                                    style="color: rgb(233, 196, 12); margin-right: 3px;"></i>{{ $review->rating }}/5
                                            </p>
                                            <p style="color: rgb(186, 178, 178);">
                                                {{ $review->created_at }}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <img src="{{ asset('storage/' . $review->owner->image) }}" alt="avatar"
                                                    width="25" height="25" />
                                                <p class="small mb-0 ms-2">{{ $review->owner->username }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="Javascript:history.go(-1)" style="text-decoration: none;">
                                <button class="btn body-2">
                                    <div class="d-flex align-items-center"> <i class="bi bi-arrow-return-left mx-2"></i>
                                        <span class="ml-1">Back</span>
                                    </div>
                                </button>
                            </a>
                        </div>
                        <a href="/home/profile/{{ $product->owner->username }}" style="text-decoration: none;">
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">
                                    <p style="color: rgb(68, 68, 237); font-size: 15pt;"> By.
                                        {{ $product->owner->username }}</p>
                                </span>
                        </a>
                        <h4 class="text-uppercase font-bolder mt-2">{{ $product->product_name }}</h4>
                        <div class="price d-flex flex-row align-items-center mt-2 mb-3"> <span
                                class="act-price text-success font-bolder"
                                style="font-size: 15pt; margin-right: 5px;">@currency($product->product_price)</span>
                        </div>
                        <div class="ml-2"> <small class="dis-price text-danger font-bolder"
                                style="font-size: 12pt;">{{ $product->product_stock }}
                                Left!</small>
                        </div>
                        @if (!$total_rating)
                            <p class="font-bolder mt-2"><i class="bi bi-star-fill"
                                    style="color: yellow; margin-right: 10px;"></i>Belum
                                Ada Rating</p>
                        @else
                            <p class="font-bolder mt-2"><i class="bi bi-star-fill"
                                    style="color: yellow; margin-right: 10px;"></i>Average
                                Rating:
                                {{ number_format((float) $total_rating->total_rating, 2, '.', '') }}
                            </p>
                        @endif
                    </div>
                    <h4 class="font-bolder">Deskripsi</h4>
                    <p class="about" style="text-align: justify; font-size: 13pt;">{!! $product->description !!}
                    </p>
                    <div class="sizes mt-5">

                    </div>
                    @can('user')
                        @if (auth()->user()->id != $product->user_id)
                            @if ($isCart != null)
                                <form action="/home/products/{{ $product->id }}/cart" method="POST">
                                    @method('delete')
                                    @csrf
                                    <div class="cart align-items-center"> <button type="submit"
                                            class="btn-2 text-uppercase mr-2 px-4 font-bolder"><i class="bi bi-trash3"
                                                style="margin-right: 4px;"></i>Remove From Cart</button>
                                        <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>
                                    </div>
                                </form>
                            @else
                                <form action="/home/products/{{ $product->id }}/cart" method="POST">
                                    @csrf
                                    <div class="cart align-items-center"> <button
                                            class="btn-2 text-uppercase mr-2 px-4 font-bolder">+
                                            Add
                                            to cart</button> <i class="fa fa-heart text-muted"></i> <i
                                            class="fa fa-share-alt text-muted"></i>
                                    </div>
                                </form>
                            @endif
                        @endif
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="body-3 col-lg-10 m-2" data-aos="fade-down-left" data-aos-delay="200" data-aos-duration="1000">
        <h2 class="popularHeadline p-3 font-bolder m-2 fs-4">PRODUK LAINNYA</h2>
        <ul class="cards">
            @foreach ($moreItems as $item)
                <li class="card second_card body-2" style="background-color: rgb(249, 249, 211)">
                    <a href="/home/products/{{ $item->id }}" style="text-decoration: none; color: black;">
                        <div class="img-frame px-2 bg-image" style="width: 300x!important; height: 150px!important;">
                            <img src="{{ asset('storage/' . $item->product_thumbnail) }}" class="card-img-top"
                                alt="..." style="max-width: 100%; max-height: 100%;">
                        </div>
                        <div class="card-body">
                            <p class="card-title font-bolder">{{ $item->product_name }}</p>
                            <p class="card-text text-success font-bolder p-0 m-0">@currency($item->product_price)</p>
                            <p class="card-text text-danger font-bolder">{{ $item->product_stock }} Left!</p>
                            <p class="card-text w-100" style="text-align: justify; font-size: 12pt!important;">
                                {{ Str::substr($item->description, 0, 50) }}...</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        function change_image(image) {
            var container = document.getElementById("main-image");
            container.src = image.src;
        }
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        document.addEventListener("DOMContentLoaded", function(event) {});
    </script>
@endsection
