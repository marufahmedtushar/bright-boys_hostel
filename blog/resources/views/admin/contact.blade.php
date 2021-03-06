@extends('layouts.master')
@section('title','Admin | Contact Lists')




@section('name','Contact Lists')
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
                  <th>Email</th>
                  <th>Massege</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $cat)

                    

                    
                <tr>
                  <td>{{$cat->id}}</td>
                  <td>{{$cat->name}}</td>
                  <td>{{$cat->email}}</td>
                  <td>
                  	<input type="text" name="desc" class="form-control" value="{{$cat->msg}}">

                  </td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-id="{{$cat->id}}"data-name="{{$cat->name}}">
                        <i class="fas fa-trash"></i></a>
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>


               @foreach($contacts as $contact)

<div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Contact</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deletecontact/{{$contact->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete This Contact??</p>
                  <input type="hidden" name="id" id="id">

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

  $('#modal-danger').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var name = button.data('name') 
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(name)
})

$('.toastrDefaultDelete').click(function() {
      toastr.success('Contact Deleted')
    });
</script>

@endsection
