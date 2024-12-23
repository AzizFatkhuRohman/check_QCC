@extends('layouts.in.app')
@section('main')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/user/' . $data->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row mt-3">
                    <div class="col-5">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                            value="{{ $data->email }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-7">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                            value="{{ $data->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option value="{{ $data->role }}">{{ $data->role }}</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="supplier">Supplier</option>
                        <option value="manager">Manager</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ubah Password
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $data->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/user/ubah-password/' . $data->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
