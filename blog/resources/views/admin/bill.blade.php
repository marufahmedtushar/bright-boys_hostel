@extends('layouts.master')
@section('title','Bills')




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
                  <td><a class="btn btn-primary btn-sm" href="/viewbill/{{$bill->id}}"><i class="fas fa-eye"></i> View Bill </a>
                    <a class="btn btn-info btn-sm" href="/editbill/{{$bill->id}}"><i class="fas fa-pencil-alt"></i> Make Sure to be Paid </a>
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>


             
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



  </script>
  @endsection