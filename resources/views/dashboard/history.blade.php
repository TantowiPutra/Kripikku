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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah Terjual</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sold_data as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->product_name }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>@currency($data->product_price)</td>
                            <td>@currency($data->quantity * $data->product_price)</td>
                            @php
                                $total_income += $data->quantity * $data->product_price;
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($sold_data->count() > 0)
                <ul style="list-style-type: none; float: right; max-width: fit-content; margin-left: auto!important;"
                    class="m-0 p-0 mx-4">
                    <li style="margin: 10px 0px; font-size: 22pt;"><strong>Total Pendapatan</strong></li>
                    <li style="margin: 10px 0px; font-size: 15pt; color: green;" class="mx-1">@currency($total_income)</li>
                </ul>
            @endif
        </div>
    </div>

    <script src="{{ asset('script/sidebars.js') }}"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
@endsection
