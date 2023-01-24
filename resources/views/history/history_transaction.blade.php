@extends('template.template')

@section('container')
    <div class="position-relative body-3 container" style="max-width: 70%;">
        <h2 class="popularHeadline p-3 font-bolder my-2 fs-4 p-0 m-0"
            style="margin-left: 1.3%!important; max-width: fit-content;">
            RIWAYAT TRANSAKSI</h2>

        <div class="row container justify-content-center">
            @if ($transaction_data->count() < 1)
                <div class="row justify-content-center">
                    <p class="font-bolder fs-3"
                        style="color: orange; font-family:Verdana, Geneva, Tahoma, sans-serif; text-align: center;">
                        Tidak Ada History Transaksi!</p>
                    <img src="https://i.ibb.co/TbLmJw2/sad-cat-removebg-preview.png" alt="" style="max-width: 30%;">
                </div>
            @else
                @foreach ($transaction_data as $data)
                    <form action="/home/dashboard/print" method="GET">
                        @csrf
                        <div class="card body-2 p-2 mb-3" style="max-width: 100%!important; border-radius: 10px!important;">
                            <div class="container fluid d-flex card-header">
                                <h5 class="font-bolder fs-4">Kode Invoice:
                                    {{ $data->invoice_code }}</h5>
                                {{-- Data Invoice --}}
                                <input type="hidden" name="invoice_id" id="invoice_id" value="{{ $data->invoice_code }}">
                                <button class="btn btn-2 p-2 m-1"
                                    style="max-width: fit-content; margin-left: auto!important;" type="submit"><i
                                        class="bi bi-download" style="margin-right: 5px;"></i> CETAK
                                    INVOICE</button>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-bolder fs-5">Total Transaksi: <span
                                        class="text-success font-bolder">@currency($data->total_price)</span>
                                </h5>

                                {{-- Data Harga --}}
                                <input type="hidden" name="total_price" id="total_price" value="{{ $data->total_price }}">

                                <p class="card-text font-bold" style="color: rgb(115, 113, 113);">Waktu Transaksi:
                                    {{ $data->created_at }}</p>
                                <hr class="hr-border">
                                <p class="card-title font-bolder fs-5">Detail Produk: </p>

                                <table class="table table-bordered table-warning box-shadow-template">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="font-size: 12pt;">No. </th>
                                            <th scope="col" style="font-size: 12pt;">Nama Produk</th>
                                            <th scope="col" style="font-size: 12pt;">Gambar Produk</th>
                                            <th scope="col" style="font-size: 12pt;">Harga Produk</th>
                                            <th scope="col" style="font-size: 12pt;">Jumlah Pembelian</th>
                                            <th scope="col" style="font-size: 12pt;">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->cart as $cart)
                                            <tr>
                                                <th style="font-size: 14pt;">{{ $loop->iteration }}</th>
                                                <th style="font-size: 14pt;">{{ $cart->product->product_name }}</th>
                                                <input type="hidden" name="product_name[]" id="product_name"
                                                    value="{{ $cart->product->product_name }}">
                                                <th style="width: 200px; height: 150px;">
                                                    <img src="{{ asset('storage/' . $cart->product->product_thumbnail) }}"
                                                        alt=""
                                                        style="max-width: 100%; max-height: 100%; object-fit: cover; border-radius: 15px;">
                                                </th>

                                                <td class="text-success" style="font-size: 14pt;">@currency($cart->product->product_price)</td>
                                                <input type="hidden" name="product_price[]" id="product_price"
                                                    value="{{ $cart->product->product_price }}">
                                                <td style="font-size: 14pt;">{{ $cart->quantity }}</td>
                                                <input type="hidden" name="product_quantity[]" id="product_quantity"
                                                    value="{{ $cart->quantity }}">
                                                <td style="color: rgb(6, 82, 6); font-size: 14pt;">
                                                    @currency($cart->quantity * $cart->product->product_price)
                                                </td>
                                            </tr>
                                            <div class="col-md-4" style="border-right: 3px solid rgb(252, 184, 96);">
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                @endforeach
                <div style="bottom: 0;">
                    <div class="d-flex justify-content-center mt-2 w-100">
                        {{ $transaction_data->links() }}
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        Showing {{ $transaction_data->firstItem() }} to {{ $transaction_data->lastItem() }} of
                        {{ $transaction_data->total() }} results
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
