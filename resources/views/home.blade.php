@extends('template.template')

@section('container')
    <div class="container body-2 p-3 mb-3 marquee w-100 text-focus-in box-shadow-template">
        <marquee class="sampleMarquee font-bold mx-auto my-auto w-100" direction="left" scrollamount="10" behavior="scroll"
            style="font-size: 15pt; align-content: center;">
            <span style="color: rgb(0, 0, 0);"><i class="bi bi-megaphone-fill"></i> Kamu Lagi Pengen Ngesnack, Tapi Bingung
                Beli
                Dimana? Ya di Kripikku
                Aja! <i class="bi bi-emoji-smile-fill" style="color: black"></i></span> ~
            Harga
            Terjangkau Setiap
            Hari ~ Kualitas Produk Dijamin <i class="bi bi-megaphone-fill"></i>
        </marquee>
    </div>

    <div class="container body-1 p-0 mb-4 p-2" style="border-radius: 25px;" data-aos="fade-right" data-aos-delay="200"
        data-aos-duration="1000">
        <h2 class="popularHeadline p-3 font-bolder mt-3" style="margin-left: 30px;">Recommended Product</h2>
        @include('carousel.index')
    </div>

    <div class="container body-2" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
        <div class="row justify-content-center p-3">
            <h2 class="popularHeadline p-3 font-bolder">Popular Today</h2>

            @foreach ($popular_products as $popular)
                <div class="col-md-3 mx-3 card mt-3 mb-3 second_card">
                    <div class="text-center" style="object-fit: cover; width: 100%; height: 100%;">
                        <img class="rounded"
                            style="object-fit: cover; width: 100%; height: 100%;"src="{{ asset('storage/' . $popular->product_thumbnail) }}"
                            width="250">
                    </div>

                    <div class="text-center mt-3">
                        <h5 class="card-title font-bolder">#{{ $loop->iteration }}</h5>
                        <a href="/home/products/{{ $popular->id }}" style="color: black; text-decoration: none;">
                            <h5 class="font-bolder" style="font-size: 17pt;">{{ $popular->product_name }}</h5>
                        </a>
                        <span class="text-success font-bolder" style="font-size: 15pt;"> @currency($popular->product_price) </span>
                        <h6 class="mt-2" style="font-size: 13pt;"><small
                                class="text text-danger font-bolder">{{ $popular->product_stock }}
                                Left!</small></h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-4 mb-4 body-2" data-aos="fade-down-left" data-aos-delay="200" data-aos-duration="1000">
        <h2 class="p-2 font-bolder mt-2" style="border-left: 12px solid #d38506;">Apa Kata Mereka?</h2>
        <ul class="cards">
            @for ($i = 0; $i < 10; $i++)
                <li class="card second_card" style="background-color: rgb(249, 249, 211)">
                    <div>
                        <h3 class="card-title font-bolder">Review Pelayanan dan Jasa Produk</h3>
                        <div class="card-content">
                            <p>Kripikku, Mantap!</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <small><i>Anonymous, 12</i></small>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
@endsection
