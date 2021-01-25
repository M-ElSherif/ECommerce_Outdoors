<!DOCTYPE html>
<html lang="en">

  <head>
      <title>Online Store - Project</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <!-- Heruko -->
      <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}"> 
      
      <link rel="stylesheet" href={{url('assets/css/style.css')}}>

      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

      <!-- Bootstrap CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      

  </head>
  <body>
    <!-- header -->
    <?php
      include(app_path() . '/includes/menubar.php');
    ?>
    <!-- header end-->

    <div>
      @yield('content')
    </div>

    <div class="footer1-bg">
      <div class="container footer-area wrapper">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <h4>Address</h4>
            <ul class="list-group  list-group-flush ">
              <li class="list-group-item bg-transparent">Algonquin College</li>
              <li class="list-group-item bg-transparent">Ottawa</li>
              <li class="list-group-item bg-transparent">Canada</li>
              <li class="list-group-item bg-transparent">+1(613)111-1111</li>
              <li class="list-group-item bg-transparent">ebusiness@mail.com<a href="mailto:"></a></li>
            </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <h4>Follow Us</h4>
              <ul class="list-group  list-group-flush">
                <!--Facebook-->
                <li class="list-group-item bg-transparent"><a href="https://www.facebook.com"><button type="button" class="btn btn-fb"><i class="fab fa-facebook-f"></i></button>Facebook</a></li>
                <!--Twitter-->
                <li class="list-group-item bg-transparent"><a href="https://www.twitter.com"><button type="button" class="btn btn-tw"><i class="fab fa-twitter"></i></button>Twitter</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- content -->
    <div class="footer2-bg">
      <!-- footer -->
      <footer>
        <p>&copy; <?php echo date("Y") ?> CST8334. All Rights Reserved.</p>
      </footer>
      <!-- footer end -->
    </div>
  </body>
</html>
