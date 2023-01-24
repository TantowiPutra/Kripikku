@extends('template.template')

@section('container')
    <section class="100vh w-100" style="margin-bottom: 100px; margin-top: 50px;">
        <div class="container-register h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 p-0">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black w-70 body-2" style="border-radius: 25px;">
                        <div class="card-body register-body">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-2 mx-1 mx-md-4 mt-4"
                                        style="align-content: center; text-align: center; margin-left: 50px!important;">
                                        Join with us
                                        Today!
                                    </p>
                                    <form class="mx-1 mx-md-4" action="/register" method="POST">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label font-bolder" for="username">Username</label>
                                                <div class="input-group">
                                                    <input type="text" id="username" name="username"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        value="{{ old('username') }}" placeholder="cth. tantowi_123" />
                                                    @error('username')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label font-bolder" for="email">Your
                                                    Email</label>
                                                <div class="input-group">
                                                    <input type="email" id="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}" placeholder="cth. tantowi@gmail.com" />
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label font-bolder" for="password">Password</label>
                                                <div class="input-group">
                                                    <input type="password" id="password" name="password"
                                                        class="form-control @error('password') is-invalid @enderror" />
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label font-bolder" for="confirmPassword">Password
                                                    Confirmation</label>
                                                <input type="password" id="confirmPassword" name="confirmPassword"
                                                    class="form-control @error('confirmPassword') is-invalid @enderror" />
                                                @error('confirmPassword')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check justify-content-center mb-3" style="margin-left: 17px;">
                                            <input class="form-check-input me-2 @error('terms') is-invalid @enderror"
                                                type="checkbox" id="terms" name="terms" />
                                            <label class="form-check-label font-bolder" for="terms">
                                                I agree to all statements in <a href="#!">Terms of service</a>
                                            </label>
                                            @error('terms')
                                                <div class="invalid-feedback">
                                                    Anda harus menyetujui <i>Terms and Conditions</i>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-lg font-bolder">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="avatar col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <a href="#">
                                        <img src="https://i.ibb.co/sKps21x/food-feast-removebg-preview-1.png"
                                            class="img-fluid image_register" alt="Sample image" width="100%">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
