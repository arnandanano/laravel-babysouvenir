@extends('auth.master')

@section('title', 'Login')

@section('content')

<div class="container-fluid">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                        <div class="container justify-content-center py-4">
                            <div class="col-6 m-auto">
                                <div class="row">
                                    <img src="{{ asset('backend/assets/img/logo-baby.PNG') }}" alt="">
                                </div>
                            </div>
                            <h5 class="card-title text-center p-1">Sistem Informasi Manajemen<br>Penjualan Souvenir<br>BabySouvenir</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('login.store') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control" >
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" >
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember">
                                        <label class="form-check-label" for="remember">Ingat saya</label>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 mt-4" type="submit">Login</button>
                                </div>
                                {{-- <div class="col-12 mb-4">
                                    <p class="small mb-0">Belum punya akun?
                                        <a href="{{ route('register') }}">Register Sekarang</a></p>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
