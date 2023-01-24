@extends('template.template')

@section('container')
    <form action="/home/profile/cart/validation" method="POST">
        @method('patch')
        @csrf
        <div class="container body-3 p-3 px-4">
            <h2 class="popularHeadline p-2 font-bolder mt-3 ">Konfirmasi Pembelian</h2>
            <div class="row p-3 bg-white">
                INVOICE ID :
                {{-- Input Invoice --}}
                <input type="text" name="invoice_id" id="invoice_id" value="{{ $invoice_id }}"
                    style="max-width: fit-content; width: fit-content;" class="mx-2" disabled>
                <hr class="mt-3">
                <div class="img-frame mx-auto" style="width: 300px; height: 200px;">
                    <img src="{{ asset('storage/logo/kripikku_logo.png') }}"
                        style="max-width: 100%; max-height: 100%; object-fit: cover;">
                </div>
                <hr class="mt-1">
                <ul style="list-style-type: none; float: left; max-width: fit-content;" class="m-0 p-0">
                    <li style="margin: 10px 0px;"><strong>Pemesan:</strong> {{ auth()->user()->username }}</li>
                    <li style="margin: 10px 0px;"><strong>Email Pemesan:</strong> {{ auth()->user()->email }}</li>
                </ul>

                <ul style="list-style-type: none; float: right; max-width: fit-content; margin-left: auto!important;"
                    class="m-0 p-0">
                    <li style="margin: 10px 0px;"><strong>Invoice ID:</strong> {{ $invoice_id }}</li>
                    <li style="margin: 10px 0px;"><strong>Tanggal Pemesanan:</strong> {{ date('Y-M-d') }}</li>
                </ul>
                <hr class="mt-3">
                <h2 class="font-bolder m-0 p-0 mb-3">Detail Produk</h2>

                {{-- Input ID --}}
                @foreach ($selected_item as $product_id)
                    <input type="hidden" id="product_id" name="product_id[]" value="{{ $product_id }}">
                @endforeach
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($selected_item as $per_item)
                            <tr>
                                @foreach ($myCart as $per_cart)
                                    @if ($per_item == $per_cart->product_id && $per_cart->transaction_id == 'null')
                                        {{-- Input Price --}}
                                        <input type="hidden" name="price[]" id="price"
                                            value="{{ $per_cart->product->product_price }}">
                                        {{-- Input quantity --}}
                                        <input type="hidden" name="quantity[]" id="quantity"
                                            value="{{ $per_cart->quantity }}">
                                        <th scope="row">{{ $loop->parent->iteration }}</th>
                                        <td>{{ $per_cart->product->product_name }}</td>
                                        <td>{{ $per_cart->quantity }}</td>
                                        <td>@currency($per_cart->product->product_price)</td>
                                        <td>@currency($per_cart->product->product_price * $per_cart->quantity)</td>
                                        @php
                                            $total_price += $per_cart->product->product_price * $per_cart->quantity;
                                        @endphp
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul style="list-style-type: none; float: right; max-width: fit-content; margin-left: auto!important;"
                    class="m-0 p-0 mx-4">
                    <li style="margin: 10px 0px; font-size: 22pt;"><strong>Grand Total</strong></li>
                    <li style="margin: 10px 0px; font-size: 15pt; color: green;" class="mx-1">@currency($total_price)</li>
                </ul>

                <input type="hidden" name="invoice_id_1" id="invoice_id_1" value="{{ $invoice_id }}"
                    style="max-width: fit-content; width: fit-content;" class="mx-2">
                <input type="hidden" name="total_price" id="total_price" value="{{ $total_price }}">
                <hr class="mt-3">
                <p class="font-bolder" style="max-width: fit-content;">Terima kasih atas Kepercayaan Anda kepada Kripikku!
                    <i class="bi bi-emoji-smile-fill" style="color: rgb(1, 1, 1);"></i>
                </p>
                <button class="btn" style="max-width: fit-content; margin-left: auto;" type="submit"
                    onclick="return confirm('Konfirmasi Pembelian?')">KONFIRMASI
                    PEMBELIAN</button>
            </div>
        </div>
    </form>
@endsection
