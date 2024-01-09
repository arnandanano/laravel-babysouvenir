@extends('layouts.master')

@section('title', 'User')

@section('content')

<div class="pagetitle">
    <h1>User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Edit Data User</div>
                <div class="card-body col-lg-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('user.update', $user->id) }}" class="row g-3 mt-0">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Role</label>
                            <select id="selectDropdown" name="role_id" class="form-select" value="{{ $user->role_id }}">
                                @foreach ($roles as $role)
                                    @if (old('role_id', $user->role_id) == $role->id)
                                        <option value="{{ $user->role_id }}" selected>{{ $role->nama_role }}</option>
                                    @else
                                        <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                                    @endif
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
                </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
