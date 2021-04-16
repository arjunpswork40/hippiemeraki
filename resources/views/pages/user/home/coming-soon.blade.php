<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coming Soon</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap"/>
    </noscript>
    <link href="{{ asset('coming_soon/css/bootstrap.min.css?ver=1.2.0')}}" rel="stylesheet">
    <link href="{{ asset('coming_soon/css/font-awesome/css/all.min.css?ver=1.2.0')}}" rel="stylesheet">
    <link href="{{ asset('coming_soon/css/main.css?ver=1.2.0')}}" rel="stylesheet">
  </head>
  <body id="top"><div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <div class="masthead clearfix">
        <div class="inner">
          <h3 class="masthead-brand">Coming Soon</h3>
          <nav class="nav nav-masthead">
            <a class="nav-link nav-social" href="https://www.facebook.com/zubisinn" title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
            <a class="nav-link nav-social" href="#" title="Twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
            <a class="nav-link nav-social" href="https://www.instagram.com/zubisinn/" title="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
            <a class="nav-link nav-social" href="tel:+91 8113887700">+91 8113887700</a>&nbsp;
            <a class="nav-link nav-social" href="mailto:reservations@zubisinn.com">reservations@zubisinn.com</a>
        </nav>
        </div>
      </div>
      <div class="inner cover">
        <h1 class="cover-heading">Make yourself at home  Luxury 3 star hotel</h1>
        <p class="lead cover-copy">Zubis Inn is a luxury 3 Star Hotel, located in wayanad, that is widely recognized for providing
            luxurious accommodations and premium amenities. Designed with luxury rooms , Zubis Inn
            has been acclaimed as one of the most romantic places in the region.</p>
        {{-- <p class="lead"><button type="button" class="btn btn-lg btn-default btn-notify" data-toggle="modal" data-target="#subscribeModal">Notify Me</button></p> --}}
      </div>
      <div class="mastfoot">
        <div class="inner">
          <p>&copy; zubisinn<a href="" target="_blank">home</a>.</p>
        </div>
      </div>
      <div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="subscribeModalLabel">Get Notified on Launch:</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          </div>
        </div>
    </div>
  </div>
</div>
    <script src="{{ asset('coming_soon/scripts/jquery.slim.min.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('coming_soon/scripts/bootstrap.bundle.min.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('coming_soon/scripts/main.js?ver=1.2.0') }}"></script>
  </body>
</html>
