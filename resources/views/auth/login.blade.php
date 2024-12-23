<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{config('app.name')}} | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
<link href="{{ asset('asset/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('asset/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('asset/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('asset/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('asset/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('asset/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
</head>

<body>
<style>
    body {
    background-color: #f0f0f0; /* Ubah warna latar belakang */
    background-image: url('asset/img/logo.jpeg'); /* Gambar latar belakang */
    background-size: cover; /* Agar gambar mengisi seluruh layar */
    background-position: center; /* Menjaga gambar tetap terpusat */
    background-attachment: fixed; /* Menjaga gambar tetap pada tempatnya saat scroll */
}
</style>
    <main>
        <div class="container">
    
          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
    
                  <div class="d-flex justify-content-center py-4">
                    <a href="{{route('login')}}" class="logo d-flex align-items-center w-auto">
                      <img src="{{asset('asset/img/logo.jpg')}}" alt="">
                      <span class="d-none d-lg-block">{{config('app.name')}}</span>
                    </a>
                  </div><!-- End Logo -->
    
                  <div class="card mb-3" style="width: 30rem">
    
                    <div class="card-body">
    
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Login ke akun anda</h5>
                      </div>
    
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
    
                        <div class="mb-3">
                            <label for="email" class="col-form-label text-md-end">{{ __('Alamat Email') }}</label>
    
                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Login') }}
                            </button>
                        </div>
                        
                    </form>
    
                    </div>
                  </div>
    
                  <div class="credits">
                    Copyright <a href="https://bootstrapmade.com/">TMMIN</a>
                  </div>
    
                </div>
              </div>
            </div>
    
          </section>
    
        </div>
      </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
<script src="{{ asset('asset/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('asset/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('asset/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('asset/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('asset/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('asset/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('asset/js/main.js') }}"></script>


</body>

</html>