@extends('layouts.app')

@section('content')

<div  class="container-fluid">
  <!-- slider -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
    </ol>
    <div class="container">
    <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="images/gallery-img-01.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>My Web Store</h5>
                  <p>DREAM IT TODAY DO IT TOMORROW TELESUMMITS.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/gallery-img-02.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>My Web Store</h5>
                  <p>DREAM IT TODAY DO IT TOMORROW TELESUMMITS.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/gallery-img-06.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>My Web Store</h5>
                  <p>DREAM IT TODAY DO IT TOMORROW TELESUMMITS.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/gallery-img-04.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>My Web Store</h5>
                  <p>DREAM IT TODAY DO IT TOMORROW TELESUMMITS.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/gallery-img-09.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>My Web Store</h5>
                  <p>DREAM IT TODAY DO IT TOMORROW TELESUMMITS.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/gallery-img-08.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>My Web Store</h5>
                  <p>DREAM IT TODAY DO IT TOMORROW TELESUMMITS.</p>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="container wrapper body3">
        <br>
  <h2>Welcome, dear visitor!</h2>
  <div class="row">
      <div class="col-sm-3 col-md-3" >
        <figure class="left marg_right1"><img src="images/gallery-img-03.jpg" alt=""></figure>
      </div>
        <div class="home-text col-md-7">
            <p>Dream it Today Do It Tomorrow Telesummits are based in the beautiful parklands of Alberta Canada.  We aim to  provide you with all your telesummit requirements, speakers, content, promotional gifts and sponsorships.</p>
        </div>
    </div>
</div>
@endsection