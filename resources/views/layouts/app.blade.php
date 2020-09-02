<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Font Awesome --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free/css/all.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    {{-- Simple Sidebar --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simple-sidebar.css') }}">

    {{-- Select2 --}}
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    {{-- My CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <title>@yield('title')</title>
  </head>
  <body id="page-top">
    
    <div class="d-flex" id="wrapper">

      @auth
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- /#sidebar-wrapper -->
      @endauth

      <!-- Page Content -->
      <div id="page-content-wrapper">

        @include('layouts.topbar')

        <div class="container-fluid mt-4">
          
          @include('posts.session')

          @yield('content')
          
        </div>

        <!-- Footer -->
        <footer class="footer">
           <div class="text-center">
              <span class="text-muted small">Copyright &copy; {{ date('Y') }}. Built by Rasyid Arazak</span>
           </div>
         </footer>
        <!-- End of Footer -->

      </div>
      <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded text-white" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw"></i>{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/jquery.easing.min.js') }}"></script>
    
    {{-- Simple Sidebar --}}
    <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    
    {{-- CKeditor --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
      var body = document.getElementById("body");
        CKEDITOR.replace(body,{
        language:'en-gb'
      });
      CKEDITOR.config.allowedContent = true;
    </script>

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('.select2').select2({
            placeholder: "Choose some tags.."
          });
      });
    </script>

    {{-- My JS --}}
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
  </body>
</html>