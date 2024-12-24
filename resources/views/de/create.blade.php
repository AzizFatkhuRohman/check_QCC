@extends('layouts.in.app')
@section('main')
<div class="card">
    <div class="card-header">
      Buat DE
    </div>
    <div class="card-body">
        <div class="row mt-2">
            <div class="d-flex mb-2">
                    <select class="form-select" aria-label="Default select example" name="car_type">
                        <option value="">Car Type</option>
                        @foreach ($carType as $car)
                            <option value="{{$car->id}}">{{$car->code}} | {{$car->name}}</option>
                        @endforeach
                      </select>
                    <select class="form-select" aria-label="Default select example" name="line">
                        <option value="">Line</option>
                        @foreach ($line as $line)
                            <option value="{{$line->id}}">{{$line->name}}</option>
                        @endforeach
                      </select>
            </div>
            <div class="">
                <select class="form-select" aria-label="Default select example" name="machine">
                    <option value="">Machine</option>
                    @foreach ($machine as $machine)
                        <option value="{{$machine->id}}">{{$machine->code}} | {{$machine->equipment_name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mt-2 mb-2">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title" placeholder="Title"></textarea>
              </div>
        </div>
        
    </div>
  </div>
@endsection