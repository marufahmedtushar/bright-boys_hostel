<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bright Boys Hostel | About Us </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('images/hostel.ico')}}" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">




    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  </head>
  <body>
    
  @extends('nav')


  <div class="block-30 block-30-sm item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm">About</span>
          <h2 class="heading">The Hostel</h2>
        </div>
      </div>
    </div>
  </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif



  <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <h2>Enjoy a Luxury Experience</h2>
          </div>
          <div class="col-md-6">
            <p>Our motto  is to  give  the  best accommodation facilities  to  our students.We provide the best luxery rooms and foods to  our students.</p>
          </div>
          <div class="col-md-6">
            <p>We also provide 24/7 imergency medical service to  our  students.In our students  will  get fast wifi service.</p>
          </div>

        </div>
      </div>
    </div>

    


        <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 section-heading">
            <span class="subheading-sm">Reviews</span>
            <h2 class="heading">Guest Reviews</h2>
          </div>
        </div>
        <div class="row">
            @foreach($ratings as $rating)
          <div class="col-md-6 col-lg-4">

            <div class="block-33">
              <div class="vcard d-flex mb-3">
                <div class="image align-self-center"><img src="images/user.png" alt="Person here"></div>
                <div class="name-text align-self-center">
                  <h2 class="heading">{{$rating->user->name}} </h2>
                  <span class="meta">{{$rating->user->user_type}}</span>
                  
                  
                </div>
                @if($rating->rating == 5)
                            <label class="form-check-label px-3">
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                          </label>

                                @elseif($rating->rating == 4)
                                
                            <label class="form-check-label px-3">
                             <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                          </label>

                                @elseif($rating->rating == 3)
                            <label class="form-check-label px-3">
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                          </label>

                                @elseif($rating->rating == 2)
                            <label class="form-check-label px-3">
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                          </label>

                                @elseif($rating->rating == 1)
                            <label class="form-check-label px-3">
                            <i class="fas fa-star" style="color: #F39C12;"></i>
                          </label>
        
                                @endif
              </div>
              <div class="text">
                <blockquote>
                  <p>&rdquo;{{$rating->comment}} &ldquo;</p>
                </blockquote>
              </div>
            </div>

          </div>

          @endforeach
          
        </div>
      </div>
    </div>

@guest

@else
                    
    <div class="site-section">
    <div class="container">
      <div class="row block-9">
        <div class="col-md-7 section-heading">
            <span class="subheading-sm">Write a Review</span>
        </div>
        <div class="col-md-6 pr-md-5">
          <form action="/rating" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
            <div class="form-group">
              <div class="rateyo" id= "rating"></div>
                        <span class='result'></span>
                        <input type="hidden" name="rating">
            </div>
            <div class="form-group">
              <textarea name="comment" id="" cols="30" rows="7" class="form-control px-3 py-3" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>
      </div>
    </div>
  </div>

  @endguest


<footer class="footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section">About Us</h3>
          <p class="mb-5">Our motto  is to  give  the  best accommodation facilities  to  our students.We provide the best luxery rooms and foods to  our students.We also provide 24/7 imergency medical service to  our  students.In our students  will  get fast wifi service.</p>
          <p><a href="/" class="btn btn-primary px-4">Home</a></p>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="block-23">
            <h3 class="heading-section">Contact Info</h3>
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                <li><span class="icon icon-clock-o"></span><span class="text">24/7 service</span></li>
              </ul>
            </div>
        </div>
        
        
      </div>
      <div class="row pt-5">
        <div class="col-md-12 text-left">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

 <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
  
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('js/google-map.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>




    <script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result');
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>

  </body>
</html>
