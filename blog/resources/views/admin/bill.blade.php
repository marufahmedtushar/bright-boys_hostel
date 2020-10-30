@extends('layouts.master')
@section('title','Admin | Bills')




@section('name','Bills')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info card-outline">
               <div class="card-header">
                <h3 class="card-title">
                  <i class=""></i>
                </h3>
              </div>
              <div class="card-body">
                


                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Room Number</th>
                  <th>Month</th>
                  <th>Payment Status</th>
                  <th><i class="fas fa-cogs"></i></th>
              
                </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)

                    

                    
                <tr>
                  <td>{{$bill->id}}</td>
                  <td>{{$bill->name}}</td>
                  <td>{{$bill->room_number}}</td>
                  <td>{{$bill->months}}</td>
                  <td>@if($bill->paymentstatus == 'Due')
                    <span class="badge badge-warning ">{{$bill->paymentstatus}}
                    </span>
                    @elseif($bill->paymentstatus == 'Paid')
                    <span class="badge badge-success ">{{$bill->paymentstatus}}
                    </span>
                    @endif
                  </td>
                  <td><a class="btn btn-primary btn-sm" href="/viewbill/{{$bill->id}}"><i class="fas fa-eye"></i>   <i class="fas fa-file-invoice-dollar"></i></a>

                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#editbill" data-id="{{$bill->id}}"data-billid="{{$bill->id}}"data-name="{{$bill->name}}"data-email="{{$bill->email}}"data-amount="{{$bill->totalbill}}"data-months="{{$bill->months}}"data-paymentstatus="{{$bill->paymentstatus}}"><i class="fas fa-pencil-alt"></i></a>

                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-billid="{{$bill->id}}" data-name="{{$bill->name}}">
                        <i class="fas fa-trash"></i></a>
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>

              <div class="modal fade" id="editbill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Make Sure to be Paid</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/updatebill" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" id="id">
                  </div>

                  <div class="form-group">

                  <label>Id:</label>
                    <input type="text" class="form-control"  id="bill_id">
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
                    <label>Amount:</label>
                    <input type="text" class="form-control"  id="amount">
                  </div>

                  <div class="form-group">
                    <label>Months:</label>
                    <input type="text" class="form-control" id="months">
                  </div>

                  <div class="form-group">
                        <label>Bill Type :</label>
                        <select class="custom-select" id="paymentstatus" name="paymentstatus"class="form-control">
                          <option></option>
                          <option value="Due">Due</option>
                          <option value="Paid">Paid</option>
                        </select>
                      </div>

        
          
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrDefaultSuccess">Submit</button>
      
        </form>
      </div>



      
          </div>
      </div>
  </div>



 @foreach($bills as $bill)

<div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Menu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deletebill/{{$bill->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete This Student's Bill Named</p>
                  <input type="hidden" name="bill_id" id="bill_id">
                  <div class="form-group">
                    <input type="text" class="form-control"  id="name" style="border:3px solid #ffffff;border-radius:10px;">
                </div>
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button class="btn btn-danger btn-sm toastrBillDelete">Delete </button>
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



    $('#editbill').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var bill_id = button.data('billid') 
  var name = button.data('name') 
  var email = button.data('email') 
  var amount = button.data('amount') 
  var months = button.data('months') 
  var paymentstatus = button.data('paymentstatus') 


  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #bill_id').val(bill_id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #amount').val(amount)
  modal.find('.modal-body #months').val(months)
  modal.find('.modal-body #paymentstatus').val(paymentstatus)


})

    $('#modal-danger').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var bill_id = button.data('billid') 
  var name = button.data('name') 
  var modal = $(this)
  modal.find('.modal-body #bill_id').val(bill_id)
  modal.find('.modal-body #name').val(name)
})

    $('.toastrBillDelete').click(function() {
      toastr.success('Bill Deleted')
    });




  </script>
  @endsection