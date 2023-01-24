@extends('dashboard.CRUD.template')

@section('container2')
    <form action="/home/dashboard/{{ $product->id }}/patch" class="p-5 body-1 m-2" enctype="multipart/form-data" method="POST"
        style="width: 100%;">
        @method('patch')
        @csrf
        <a href="/home/dashboard" class="btn mb-4" style="max-width: fit-content;">
            <i class="bi bi-arrow-return-left" style="margin-right: 7px;"></i> Back
        </a>
        <h2 class="font-bolder mb-3 animated_underline m-0">UPDATE PRODUK</h2>
        <div class="mb-3">
            <label for="productname" class="form-label font-bold @error('productname') is-invalid @enderror">Nama
                Produk</label>
            <input type="text" class="form-control w-50" id="productname" name="productname" aria-describedby="emailHelp"
                value="{{ $product->product_name }}">
            @error('productname')
                <div class="invalid-feedback">
                    Anda Harus Memasukan Nama Produk!
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="productstock" class="form-label @error('productstock') is-invalid @enderror font-bold">Stok
                Produk</label>
            <input type="number" class="form-control w-25" id="productstock" name="productstock"
                value="{{ $product->product_stock }}" min="0">
            @error('productstock')
                <div class="invalid-feedback">
                    Anda Harus Memasukan Harga Produk!
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productprice" class="form-label font-bold">Harga Produk</label>
            <input type="text" class="form-control w-50 @error('productprice') is-invalid @enderror" id="productprice"
                name="productprice" value="{{ $product->product_price }}">
            @error('productprice')
                <div class="invalid-feedback">
                    Anda Harus Memasukan Harga Produk
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label font-bold">Kategori Produk</label>
            @foreach ($category_choosen as $category_choosen)
                <div id="categoryForm" class="mb-3">
                    <select name="category[]" id="category"
                        class="form-select w-50 @error('category.*') is-invalid @enderror @error('category') is-invalid @enderror">
                        <option value="" style="background-color: rgb(252, 216, 149);">~ Pilih Kategori ~</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category_choosen->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            Anda harus memasukan minimal satu kategori!
                        </div>
                    @enderror
                    @error('category.*')
                        <div class="invalid-feedback">
                            Pilih Minimal Satu Kategori! Baris Tidak Boleh Kosong!
                        </div>
                    @enderror
                </div>
            @endforeach
        </div>
        <p class="btn btn-primary mb-2" style="max-width: fit-content;"onclick="add()"><i class="bi bi-plus-circle"
                style="margin-right: 8px;"></i>
            Tambah Kategori</p>

        <div class="mb-3">
            <label for="productdescription"
                class="form-label font-bold @error('productdescription') is-invalid @enderror">Deskripsi Produk</label>
            <input id="productdescription" name="productdescription" type="hidden" name="content"
                value="{{ $product->description }}">
            <trix-editor input="productdescription"></trix-editor>
            @error('productdescription')
                <div class="invalid-feedback">
                    Anda Harus Memasukan Deskripsi! (Min. 20, Max 200 Karater!)
                </div>
            @enderror
        </div>

        <div class="mb-3">
            @if ($product->product_thumbnail)
                <input type="hidden" name="oldImage" id="oldImage" value="{{ $product->product_thumbnail }}">
                <img src="{{ asset('storage/' . $product->product_thumbnail) }}"
                    class="img-preview img-fluid mb-3 col-sm-5 row m-auto" style="width: 40%;">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5 m-auto d-none" style="width: 40%;">
            @endif
            <img class="img-preview img-fluid mb-3 col-sm-5 d-none" style="width: 40%;">
            <label for="image_thumbnail" class="form-label font-bold">Gambar Thumbnail</label>
            <input type="file" class="form-control w-50 @error('image_thumbnail') is-invalid @enderror"
                name="image_thumbnail" id="image_thumbnail" onchange="previewImage()">
            @error('image_thumbnail')
                <div class="invalid-feedback">
                    Anda Harus Memasukan Gambar Thumbnail! (jpeg,jpg,png,gif)
                </div>
            @enderror

        </div>
        <div class="mb-3">
            @if ($product->product_background)
                <input type="hidden" name="oldImageBg" id="oldImageBg" value="{{ $product->product_background }}">
                <img src="{{ asset('storage/' . $product->product_background) }}"
                    class="img-preview-2 img-fluid mb-3 col-sm-5 row m-auto" style="width: 40%;">
            @else
                <img class="img-preview-2 img-fluid mb-3 col-sm-5 m-auto d-none" style="width: 40%;">
            @endif
            <label for="image_background" class="form-label font-bold">Gambar Background</label>
            <input type="file" class="form-control w-50 @error('image_background') is-invalid @enderror"
                name="image_background" id="image_background" onchange="previewImage2()">
            @error('image_background')
                <div class="invalid-feedback">
                    Anda Harus Memasukan Gambar Background! (jpeg,jpg,png,gif)
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"
            onclick="return confirm('Anda yakin untuk mengupdate produk?')">UPDATE PRODUK</button>
    </form>

    <script></script>
@endsection
