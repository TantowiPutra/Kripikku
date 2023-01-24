@extends('template.template')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show position-relative justify-content-center box-shadow-template"
            style="width: fit-content; margin: auto;" role="alert">
            <strong>Horeee!!</strong> Akunmu sudah sukses dibuat!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('loginFailed'))
        <div class="alert alert-danger alert-dismissible fade show position-relative justify-content-center box-shadow-template"
            style="width: fit-content; margin: auto;" role="alert">
            {{ session('loginFailed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="h-100 gradient-form border-radius: 25px; background: transparent;" data-aos="flip-left"
        data-aos-delay="200" data-aos-duration="1000"
        style="border: none;  border-radius: 25px; background: transparent; margin-bottom: 100px;">
        <div class="container py-5 h-100" style="border: none;  border-radius: 25px;">
            <div class="row d-flex justify-content-center align-items-center h-100"
                style="border: none;  border-radius: 25px;">
                <div class="col-xl-10" style="border: none;">
                    <div class="card rounded-3 text-black"
                        style="border: none; border-radius: 25px; background: transparent;">
                        <div class="row g-0" style="background: transparent;">
                            <div class="col-lg-6 box-shadow-template"
                                style="border-radius: 25px; background: rgb(255, 255, 255);">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/logo/kripikku_logo.png') }}" style="width: 185px;"
                                            alt="logo">
                                        <h4 class="mb-3 pb-1 font-bolder">Welcome to Kripik~ku!</h4>
                                    </div>
                                    <form action="/login" method="POST">
                                        @csrf
                                        <p class="font-bolder">Masukan Data Berikut untuk Login</p>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="input-group">
                                                <i
                                                    class="bi bi-envelope-fill fs-5 text-secondary input-group-text bg-light-orange"></i>
                                                <input type="email" id="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ Cookie::get('email_cookie') != null ? Cookie::get('email_cookie') : '' }}" />
                                                @error('email')
                                                    <div class="text text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4 mt-3">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group">
                                                <i
                                                    class="bi bi-key-fill fs-5 text-secondary input-group-text bg-light-orange"></i>
                                                <input type="password" id="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror" />
                                                @error('password')
                                                    <div class="text text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-3">
                                            <input class="form-check-input me-2 @error('cookie') is-invalid @enderror"
                                                type="checkbox" id="cookie" name="cookie"
                                                style="border: 2px solid orange;" />
                                            <label class="form-check-label font-bolder" for="cookie">
                                                Remember Me
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg font-bolder">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2 box-shadow-template"
                                style="border-radius: 25px;">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 font-bolder" style="color: black;">Ayo Nge-snack Bareng Kripik-ku!</h4>
                                    <p class="small mb-0 font-bold" style="text-align: justify; color: black;">Lorem ipsum
                                        dolor sit
                                        amet,
                                        consectetur adipisicing elit, sed do
                                        eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
