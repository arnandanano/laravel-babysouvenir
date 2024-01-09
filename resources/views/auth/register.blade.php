@extends('auth.master')

@section('title', 'Register')

@section('content')

<div class="container-fluid">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="container justify-content-center py-4">
                            <h5 class="card-title text-center p-1">Daftar Akun</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('register.store') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="email"  name="email" id="email" class="form-control" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Role</label>
                                    <select id="role_id" name="role_id" class="form-select">
                                        <option selected disabled>Pilih Role</option>
                                        @foreach ($dataRole as $name)
                                            <option value="{{ $name->id }}">{{ $name->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" >
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password" class="form-control" >
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Register</button>
                                </div>
                                <div class="col-12 mb-4">
                                    <p class="small mb-0">Sudah punya akun?
                                        <a href="{{ route('login') }}">Login Sekarang</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>

@endsection
