@extends('layouts.in.app')
@section('main')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-download"></i> Unduh
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                <i class="bi bi-plus-circle-fill"></i> Buat
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('admin/machine') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="exampleFormControlInput1" class="form-label">Kode</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="code">
                                        @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-7">
                                        <label for="exampleFormControlInput1" class="form-label">Equipment</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="equipment_name">
                                        @error('equipment_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table" id="machineTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Equipment</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#machineTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('machine_api') }}', // Pastikan ini sesuai dengan route API yang ada
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'equipment_name',
                        name: 'equipment_name'
                    }, // Ganti 'name' sesuai dengan field data Anda
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Tangani penghapusan
            $(document).on('click', '.machine-button', function(e) {
                e.preventDefault(); // Mencegah form disubmit sebelum konfirmasi

                var form = $(this).closest('form'); // Ambil form terdekat
                var url = form.attr('action'); // Ambil URL action dari form

                // Tampilkan SweetAlert2 konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna memilih 'Hapus', kirim form
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
