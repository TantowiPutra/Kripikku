@extends('template.template')

@section('container')
    <div class="container body-1 position-relative p-5" style="width: fit-content;">
        @if (session()->has('successAddKomen'))
            <div class="alert alert-success alert-dismissible fade show position-relative justify-content-center box-shadow-template"
                style="width: fit-content; margin: auto;" role="alert">
                <strong>Sukses!!! </strong> Datamu baru saja di update!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="/home/profile/{{ $account->username }}/edit" enctype="multipart/form-data" method="POST">
            @csrf
            <h1 class="font-bolder font-color-orange-solid center animated_underline">Edit Akun</h1>
            <div class="mb-3">
                <label for="image" class="form-label mt-4 font-bolder">Upload Gambar Profil</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image">
                @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="username" class="form-label font-bolder">Username</label>
                <input style="width: 400px;"type="text" class="form-control @error('username') is-invalid @enderror"
                    id="username" name="username" value="{{ $account->username }}">
                @error('username')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label font-bolder">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="3">{{ $account->description }}</textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn center" type="submit">Update Profile</button>
        </form>
    </div>
@endsection
