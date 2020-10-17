@extends('layouts.master')
@section('title','Edit Info')




@section('name','Edit Info')
@section('content')





<section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
           
                


         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Info Form</h3>
              </div>
              <div class="card-body">
                <form action="/updateinfo/{{$infos->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                <div class="card-body">


                  <div class="form-group">
                    <label>Id:</label>
                    <input type="text" class="form-control"  value="{{$infos->id}}">
                  </div>

                  <div class="form-group">
                    <label>Edit Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$infos->name}}">
                  </div>

                  <div class="form-group">
                    <label>Edit Email address:</label>
                    <input type="email" class="form-control" name="email" value="{{$infos->email}}">
                  </div>

                  <div class="form-group">
            <label >Edit university:</label>
            <input type="text" class="form-control" name="university" value="{{$infos->university}}" >
          </div>

          <div class="form-group">
            <label >Edit department:</label>
            <input type="text" class="form-control" name="department" value="{{$infos->department}}" >
          </div>

          <div class="form-group">
            <label>Edit address:</label>
            <input type="text" class="form-control" name ="address" value="{{$infos->addresss}}" >
          </div>


          <div class="form-group">
                        <label>edit appointed   room :</label>
                        <select class="custom-select" name="room_id"class="form-control" id="room_id"  required>
                 
                         <option selected>{{$infos->room_id}}</option>
                                 @foreach($rooms as $room)
                          <option value="{{$room->id}}">{{$room->room_number}}-->{{$room->id}}</option>
                        @endforeach
                        </select>
                      </div>

            <div class="form-group">
                        <label>edit   room :</label>
                        <select class="custom-select" name="room_number"class="form-control" id="room_number"  required>

                        	<option selected>{{$infos->room_number}}</option>
                         @foreach($rooms as $room)
                          <option value="{{$room->room_number}}">{{$room->room_number}}</option>
                        @endforeach
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
<script>
 $('.toastrDefaultSuccess').click(function() {
      toastr.success('Student info  updated')
    });
</script>

@endsection