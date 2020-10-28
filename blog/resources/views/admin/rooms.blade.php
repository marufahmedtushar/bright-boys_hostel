@extends('layouts.master')
@section('title','Rooms')




@section('name','Rooms')
@section('content')

  

  <!-- Content Wrapper. Contains page content -->

  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class=""></i>
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-plus-circle"></i> Add Room</button>
                </h3>
              </div>

              <!-- @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif -->
              <div class="card-body">
                


                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Room Number</th>
                  <th>Created at</th>
                  <th>Created by</th>
                  <th><i class="fas fa-trash"></i></th>
                
                </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)

                    
                <tr>
                  <td>{{$room->id}}</td>
                  <td>{{$room->room_number}}</td>
                  <td> {{$room->created_at}}</td>
                  <td>{{$room->user->name}}</td>
                  <td><a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-roomid="{{$room->id}}"data-roomnumber="{{$room->room_number}}">
                        <i class="fas fa-trash"></i></a>
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>
                
                
                
              </div>
              <!-- /.card -->
            </div>

            
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Add New room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/roomcreate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Room Number:</label>
            <input type="text" name="room_number"class="form-control" id="room_number">
          </div>
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrDefaultSuccess">Submit</button>
      
        </form>
      </div>
      
    </div>
  </div>
</div>
      <!-- /.modal -->
    @foreach($rooms as $room)

      <div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Room</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deleteroom/{{$room->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete Room  ??</p>
                  <input type="hidden" name="room_id" id="room_id">
                  <div class="form-group">
                    <input type="text" class="form-control"  id="room_number" style="border:3px solid #ffffff;border-radius:10px;">
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

   $('.toastrDefaultSuccess').click(function() {
      toastr.success('New room created')
    });
     $('.toastrDefaultDelete').click(function() {
      toastr.success('Room Deleted')
    });

   $('#modal-danger').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var room_id = button.data('roomid') 
  var room_number = button.data('roomnumber') 
  var modal = $(this)
  modal.find('.modal-body #room_id').val(room_id)
  modal.find('.modal-body #room_number').val(room_number)
})
</script>

@endsection


