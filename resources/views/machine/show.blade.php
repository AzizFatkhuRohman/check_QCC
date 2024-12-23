@extends('layouts.in.app')
@section('main')
<div class="card">
    <div class="card-body">
        <form action="{{url('admin/machine/'.$data->id)}}" method="post">
        @csrf
        @method('put')
        <div class="row mb-2 mt-3">
            <div class="col-5">
                <label for="exampleFormControlInput1" class="form-label">Kode</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"
                    name="code" value="{{$data->code}}">
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-7">
                <label for="exampleFormControlInput1" class="form-label">Equipment</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"
                    name="equipment_name" value="{{$data->equipment_name}}">
                @error('equipment_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
  </div>
@endsection