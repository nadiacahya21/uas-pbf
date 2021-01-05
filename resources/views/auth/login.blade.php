<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Amanda">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/amanda/img/amanda-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/amanda">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">


    <title>Amanda Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{ asset("lib/font-awesome/css/font-awesome.css")}}" rel="stylesheet">
    <link href="{{ asset("lib/Ionicons/css/ionicons.css")}}" rel="stylesheet">
    <link href="{{ asset("lib/perfect-scrollbar/css/perfect-scrollbar.css")}}" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="{{ asset("css/amanda.css")}}">
  </head>

  <body>

    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <div>
                  <h2>KLINIK SEDERHANA</h2>
                  <p>182410101031 - Nadia Cahya Rani</p>
                  <p>182410101028 - Siti Nurdiana</p>
                  <p>182410101016 - Resti Erlang Virgiani</p>
                  <p>====================================</p>
                  <p>username : mawar</p>
                  <p>password : mawar</p>
                </div>
              </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Signin to Your Account</h5>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-control-label">Username:</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Enter your username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->

                <div class="form-group">
                <label class="form-control-label">Password:</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div><!-- form-group -->

                <button type="submit" class="btn btn-block">Sign In</button>
            </form>
          </div><!-- col-7 -->
        </div><!-- row -->
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="{{ asset("lib/jquery/jquery.js")}}"></script>
    <script src="{{ asset("lib/popper.js/popper.js")}}"></script>
    <script src="{{ asset("lib/bootstrap/bootstrap.js")}}"></script>
    <script src="{{ asset("lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js")}}"></script>

    <script src="{{ asset("js/amanda.js")}}"></script>
  </body>
</html>
