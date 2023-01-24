@extends('template.template')

@section('container')
    <div class="container">
        <div class="position-relative mb-5 body-5 border-radius-25" data-aos="fade-right" data-aos-delay="200"
            data-aos-duration="1000">
            <div class="py-5 body-5">
                <div class="row h-100 align-items-center py-5 container justify-content-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 animated_underline fs-1 mx-0 font-bolder">Apa itu Kripik-Ku?</h1>
                        <p class="mb-0"
                            style="text-align: justify; font-size:16pt; font-family: 'Dosis', sans-serif; color: rgb(0, 0, 0);">
                            <strong>Kripikku</strong> bukan hanya merupakan tempat di mana kita bisa membeli makanan ringan
                            yang kita inginkan, tetapi di <strong>Kripikku</strong>
                            kita semua juga bisa ikut menjual produk makanan ringan yang kita miliki. Kami selaku pengembang
                            website <strong>Kripikku</strong> akan selalu
                            berusaha untuk meningkatkan kualitas serta kenyamanan ketika menggunakan website ini, karena
                            bagi kami kepuasan pengguna merupakan
                            hal yang sangat penting bagi kami.
                        </p>

                    </div>
                    <div class="col-lg-6 d-none d-lg-block avatar"><img src="{{ asset('storage/logo/kripikku_logo.png') }}"
                            alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="body-5 py-5 position-relative mb-5 border-radius-25" data-aos="fade-up" data-aos-delay="200"
            data-aos-duration="1000">
            <div class="container py-5">
                <div class="row align-items-center mb-5 justify-content-center container body-5">
                    <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>
                        <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a href="#"
                            class="btn btn-light px-5 rounded-pill shadow-sm" style="max-width: fit-content;">Learn More</a>
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                            src="https://i.ibb.co/sKps21x/food-feast-removebg-preview-1.png" alt=""
                            class="img-fluid mb-4 mb-lg-0"></div>
                </div>
                <div class="row align-items-center body-5">
                    <div class="col-lg-5 px-5 mx-auto"><img src="https://i.ibb.co/sKps21x/food-feast-removebg-preview-1.png"
                            alt="" class="img-fluid mb-4 mb-lg-0"></div>
                    <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>
                        <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a href="#"
                            class="btn btn-light px-5 rounded-pill shadow-sm" style="max-width: fit-content;">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-2 py-5  position-relative mb-5 body-5 border-radius-25" data-aos="fade-down" data-aos-delay="200"
            data-aos-duration="1000">
            <div class="container py-5">
                <div class="row mb-4 mx-3">
                    <div class="col-lg-5">
                        <h2 class="display-4 font-weight-light">Tim Kami</h2>
                        <p class="font-italic text-muted fs-5">Yuk Kenalan Dengan Developer Kripikku!</p>
                    </div>
                </div>

                <div class="row text-center container justify-content-center">
                    <!-- Team item-->
                    <div class="col-xl-4 col-sm-6 mb-5">
                        <div class="bg-white rounded box-shadow-template py-5 px-4"><img
                                src="https://bootstrapious.com/i/snippets/sn-about/avatar-4.png" alt=""
                                width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Salsabilla Adrian</h5><span class="small text-uppercase text-muted">Font-End
                                Developer</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-facebook"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-twitter"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 mb-5">
                        <div class="bg-white rounded box-shadow-template py-5 px-4"><img
                                src="https://bootstrapious.com/i/snippets/sn-about/avatar-4.png" alt=""
                                width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Salsabilla Adrian</h5><span class="small text-uppercase text-muted">Font-End
                                Developer</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-facebook"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-twitter"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-4 col-sm-6 mb-5">
                        <div class="bg-white rounded box-shadow-template py-5 px-4"><img
                                src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt=""
                                width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Tantowi Putra</h5><span class="small text-uppercase text-muted">Back-End
                                Developer</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-facebook"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-twitter"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-4 col-sm-6 mb-5">
                        <div class="bg-white rounded box-shadow-template py-5 px-4"><img
                                src="https://bootstrapious.com/i/snippets/sn-about/avatar-2.png" alt=""
                                width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Raden Akira</h5><span class="small text-uppercase text-muted">Bussiness
                                Analyst</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-facebook"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-twitter"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-4 col-sm-6 mb-5">
                        <div class="bg-white rounded box-shadow-template py-5 px-4"><img
                                src="https://bootstrapious.com/i/snippets/sn-about/avatar-4.png" alt=""
                                width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">Angelique Aurielle</h5><span class="small text-uppercase text-muted">Social
                                Media Specialist</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-facebook"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-twitter"></i></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i
                                            class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->

                </div>
            </div>
        </div>
    </div>
@endsection
