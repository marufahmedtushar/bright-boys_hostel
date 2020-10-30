@extends('layouts.master')
@section('title','Admin | Dashboard')




@section('name','Dashboard')
@section('content')



  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$totalrooms}}</h3>

                <p>Rooms</p>
              </div>
              <div class="icon">
                <i class="fas fa-building"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$totalusers}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" style="color: #ffffff!important;">
              <div class="inner">
                <h3>{{$totalstudents}}</h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$totalcategories}}</h3>

                <p>Categories of Meal</p>
              </div>
              <div class="icon">
                <i class="fas fa-utensils"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$totalmenus}}</h3>

                <p>Number of Meal Item</p>
              </div>
              <div class="icon">
                <i class="fas fa-drumstick-bite"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$totalcontact}}</h3>

                <p>Contacts</p>
              </div>
              <div class="icon">
                <i class="fas fa-id-card-alt"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #009c68!important;color: #ffffff!important;">
              <div class="inner">
                <h3>{{$totalrating}}</h3>

                <p>Ratings</p>
              </div>
              <div class="icon">
                <i class="fas fa-star"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            
            <!-- /.card -->

    

            <!-- TO DO List -->

            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
             
              
              
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            
            <!-- /.card -->

            <!-- Calendar -->
            
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>








@endsection





