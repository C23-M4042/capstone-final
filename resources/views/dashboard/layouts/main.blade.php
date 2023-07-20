<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">

      <link rel="icon" href="images/logo.png">
      <!-- site metas -->
      <title>Esteema</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      
      <!-- style css -->
      <link rel="stylesheet" href="styles/style.css">
      <link rel="stylesheet" href="styles/responsive.css">


      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      
      <meta name="theme-color" content="#6777ef"/>
      <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
      <link rel="manifest" href="{{ asset('/manifest.json') }}">
   </head>
   <!-- body -->
   <body class="main-layout">
  
   <!-- ======= Header ======= -->
   @include('dashboard.layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('dashboard.layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    @yield('container')

  </main><!-- End #main -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $("#tujuh").click(function() {
    var nilaiAwal = 7;
    $("#hari").val(nilaiAwal);
    $("#consistent").text(nilaiAwal);
    $("#tiga").css("color", "black");
    $("#lima").css("color", "black");
    $("#tujuh").css("color", "red");
    // Tambahkan kode Anda di sini untuk menampilkan sesuatu di console log
  });

  $("#tiga").click(function() {
    var nilaiAwal = 30;
    $("#hari").val(nilaiAwal);
    $("#consistent").text(nilaiAwal);
    $("#tiga").css("color", "red");
    $("#tujuh").css("color", "black");
    $("#lima").css("color", "black");
    // Tambahkan kode Anda di sini untuk menampilkan sesuatu di console log
  });

  $("#lima").click(function() {
    var nilaiAwal = 50;
    $("#hari").val(nilaiAwal);
    $("#consistent").text(nilaiAwal);
    $("#lima").css("color", "red");
    $("#tujuh").css("color", "black");
    $("#tiga").css("color", "black");
    // Tambahkan kode Anda di sini untuk menampilkan sesuatu di console log
  });


  //complated
  $('.activity-item').on('click', function() {
      var activityName = $(this).find('.activity-name').text();

      var activityId = $(this).find('.activity-id').val();
      var routineId = $(this).find('.routine-id').val();
      var currentDate = new Date().toLocaleString('en-CA', { timeZone: 'Asia/Jakarta' }).slice(0, 10);
      console.log(currentDate);

      $.ajax({
          url: '/dashboard/completed',
          type: 'POST',
          data: {
            routine_id: routineId,
            activity_id: activityId,
              tanggal: currentDate,
              _token: '{{csrf_token()}}'
          },
          success: function(response) {
              // Berhasil mengirim data
              console.log(response);
          },
          error: function(xhr, status, error) {
              // Error dalam mengirim data
              console.log(error);
          }
      });

      $(this).fadeOut(function() {
          $(this).remove();
      });



      var newCompleteElement = $('<div class="d-flex mt-2 align-items-center justify-content-between" style="padding: 8px 6px; border-radius: 12px; border: 1px solid #B9AEAE; color: #B9AEAE; display: none;">' +
                '<img src="{{ asset('images/eva_checkmark-circle-2-fill.svg') }}" alt="SVG Image">' +
                '<span class="complete-name">' + activityName + '</span>' +
                '<img src="{{ asset('images/bi_three-dots-verticala.svg') }}" alt="SVG Image">' +
                '</div>');

      $(".complated").append(newCompleteElement);
      newCompleteElement.fadeIn();
  });
});

</script>
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
   </body>
</html>

