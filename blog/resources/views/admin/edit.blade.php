@extends('layouts.master')
@section('title','User Edit')




@section('name','User Edit')

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
                <form action="/userroleupdate/{{$users->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="text" class="form-control"  value="{{$users->id}}">
                  </div><div class="form-group">
                    <label>Email address</label>
                    <input type="text" class="form-control"  value="{{$users->name}}">
                  </div><div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control"  value="{{$users->email}}">
                  </div>

                  <div class="form-group">
                        <label>User Typre :</label>
                        <select class="custom-select" name="usertype"class="form-control" id="user_type"  required>
                          <option>{{$users->user_type}}</option>
                          <option value="admin">admin</option>
                          <option value="user">user</option>
                          <option value="student">student</option>
                          <option value=" "> </option>
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

@section('js')

@endsection
