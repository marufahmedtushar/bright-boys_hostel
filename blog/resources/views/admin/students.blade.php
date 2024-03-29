@extends('layouts.master')
@section('title','Admin | Students')




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
                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add Student </button>
                </h3>
              </div>
              <div class="card-body">
                


                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Room Number</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($infos as $info)

                    

                    
                <tr>
                  <td>{{$info->id}}</td>
                  <td>{{$info->name}}</td>
                  <td>{{$info->room_number}}</td>
                  <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#info"  data-id="{{$info->id}}"data-name="{{$info->name}}"data-student_id="{{$info->student_id}}"data-email="{{$info->email}}"data-university="{{$info->university}}"data-department="{{$info->department}}"data-address="{{$info->addresss}}"data-roomnumber="{{$info->room_number}}"><i class="fas fa-eye"></i></button>

                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoedit"  data-id="{{$info->id}}"data-infoid="{{$info->id}}"data-name="{{$info->name}}"data-email="{{$info->email}}"data-university="{{$info->university}}"data-department="{{$info->department}}"data-address="{{$info->addresss}}"data-roomnumber="{{$info->room_number}}" data-roomid="{{$info->room_id}}"><i class="fas fa-pencil-alt"></i></button>

                  
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bill" data-name="{{$info->name}}"data-email="{{$info->email}}"data-roomnumber="{{$info->room_number}}"><i class="fas fa-plus-circle"></i> <i class="fas fa-file-invoice-dollar"></i></button>

                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-id="{{$info->id}}" data-name="{{$info->name}}">
                        <i class="fas fa-trash"></i></a>
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>


            

            

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">New Student Details</h5>
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
                          @if ($user->user_type == 'admin') @continue 
                          @elseif ($user->user_type == 'user') @continue @endif
                          <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                        </select>
                      </div>
          <div class="form-group">
                        <label>Confirm Name :</label>
                        <select class="custom-select" name="student_id"class="form-control" id="student_id">
                         @foreach($users as $user)
                          @if ($user->user_type == 'admin') @continue 
                          @elseif ($user->user_type == 'user') @continue @endif
                          <option value="{{$user->id}}">{{$user->name}}</option>
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




<div class="modal fade" id="bill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Create Bill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/billcreate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

<div class="col-md-4 ">
                <div class="form-group">
                  <label>Date</label>
                <input type="text" name="date"id="datepicker" class="form-control">
                  
              
                </div>
              </div>
          

          <div class="form-group">
                        <label>Name :</label>
                        <select class="custom-select" name="name"class="form-control" id="name">
                         @foreach($users as $user)
                          @if ($user->user_type == 'admin') @continue 
                          @elseif ($user->user_type == 'user') @continue @endif
                          <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                        </select>
                      </div>

          <div class="form-group">
            <label >email:</label>
            <input type="text" name="email"class="form-control" id="email" >
          </div>

          <div class="form-group">
            <label >mobile:</label>
            <input type="text" name="mobile"class="form-control" id="mobile" >
          </div>

        

          
          <div class="form-group">
              <label>   room :</label>
              <select class="custom-select" name="room_number"class="form-control" id="room_number"  required>
                        @foreach($infos as $info)
                <option selected>{{$info->room_number}}</option>
                    
                        @endforeach
              </select>
          </div>


          <div class="form-group">
                        <label>payment :</label>
                        <select class="custom-select" name="payment_status"class="form-control" id="payment_status"  required>
                          <option value="Due">due</option>
                          <option value="Paid">paid</option>
                        </select>
                      </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Month</label>
                  <div class="col-md-2">
                    <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="January">
                  <label class="form-check-label" >
                    January
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="February">
                  <label class="form-check-label" >
                    February
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="March">
                  <label class="form-check-label" >
                    March
                  </label>
                </div>
              </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                <div class="form-group">
                  <label></label>
                  <div class="col-md-2">
                    <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="April">
                  <label class="form-check-label" >
                    April
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="May">
                  <label class="form-check-label" >
                    May
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="June">
                  <label class="form-check-label" >
                    June
                  </label>
                </div>
              </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label></label>
                  <div class="col-md-2">
                    <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="July">
                  <label class="form-check-label" >
                    July
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="August">
                  <label class="form-check-label" >
                    August
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="September">
                  <label class="form-check-label" >
                    September
                  </label>
                </div>
              </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label></label>
                  <div class="col-md-2">
                    <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="October">
                  <label class="form-check-label" >
                    October
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="November">
                  <label class="form-check-label" >
                    November
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="months[]" value="December">
                  <label class="form-check-label" >
                    December
                  </label>
                </div>
              </div>
                </div>
              </div>

                </div>



                <div class="row">
              <div class="col-md-3 ">
                <div class="form-group">
                  <label>Hostel Bill</label>
                <input type="number" class="form-control prc" name="hostelbill">
                </div>
              </div>

              <div class="col-md-3 ">
                <div class="form-group">
                  <label>Meal Bill</label>
                <input type="number" class="form-control prc" name="mealbill">
                </div>
              </div>

              <div class="col-md-3 ">
                <div class="form-group">
                  <label>Internet Bill</label>
                <input type="number" class="form-control prc" name="internetbill">
                </div>
              </div>
            

              

              <div class="col-md-3 ">
                <div class="form-group">
                  <label>Other Due</label>
                <input type="number" class="form-control prc" name="otherdue">
                  
              
                </div>
              </div>
            </div>

            

            <div class="row justify-content-center">
              <div class="col-md-4 ">
                <div class="form-group">
                  <label>Total Bill</label>
                  <label id="result"></label>
                  <input  id="total_amount" name="totalbill" class="form-control">
                
                  
              
                </div>
              </div>
            </div>

          


          
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrDefaultSuccess">Submit</button>
      
        </form>
      </div>

 
      
    </div>
  </div>
