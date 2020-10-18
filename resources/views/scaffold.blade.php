<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ env('APP_NAME') }} - @yield('page-title', 'Dashboard')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- CSS Libraries -->
  <style>

  </style>
  {{-- General JS Scripts --}}
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @stack('styles')
</head>

<body>
<div id="app">
  <div class="main-wrapper">
    <div class="navbar-bg"></div>
    @include('components.topbar')
    @include('components.sidebar')

    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <a
              href="@yield('content-back-link', \Illuminate\Support\Facades\URL::previous())"
              class="btn btn-sm btn-info"
              style="display: @yield('content-back-display', 'none'); margin-right: 16px;">
            <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Back
          </a>
          @yield('content-header-action')
          <h1 style="margin-top: 0; display: @yield('content-title-display', 'block')">@yield('content-title', 'Dashboard')</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
            @yield('content-breadcrumbs')
          </div>
        </div>

        <div class="section-body">
          @yield('content')

        </div>
      </section>
    </div>

      <div>
          @yield('js')
      </div>

    @include('components.footer')
  </div>
</div>

<!-- General JS Scripts -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript" src="{{ asset('js/lib.js') }}"></script>
<script src="{{ url('js/app.js') }}"></script>

<!-- Template JS File -->
<script type ="text/javascript" >
    $(document).ready(function() {
        $(function updateArcExpireDate(date, id) {

        });

        $('#btn-reset-user').click(function(e) {
            e.preventDefault();
            swal({
                    text: "Reset this password ? \n Password will be default.(birth date)",
                    buttons: ['Cancel', 'OK'],
                    icon: 'warning',
                    dangerMode: true
                })
                .then(function(isConfirm) {
                    console.log(isConfirm);
                    if (isConfirm) {
                        swal({
                            text: 'Password Has Been Changed!',
                            icon: 'success'
                        }).then(function() {
                            $(this).submit();
                            window.location.reload();
                        });

                    } else {
                        $(function() {});
                    }
                });
        });

        $('#btn-remove-user').click(function(e) {
            var postId = $(this).data('id');
            e.preventDefault();
            swal({
                text: "Remove This User ? \n This Action Cannot be Undo",
                buttons: ['Cancel', 'OK'],
                icon: 'warning',
                dangerMode: true
            }).then(function(isConfirm) {
                if (isConfirm) {
                    window.location.href = "/dashboard/transactions/profile/profile-delete" + "/" + postId;
                } else {
                    e.preventDefault();
                }
            });
        });
    });

$('#btn-select-status-edit').click(function(e) {
    e.preventDefault();
    $('.select-status-reverse').hide();
    $('.select-status-group').css("display", "inline-block");

    let text = $('#placeholder-select-status').text();
    $('#select-status-group').val(text);
});

$('#btn-select-status-close').click(function(e) {
    e.preventDefault();
    $('.select-status-group').hide();
    $('.select-status-reverse').css("display", "inline-block");
});

$('#btn-select-status-save').click(function(e) {
    e.preventDefault();
    let pilihan = confirm('Yakin untuk mengganti status?');
    if (pilihan) $('#form-status-edit').submit();
});

</script>
<!-- Page Specific JS File -->

@include('vendor/sweet/alert')
@stack('scripts')

</body>
</html>
