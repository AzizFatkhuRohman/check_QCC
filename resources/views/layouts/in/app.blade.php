<!DOCTYPE html>
<html lang="en">
@include('layouts.in.head')

<body>
    @include('layouts.in.side')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ config('app.name') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="">{{ $title }}</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            @if (session('failed'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ session('failed') }}',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '{{ session('success') }}',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
            @yield('main')
        </section>
    </main><!-- End #main -->
    @include('layouts.in.foot')
</body>

</html>
