@extends('template.template')

@section('container')
    <section class="container" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3 body-1" style="border-radius: .5rem; ">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                @if ($account->image == null)
                                    <div class="img-wrapper rounded-circle shadow"
                                        style="background: url('https://i.ibb.co/9VJfzBs/profile-removebg-preview.png');">
                                    </div>
                                @else
                                    <div class="img-wrapper rounded-circle shadow"
                                        style="background: url('{{ asset('storage/' . $account->image) }}');">
                                    </div>
                                @endif
                                <h5 style="color: black">
                                    @if (auth()->user()->id == $account->id)
                                        <form action="/home/profile/{{ $account->username }}/edit" method="GET">
                                            @csrf
                                            <button style="background: transparent; border: none; color: rgb(75, 75, 237)"
                                                type="submit"><i class="bi bi-pencil-square mx-1"></i>
                                            </button>
                                        </form>
                                    @endif
                                    {{ $account->username }}
                                </h5>
                                @if ($account->isAdmin == 'false')
                                    <p class="font-bolder" style="color: green;">User</p>
                                @else
                                    <p class="font-bolder" style="color: red;">Admin</p>
                                @endif
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6 class="font-bolder">Informasi Pengguna</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-9 mb-3">
                                            <h6 class="font-bold">Email</h6>
                                            <p class="text-muted">{{ $account->email }}</p>
                                        </div>
                                        <div class="col-9 mb-3">
                                            <h6 class="font-bold">Tanggal Bergabung</h6>
                                            <p class="text-muted">{{ $account->created_at->toDateString() }}</p>
                                        </div>
                                    </div>
                                    <h6 class="font-bolder">Deskripsi</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-md-12">
                                            <p style="text-align: justify">
                                                {{ $account->description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
