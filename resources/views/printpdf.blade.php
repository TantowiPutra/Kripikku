<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Invoice</title>
    <link rel="icon" type="image/x-icon" href="/apple-icon-57x57.png">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/trix.css') }}" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .table {
            --bs-table-color: var(--bs-body-color);
            --bs-table-bg: transparent;
            --bs-table-border-color: var(--bs-border-color);
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: var(--bs-body-color);
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: var(--bs-body-color);
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: var(--bs-body-color);
            --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
            width: 100%;
            margin-bottom: 1rem;
            color: var(--bs-table-color);
            vertical-align: top;
            border-color: var(--bs-table-border-color);
        }

        .table-bordered> :not(caption)>* {
            border-width: var(--bs-border-width) 0;
        }

        .table-bordered> :not(caption)>*>* {
            border-width: 0 var(--bs-border-width);
        }

        .table> :not(caption)>*>* {
            padding: 0.5rem 0.5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: var(--bs-border-width);
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        .table>tbody {
            vertical-align: inherit;
        }

        .table>thead {
            vertical-align: bottom;
        }

        .table-group-divider {
            border-top: calc(var(--bs-border-width) * 2) solid currentcolor;
        }

        .p-3 {
            padding: 1rem !important;
        }

        .font-bolder {
            font-weight: bolder;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .bg-white {
            background-color: white !important;
        }

        .mx-2 {
            margin-right: 0.5rem !important;
            margin-left: 0.5rem !important;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .mt-1 {
            margin-top: 0.25rem !important;
        }

        .m-0 {
            margin: 0 !important;
        }

        .p-0 {
            padding: 0 !important;
        }
    </style>
</head>

<body>
    <div class="p-3 px-4">
        <div class="row p-3 bg-white">
            INVOICE ID :
            {{-- Input Invoice --}}
            <input type="text" name="invoice_id" id="invoice_id" value="{{ $invoice_id }}"
                style="max-width: fit-content; width: fit-content;" class="mx-2" disabled>
            <hr class="mt-3">
            <div class="img-frame mx-auto" font-bolder style="width: 300px; font-size: 40pt;">
                Kripik ~ ku
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
            {{-- <hr class="mt-3"> --}}
            {{-- Input ID --}}
            <table class="table table-striped table-bordered" style="padding: 10px;">
                <h2 class="font-bolder">Detail Produk</h2>
                <thead style="max-width: 100%!important;">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_name as $product_name)
                        <tr>
                            <th>
                                {{ $loop->iteration }}
                            </th>
                            <th>
                                {{ $product_name }}
                            </th>
                            <th>
                                {{ $product_quantity[$loop->iteration - 1] }}
                            </th>
                            <th>
                                {{ $product_price[$loop->iteration - 1] }}
                            </th>
                            <th>
                                {{ $product_quantity[$loop->iteration - 1] * $product_price[$loop->iteration - 1] }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <ul style="list-style-type: none; float: right; max-width: fit-content; margin-left: auto!important; margin-left: auto!important;"
                class="m-0 p-0 mx-4 mt-2">
                <li style="margin: 10px 0px; font-size: 22pt;"><strong>Grand Total</strong></li>
                <li style="margin: 10px 0px; font-size: 15pt; color: green;" class="mx-1">@currency($total_price)</li>
            </ul>

            <hr class="mt-3">
            <p class="font-bolder" style="max-width: fit-content;">Terima kasih atas Kepercayaan Anda kepada Kripikku!
                <i class="bi bi-emoji-smile-fill" style="color: rgb(1, 1, 1);"></i>
            </p>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('script/script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('script/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('script/trix.js') }}" type="text/javascript"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
