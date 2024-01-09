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
                <div class="card-header">Data User</div>
                <div class="card-body">
                    <div class="col-md-6 col-sm-12 mb-3 mt-3">
                        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Buat User</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped nowrap" id="example" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center" width="6%">No.</th>
                                    <th class="text-center" width="12%">Nama User</th>
                                    <th class="text-center" width="20%">Email</th>
                                    <th class="text-center" width="10%">Role</th>
                                    <th class="text-center" width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $user->name }}</td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle text-center">{{ $user->role->nama_role }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
