@extends('layouts.master')
@section('title','Users')




@section('name','Users')
@section('content')


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info card-outline">
              <div class="card-body">
                


                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Created at</th>
                  <th><i class="fas fa-cogs"></i></th>
                
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)

                    
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td><span class="badge badge-success">{{$user->user_type}}</span></td>
                  <td> {{$user->created_at}}</td>
                  <td><a class="btn btn-info btn-sm" href="/userroleedit/{{$user->id}}"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-userid="{{$user->id}}">
                        <i class="fas fa-trash"></i> Delete</a>
                     
                      
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>

           
              <div class="modal fade" id="edituser">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editform"action="{{ route('users.update',$user->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
          <div class="form-group">
                 <input type="hidden" name="user_id"class="form-control" id="user_id" value="{{$user->id}}">
          </div>

          <div class="form-group">
            <label>Id :</label>
                 <input type="text" name="id"class="form-control" id="id">
          </div>

          <div class="form-group">
            <label>Name :</label>
                 <input type="text" name="name"class="form-control" id="name">
          </div>

         <!--  <div class="form-group">
            <p>Give a role :</p>
            <input type="text" name="user_type"class="form-control" id="user_type">
          </div> -->

          

          <div class="form-group">
                        <label>User Typre :</label>
                        <select class="custom-select" name="user_type"class="form-control" id="user_type" required>
                          <option value="admin">admin</option>
                          <option value="user">user</option>
                          <option value="student">student</option>
                          <option value=" "> </option>
                        </select>
                      </div>
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrDefaultSuccess">Submit</button>
      
        </form>
      </div>
      
    </div>
  </div>
</div>

        @foreach($users as $user)

<div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deleteuser/{{$user->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete Room  ??</p>
                  <input type="hidden" name="user_id" id="user_id">
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button class="btn btn-danger btn-sm toastrDefaultDelete">Delete </button>
            </div>
            </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      @endforeach

 
              
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

	$('#edituser').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var user_id = button.data('userid') 
  var user_name = button.data('username') 
  var user_type = button.data('usertype') 
  var modal = $(this)
  modal.find('.modal-body #user_id').val(user_id)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(user_name)
  modal.find('.modal-body #user_type').val(user_type)
})


    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('User Type Edited Successfully')
    });
$('#modal-danger').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var user_id = button.data('userid') 
  var modal = $(this)
  modal.find('.modal-body #user_id').val(user_id)
})

$('.toastrDefaultDelete').click(function() {
      toastr.success('User Deleted')
    });


   
   
</script>
@endsection