@extends('layouts.master')

@section('title','Admin | View Bill')




@section('name','View Bill')

@section('content')




<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3   dataTable js-exportable">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date:{{$bill->date}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{$bill->user->name}}, Inc.</strong><br>
                    Phone: {{$bill->user->phone}}<br>
                    Email: {{$bill->user->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$bill->name}}</strong><br>

                    Phone: {{$bill->mobile}}<br>
                    Email: {{$bill->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment of:</b> {{$bill->months}}<br>
                  <b>Payment Status:</b> {{$bill->paymentstatus}}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row" id="content">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                     
                      <th>Type of Bills</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                     
                      <td>Hostel Bill</td>
                  
                     
                      <td>{{$bill->hostelbill}} tk</td>
                    </tr>
                    <tr>
                      
                      <td>Meal Bill</td>
                  
                  
                      <td>{{$bill->mealbill}} tk</td>
                    </tr>
                    <tr>
                   
                      <td>Internet bill</td>
                  
              
                      <td>{{$bill->internetbill}} tk</td>
                    </tr>
                    <tr>
                      
                      <td>Other Due</td>
                  
                      <td>{{$bill->otherdue}} tk</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{asset('assets/dist/img/credit/visa.png')}}" alt="Visa">
                  <img src="{{asset('assets/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                  <img src="{{asset('assets/dist/img/credit/american-express.png')}}" alt="American Express">
                  <img src="{{asset('assets/dist/img/credit/paypal2.png')}}" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                 

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$bill->totalbill}} tk</td>
                      </tr>
              
                      <tr>
                        <th>Total:</th>
                        <td>{{$bill->totalbill}} tk</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>





@endsection


@section('js')

@endsection