@extends('template.template')

@section('container')
    @if (session()->has('successDeleteProduct'))
        <div class="alert alert-warning alert-dismissible fade show position-relative justify-content-center box-shadow-template mb-3"
            style="width: fit-content; margin: auto;" role="alert">
            <strong>Sukses!!! </strong>Kamu Baru saja Menghapus Produk
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('successAdd'))
        <div class="alert alert-success alert-dismissible fade show position-relative justify-content-center box-shadow-template mb-3"
            style="width: fit-content; margin: auto;" role="alert">
            <strong>Sukses!!! </strong>Kamu Baru Saja Menambahkan Produk!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('successUpdate'))
        <div class="alert alert-warning alert-dismissible fade show position-relative justify-content-center box-shadow-template mb-3"
            style="width: fit-content; margin: auto;" role="alert">
            <strong>Sukses!!! </strong>Kamu Baru Saja Mengupdate Produk!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container body-3 position-relative p-0 row" style="border-radius: 25px;">
        <div class="d-flex flex-column flex-shrink-0 p-3 body-3 col-md-3" style="border-radius: 25px;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4 font-bolder" style="color: rgb(236, 143, 12);"><i class="bi bi-list"></i> MENU</span>
            </a>
            <div style="background: rgb(255, 141, 100); height: 2px; width: 100%; margin: 10px 0;"></div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/home/dashboard"
                        class="nav-link font-bolder {{ Request::is('home/dashboard') ? 'active' : '' }}" aria-current="page"
                        style="color: rgb(236, 143, 12);">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        PRODUK SAYA
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/home/dashboard/transaction"
                        class="nav-link font-bolder mt-3 {{ Request::is('home/dashboard/transaction') ? 'active' : '' }}"
                        aria-current="page" style="color: rgb(236, 143, 12);">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        HISTORY PENJUALAN
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-md-9">
            <a href="/home/dashboard/addProduct" class="btn mb-3 mt-2" style="max-width: fit-content; float: left;"><i
                    class="bi bi-plus-circle" style="margin-right: 5px;"></i>Tambah Produk</a>
            <div class="d-flex mb-3 mt-2 mb-3" style="max-width: fit-content; margin-left: auto; float: right;">
                <form action="/home/dashboard" method="GET" class="d-flex">
                    @csrf
                    <input class="form-control me-2 w-100" id="name" name="name" type="text"
                        placeholder="Cari Produk" aria-label="Search movie" value="{{ request('name') }}">
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Stok Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 0;
                    @endphp
                    @foreach ($products as $product)
                        @php
                            $counter += 1;
                        @endphp
                        @if ($product->isDeleted != 'true')
                            <tr>
                                <th scope="row">{{ $counter }}</th>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_stock }}</td>
                                <td>@currency($product->product_price)</td>
                                <td>
                                    <a href="/home/products/{{ $product->id }}" class="badge bg-info"><i
                                            class="bi bi-eye"></i></a>
                                    <a href="/home/dashboard/{{ $product->id }}" class="badge bg-warning"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="/home/dashboard/{{ $product->id }}/delete" method="post"
                                        class="d-inline">
                                        @csrf
                                        <button class="badge bg-danger border-0" type="submit" class="btn btn-primary"
                                            onclick="return confirm ('Anda Yakin untuk Menghapus Produk?')">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @else
                            @php
                                $counter -= 1;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('script/sidebars.js') }}"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
@endsection
