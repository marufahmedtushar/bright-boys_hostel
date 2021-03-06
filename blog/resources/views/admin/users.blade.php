@extends('layouts.master')
@section('title','Admin | Users')




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
                  <td>

                  <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#useredit" data-id="{{$user->id}}"data-userid="{{$user->id}}"data-name="{{$user->name}}"data-email="{{$user->email}}"data-usertype="{{$user->user_type}}"><i class="fas fa-pencil-alt"></i></a>

                  <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-userid="{{$user->id}}"data-name="{{$user->name}}">
                        <i class="fas fa-trash"></i></a>
                     
                      
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>

           @foreach($users as $user)
              <div class="modal fade" id="useredit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">User Role Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/userroleupdate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          <div class="form-group">
              <input type="hidden" name="id"class="form-control" id="id">
          </div>

          <div class="form-group">
                <label>Id:</label>
                <input type="text" class="form-control"  id="user_id">
          </div>

          <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control"  id="name">
          </div>
          <div class="form-group">
                <label>Email address:</label>
                <input type="email" class="form-control"  id="email">
          </div>

          <div class="form-group">
                <label>User Type :</label>
                <select class="custom-select" name="user_type"class="form-control" id="user_type">
                      <option selected>{{$user->user_type}}</option>
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
 @endforeach

        @foreach($users as $user)

<div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deleteuser/{{$user->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete This User??</p>
                  <input type="hidden" name="user_id" id="user_id">

                  <div class="form-group">
                    <input type="text" class="form-control"  id="name" style="border:3px solid #ffffff;border-radius:10px;">
                </div>
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

	$('#useredit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var user_id = button.data('userid') 
  var name = button.data('name') 
  var email = button.data('email') 
  var user_type = button.data('usertype') 
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #user_id').val(user_id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
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
  var name = button.data('name') 
  var modal = $(this)
  modal.find('.modal-body #user_id').val(user_id)
  modal.find('.modal-body #name').val(name)
})

$('.toastrDefaultDelete').click(function() {
      toastr.success('User Deleted')
    });


   
   
</script>
@endsection