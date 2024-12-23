<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>TMMIN JIG</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Code by <a href="https://bootstrapmade.com/">Ahmad Hadi</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('asset/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('asset/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('asset/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('asset/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('asset/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('asset/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('asset/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('asset/js/main.js')}}"></script>
  <script>
    document.getElementById('logoutButton').addEventListener('click', function(e) {
      e.preventDefault();  // Mencegah default action (misalnya navigasi ke #)
  
      // Menampilkan SweetAlert konfirmasi
      Swal.fire({
        title: 'Apakah anda ingin keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, keluar',
        cancelButtonText: 'Tidak',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          // Jika pengguna memilih untuk logout, submit form
          document.getElementById('logoutForm').submit();
        }
      });
    });
  </script>
  