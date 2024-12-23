@extends('layouts.in.app')
@section('main')
    @if (Auth::user()->role == 'supplier')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h5>Data DE</h5>
          <a href="{{url(Auth::user()->role.'/tabel-de/create')}}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Buat</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered mt-2" id="deTable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
        </div>
      </div>
    @else
        
    @endif
    <script>
         $(document).ready(function() {
        // Initialize DataTable
        var table = $('#deTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('table_de') }}",  // Route yang sesuai dengan controller API
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title' },  // Ganti dengan nama kolom yang sesuai dari API
                { data: 'created_at', name: 'created_at' },  // Ganti dengan nama kolom yang sesuai dari API
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    })
    </script>
@endsection