</div>




<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Student's Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          

          <div class="form-group">
            <label >id:</label>
            <input type="text" name="id"class="form-control" id="id" >
          </div>

          <div class="form-group">
            <label >name:</label>
            <input type="text" name="name"class="form-control" id="name" >
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
            <label >address:</label>
            <input type="text" name="address"class="form-control" id="address" >
          </div>

          <div class="form-group">
            <label >room number:</label>
            <input type="text" name="room_number"class="form-control" id="room_number" >
          </div>

          
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      
        </form>
      </div>

 
      
    </div>
  </div>
</div>

@foreach($infos as $info)
<div class="modal fade" id="infoedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student's Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/infoupdate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          

          <div class="form-group">
            <input type="hidden" name="id"class="form-control" id="id" >
          </div>


          <div class="form-group">
                  <label>Id:</label>
                  <input type="text"  class="form-control" id="info_id">
                  </div>

          

          <div class="form-group">
            <label >name:</label>
            <input type="text" name="name"class="form-control" id="name" >
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
            <label >address:</label>
            <input type="text" name="address"class="form-control" id="address" >
          </div>


          <div class="form-group">
                        <label>edit appointed   room :</label>
                        <select class="custom-select" name="room_id"class="form-control" id="room_id"  required>
                 
                         <option selected>{{$info->room_id}}</option>
                                 @foreach($rooms as $room)
                          <option value="{{$room->id}}">{{$room->room_number}}-->{{$room->id}}</option>
                        @endforeach
                        </select>
                      </div>



          <div class="form-group">
                        <label>edit   room :</label>
                        <select class="custom-select" name="room_number"class="form-control" id="room_number"  required>

                          <option selected>{{$info->room_number}}</option>
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

@endforeach




@foreach($infos as $info)

<div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Student</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deletestudent/{{$info->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete This Student  ??</p>
                  <input type="hidden" name="id" id="id" >

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



 
<script type="text/javascript">
   

  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  $('#bill').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name') 
  var email = button.data('email') 
  var room_number = button.data('roomnumber') 

  var modal = $(this)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #room_number').val(room_number)

})

  $('.toastrDefaultSuccess').click(function() {
      toastr.success('New student added')
    });

  $('.toastrDefaultDelete').click(function() {
      toastr.success('Student deleted')
    });



  $('#info').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var name = button.data('name') 
  var student_id = button.data('student_id') 
  var email = button.data('email') 
  var university = button.data('university') 
  var department = button.data('department') 
  var address = button.data('address') 
  var room_number = button.data('roomnumber') 

  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #student_id').val(student_id)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #university').val(university)
  modal.find('.modal-body #department').val(department)
  modal.find('.modal-body #address').val(address)
  modal.find('.modal-body #room_number').val(room_number)

})

  $('#infoedit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var info_id = button.data('infoid') 
  var name = button.data('name') 
  var email = button.data('email') 
  var university = button.data('university') 
  var department = button.data('department') 
  var address = button.data('address') 
  var room_number = button.data('roomnumber') 
  var room_id = button.data('roomid') 

  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #info_id').val(info_id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #university').val(university)
  modal.find('.modal-body #department').val(department)
  modal.find('.modal-body #address').val(address)
  modal.find('.modal-body #room_number').val(room_number)
  modal.find('.modal-body #room_id').val(room_id)

})

  $('#showbill').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var name = button.data('name') 
  var email = button.data('email') 
  var room_number = button.data('roomnumber') 

  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #room_number').val(room_number)

})


  $('#modal-danger').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var info_id = button.data('id') 
  var name = button.data('name') 
  var modal = $(this)
  modal.find('.modal-body #id').val(info_id)
  modal.find('.modal-body #name').val(name)
})


  $('#datepicker').datetimepicker({
  timepicker: false,
  datepicker: true,
    format: 'y-m-d',
    value: '2020-01-01'
});


  $('.form-group').on('input','.prc',function(){
    var total_amount = function(){
    var totalSum = 0;
    $('.form-group .prc').each(function(){
      var inputVal = $(this).val();
      if($.isNumeric(inputVal)){
        totalSum += parseFloat(inputVal);
      }
    });
    $('#total_amount').val(totalSum)
  }

  $('.form-group .prc').keyup(function(){
    total_amount();
  });


  });

</script>

@endsection