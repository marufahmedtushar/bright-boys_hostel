@extends('layouts.master')
@section('title','Edit Info')




@section('name','Edit Info')
@section('content')





<section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
           
                


         <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Input Addon</h3>
              </div>
              <div class="card-body">
                <form action="" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                <div class="card-body">


                  <div class="form-group">
                    <label>Id:</label>
                    <input type="text" class="form-control"  value="{{$infos->id}}">
                  </div>

                  <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control"  value="{{$infos->name}}">
                  </div>

                  <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" class="form-control"  value="{{$infos->email}}">
                  </div>

                  <div class="form-group">
            <label >university:</label>
            <input type="text" class="form-control" value="{{$infos->university}}" >
          </div>

          <div class="form-group">
            <label >department:</label>
            <input type="text" class="form-control" value="{{$infos->department}}" >
          </div>

          <div class="form-group">
            <label>address:</label>
            <input type="text" class="form-control" value="{{$infos->addresss}}" >
          </div>


                  
                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary toastrDefaultSuccess">Submit</button>
                </div>
              </form>
                <!-- /input-group -->
              </div>
              <!-- /.card-body -->
            </div>

           
              

 
              
              </div>
            </div>
          </div>
    </section>

@endsection