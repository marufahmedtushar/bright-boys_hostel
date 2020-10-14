@extends('layouts.master')
@section('title','Students')




@section('name','Students')

@section('content')


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info card-outline">
               <div class="card-header">
                <h3 class="card-title">
                  <i class=""></i>
                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add Info</button>
                </h3>
              </div>
              <div class="card-body">
                


                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>University</th>
                  <th>Department</th>
                  <th>Address</th>
                  <th>Room Number</th>
                  <th><i class="fas fa-cogs"></i></th>
                
                </tr>
                </thead>
                <tbody>
                    @foreach($infos as $info)

                    

                    
                <tr>
                  <td>{{$info->id}}</td>
                  <td>{{$info->name}}</td>
                  <td>{{$info->email}}</td>
                  <td>{{$info->university}}</td>
                  <td>{{$info->department}}</td>
                  <td>{{$info->addresss}}</td>
                  <td>{{$info->room_number}}</td>
                  <td><a class="btn btn-info btn-sm" href="/editinfo/{{$info->id}}"><i class="fas fa-pencil-alt"></i> Edit</a>
                    
                     
                      
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>

            

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/infocreate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          

          <div class="form-group">
                        <label>Name :</label>
                        <select class="custom-select" name="name"class="form-control" id="name">
                         @foreach($users as $user)
                          @if ($user->user_type == 'admin' ) @continue @endif
                          <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                        </select>
                      </div>

          <div class="form-group">
            <label >email:</label>
            <input type="text" name="email"class="form-control" id="email" >
          </div>

          <div class="form-group">
            <label >university:</label>
            <input type="text" name="university"class="form-control" id="university" >
          </div>

          <div class="form-group">
            <label >department:</label>
            <input type="text" name="department"class="form-control" id="department" >
          </div>

          <div class="form-group">
            <label>address:</label>
            <input type="text" name="address"class="form-control" id="address">
          </div>

          <div class="form-group">
                        <label>appoint a  room :</label>
                        <select class="custom-select" name="room_id"class="form-control" id="room_id"  required>
                         @foreach($rooms as $room)
                          <option value="{{$room->id}}">{{$room->room_number}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>re-enter   room :</label>
                        <select class="custom-select" name="room_number"class="form-control" id="room_number"  required>
                         @foreach($rooms as $room)
                          <option value="{{$room->room_number}}">{{$room->room_number}}</option>
                        @endforeach
                        </select>
                      </div>

          


          
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrDefaultSuccess">Submit</button>
      
        </form>
      </div>

 
      
    </div>
  </div>
</div>
          </div>
      </div>
  </div>
</div>
</div>
</section>

@endsection


@section('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name') 
  var university = button.data('university') 
  var department = button.data('department') 
  var address = button.data('address') 
  var modal = $(this)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #university').val(university)
  modal.find('.modal-body #department').val(department)
  modal.find('.modal-body #address').val(address)
})

  $('.toastrDefaultSuccess').click(function() {
      toastr.success('New room created')
    });
</script>

@endsection