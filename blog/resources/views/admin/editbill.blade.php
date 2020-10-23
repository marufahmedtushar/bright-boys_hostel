@extends('layouts.master')
@section('title','Make Sure to be Paid Bill')




@section('name','Make Sure to be Paid Bill')

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
                <form action="/updatebill/{{$bills->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Id:</label>
                    <input type="text" class="form-control"  value="{{$bills->id}}">
                  </div>

                  <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control"  value="{{$bills->name}}">
                  </div>

                  <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" class="form-control"  value="{{$bills->email}}">
                  </div>

                  <div class="form-group">
                    <label>Amount:</label>
                    <input type="text" class="form-control"  value="{{$bills->totalbill}}">
                  </div>

                  <div class="form-group">
                    <label>Months:</label>
                    <input type="text" class="form-control"  value="{{$bills->months}}">
                  </div>

                  <div class="form-group">
                        <label>Bill Type :</label>
                        <select class="custom-select" name="paymentstatus"class="form-control">
                          <option></option>
                          <option value="Due">Due</option>
                          <option value="Paid">Paid</option>
                        </select>
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