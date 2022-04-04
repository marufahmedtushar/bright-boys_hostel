<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bright Boys Hostel | Home </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link href="{{asset('images/hostel.ico')}}" rel="shortcut icon">
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
  </head>
  <body>
    
    
    @extends('nav')
    <!-- END nav -->
    
    <div class="block-31" style="position: relative;">
      <div class="owl-carousel loop-block-31 ">
        <div class="block-30 item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-10">
                <span class="subheading-sm">Welcome</span>
                <h2 class="heading">Enjoy a Luxury Experience</h2>
                <p><a href="#" class="btn py-4 px-5 btn-primary">Learn More</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="block-30 item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-10">
                <span class="subheading-sm">Welcome</span>
                <h2 class="heading">Simple &amp; Elegant</h2>
                <p><a href="#" class="btn py-4 px-5 btn-primary">Learn More</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="block-30 item" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-10">
                <span class="subheading-sm">Welcome</span>
                <h2 class="heading">Food &amp; Drinks</h2>
                <p><a href="#" class="btn py-4 px-5 btn-primary">Learn More</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @guest
    <div class="container">
      
      <div class="row site-section">
        <div class="col-md-12">
          <div class="row mb-5">
            <div class="col-md-7 section-heading">
              <span class="subheading-sm">Services</span>
              <h2 class="heading">Facilities &amp; Services</h2>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-double-bed"></span></div>
            <div class="media-body">
              <h3 class="heading">Luxury Rooms</h3>
              <p>We try to  provide  the  best  rooms  to  the  students.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-wifi"></span></div>
            <div class="media-body">
              <h3 class="heading">Fast &amp; Free Wifi</h3>
              <p>The  stident's of  our  hostel  will  get  24/7 Wifi service.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-taxi"></span></div>
            <div class="media-body">
              <h3 class="heading">Imergency Service</h3>
              <p>We provide 24/7 imergency  service  to  our students.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-dinner"></span></div>
            <div class="media-body">
              <h3 class="heading">Meals</h3>
              <p>We provide  the  best  food  to  our  students.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @else
      @foreach($infos as $info)
      @if(Auth::user()->user_type == 'student' && Auth::user()->name != $info->name)
      <div class="container">
        <div class="row site-section">
        <div class="col-md-12">
          <div class="row mb-5">
            <div class="col-md-12 section-heading">
              <span class="subheading-sm">Welcome To Bright Boys Hostel</span>
              <h2 class="heading">Seems like you are new here and haven't got any room yet.Soon our Admin will sugget you a room.Till Then Take care.</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

      @else

    
    <div class="container">
      
      <div class="row site-section">
        <div class="col-md-12">
          <div class="row mb-5">
            <div class="col-md-7 section-heading">
              <span class="subheading-sm">Your PRofile</span>
              <h2 class="heading">Name: {{Auth::user()->name}}</h2>
            </div>
          </div>
        </div>
        
        @if( Auth::user()->name == $info->name)
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            
            <div class="media-body">
              <h3 class="heading">Email</h3>
              <p>{{$info->email}}</p>
            </div>
          </div>
        </div>
        
        
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            
            <div class="media-body">
              <h3 class="heading">University</h3>
              <p>{{$info->university}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            
            <div class="media-body">
              <h3 class="heading">Department</h3>
              <p>{{$info->department}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            
            <div class="media-body">
              <h3 class="heading">Address</h3>
              <p>{{$info->addresss}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            
            <div class="media-body">
              <h3 class="heading">Room number</h3>
              <p>{{$info->room_number}}</p>
            </div>
          </div>
        </div>
        @endif
        
      </div>
    </div>

    @foreach($bills as  $bill)
      @if( Auth::user()->name == $bill->name)


    <div class="site-section block-13 bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 section-heading">
            
            <h2 class="heading">Your Bill</h2>
            <p></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            
            
            <table class="table table-borderless table-dark">
              <thead>
                <tr>
                  <th scope="col">Month</th>
                  <th scope="col">Hostel Bill</th>
                  <th scope="col">Meal Bill</th>
                  <th scope="col">Internet Bill</th>
                  <th scope="col">Other Due</th>
                  <th scope="col">Total Bill</th>
                  <th scope="col">Payment Status</th>
                </tr>
              </thead>
              <tbody>
                
                <tr>
                  
                  <td>
                    
                    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$bill->months}}</button>
                      </div>
                    
                    
                  </td>
                  <td>
                    
                    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$bill->hostelbill}}</button>
                      </div>
                   
                    
                  </td>
                  <td>
                   
                    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$bill->mealbill}}</button>
                      </div>
                    
                   
                  </td>
                  <td>
                    
                  
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$bill->internetbill}}</button>
                      </div>
                   
                   
                  </td>
                  <td>
                    
                    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$bill->otherdue}}</button>
                      </div>
                   
                   
                  </td>
                  <td>
                    
                   
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$bill->totalbill}}</button>
                      </div>
                    
                   
                  </td>
                  <td>
                    
                   
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$bill->paymentstatus}}</button>
                      </div>
                  
                   
                  </td>
                </tr>
                  
              </tbody>
            </table>
            
            
            </div> <!-- .col-md-12 -->
          </div>
        </div>
      </div>
        @endif
      @endforeach

      @endif
      @endforeach
    
    
    @endguest


    @guest
    <div class="site-section block-13 bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 section-heading">
            <span class="subheading-sm">Our Dishes for the Students</span>
            <h2 class="heading">Meal Chart</h2>
            <p></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            
            
            <table class="table table-borderless table-dark">
              <thead>
                <tr>
                  <th scope="col">Day</th>
                  <th scope="col">Breakfast</th>
                  <th scope="col">Lunch</th>
                  <th scope="col">Dinner</th>
                </tr>
              </thead>
              <tbody>
                @foreach($menus as  $menu)
                <tr>
                  <th scope="row">{{$menu->day}}</th>
                  <td>
                    @foreach( explode(",",$menu->breakfast_menu) as $row)
                    <form action="" class="subscribe">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$row}}</button>
                      </div>
                    </form>
                    @endforeach
                  </td>
                  <td>
                    @foreach( explode(",",$menu->lunch_menu) as $row)
                    <form action="" class="subscribe">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$row}}</button>
                      </div>
                    </form>
                    @endforeach
                  </td>
                  <td>
                    @foreach( explode(",",$menu->dinner_menu) as $row)
                    <form action="" class="subscribe">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$row}}</button>
                      </div>
                    </form>
                    @endforeach
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
            
            </div> <!-- .col-md-12 -->
          </div>
        </div>
      </div>
    @elseif(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'student')
    
    <div class="site-section block-13 bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 section-heading">
            <span class="subheading-sm">Our Dishes for the Students</span>
            <h2 class="heading">Meal Chart</h2>
            <p></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            
            
            <table class="table table-borderless table-dark">
              <thead>
                <tr>
                  <th scope="col">Day</th>
                  <th scope="col">Breakfast</th>
                  <th scope="col">Lunch</th>
                  <th scope="col">Dinner</th>
                </tr>
              </thead>
              <tbody>
                @foreach($menus as  $menu)
                <tr>
                  <th scope="row">{{$menu->day}}</th>
                  <td>
                    @foreach( explode(",",$menu->breakfast_menu) as $row)
                    <form action="" class="subscribe">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$row}}</button>
                      </div>
                    </form>
                    @endforeach
                  </td>
                  <td>
                    @foreach( explode(",",$menu->lunch_menu) as $row)
                    <form action="" class="subscribe">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$row}}</button>
                      </div>
                    </form>
                    @endforeach
                  </td>
                  <td>
                    @foreach( explode(",",$menu->dinner_menu) as $row)
                    <form action="" class="subscribe">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary submit">{{$row}}</button>
                      </div>
                    </form>
                    @endforeach
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
            
            </div> <!-- .col-md-12 -->
          </div>
        </div>
      </div>
      @endguest
      @guest
       <div class="site-section bg-light">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-7 section-heading">
              <span class="subheading-sm">Menus</span>
              <h2 class="heading">Our Hostel Menu</h2>
            </div>
          </div>
          <div class="block-35">
            
            <ul class="nav" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Breakfast</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lunch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Dinner</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                  <div class="col-md-12 block-13">
                    <div class="nonloop-block-13 owl-carousel">
                      @foreach($items as $item)
                      @if($item->categories_id == '1')
                      <div class="item">
                        <div class="block-34">
                          <div class="image">
                            <a href="#"><img src="/storage/cover_images/{{$item->cover_image}}" alt="Image placeholder"style="height: 200px;width: 550px;"></a>
                          </div>
                          <div class="text">
                            <h2 class="heading">{{$item->name}}</h2>
                            <p></p>
                            <div class="price"><span class="number">{{$item->categories->name}}</span></div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                  <div class="col-md-12 block-13">
                    <div class="nonloop-block-13 owl-carousel">
                      @foreach($items as $item)
                      @if($item->categories_id == '2')
                      <div class="item">
                        <div class="block-34">
                          <div class="image">
                            <a href="#"><img src="/storage/cover_images/{{$item->cover_image}}" alt="Image placeholder"style="height: 200px;width: 500px;"></a>
                          </div>
                          <div class="text">
                            <h2 class="heading">{{$item->name}}</h2>
                            <p></p>
                            <div class="price"><span class="number">{{$item->categories->name}}</span></div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row">
                  <div class="col-md-12 block-13">
                    <div class="nonloop-block-13 owl-carousel">
                      @foreach($items as $item)
                      @if($item->categories_id == '3')
                      <div class="item">
                        <div class="block-34">
                          <div class="image">
                            <a href="#"><img src="/storage/cover_images/{{$item->cover_image}}" alt="Image placeholder"style="height: 200px;width: 500px;"></a>
                          </div>
                          <div class="text">
                            <h2 class="heading">{{$item->name}}</h2>
                            <p></p>
                            <div class="price"><span class="number">{{$item->categories->name}}</span></div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @elseif(Auth::user()->user_type == 'student')
      @else
      <div class="site-section bg-light">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-7 section-heading">
              <span class="subheading-sm">Menus</span>
              <h2 class="heading">Our Hostel Menu</h2>
            </div>
          </div>
          <div class="block-35">
            
            <ul class="nav" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Breakfast</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lunch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Dinner</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                  <div class="col-md-12 block-13">
                    <div class="nonloop-block-13 owl-carousel">
                      @foreach($items as $item)
                      @if($item->categories_id == '1')
                      <div class="item">
                        <div class="block-34">
                          <div class="image">
                            <a href="#"><img src="/storage/cover_images/{{$item->cover_image}}" alt="Image placeholder"style="height: 200px;width: 550px;"></a>
                          </div>
                          <div class="text">
                            <h2 class="heading">{{$item->name}}</h2>
                            <p></p>
                            <div class="price"><span class="number">{{$item->categories->name}}</span></div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                  <div class="col-md-12 block-13">
                    <div class="nonloop-block-13 owl-carousel">
                      @foreach($items as $item)
                      @if($item->categories_id == '2')
                      <div class="item">
                        <div class="block-34">
                          <div class="image">
                            <a href="#"><img src="/storage/cover_images/{{$item->cover_image}}" alt="Image placeholder"style="height: 200px;width: 500px;"></a>
                          </div>
                          <div class="text">
                            <h2 class="heading">{{$item->name}}</h2>
                            <p></p>
                            <div class="price"><span class="number">{{$item->categories->name}}</span></div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row">
                  <div class="col-md-12 block-13">
                    <div class="nonloop-block-13 owl-carousel">
                      @foreach($items as $item)
                      @if($item->categories_id == '3')
                      <div class="item">
                        <div class="block-34">
                          <div class="image">
                            <a href="#"><img src="/storage/cover_images/{{$item->cover_image}}" alt="Image placeholder"style="height: 200px;width: 500px;"></a>
                          </div>
                          <div class="text">
                            <h2 class="heading">{{$item->name}}</h2>
                            <p></p>
                            <div class="price"><span class="number">{{$item->categories->name}}</span></div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endguest
      
      
      
      <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12">
              <h2 class="heading">Quality accommodation that exceeds the expectations</h2>
              <p><a href="#" class="btn py-4 px-5 btn-primary">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="site-section bg-light">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-7 section-heading">
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4">
              
            </div>
            <div class="col-md-6 col-lg-4">
              
            </div>
            <div class="col-md-6 col-lg-4">
              
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-6 col-lg-4">
              <h3 class="heading-section">About Us</h3>
              <p class="mb-5">Our motto  is to  give  the  best accommodation facilities  to  our students.We provide the best luxery rooms and foods to  our students.We also provide 24/7 imergency medical service to  our  students.In our students  will  get fast wifi service..</p>
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
      
    </body>
  </html>