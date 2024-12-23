@extends('layouts.in.app')
@section('main')
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/line/'.$data->id)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-2 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1"
                name="name" value="{{$data->name}}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
  </div>
@endsection