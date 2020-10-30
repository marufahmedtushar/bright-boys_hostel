@extends('layouts.master')
@section('title','Admin | Rating Lists')




@section('name','Rating Lists')
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
                  <th>Title</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($ratings as $rating)

                    

                    
                <tr>
                  <td>{{$rating->id}}</td>
                  <td>{{$rating->comment}}</td>
                  <td>

                  	<a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#showrating" data-id="{{$rating->id}}"data-user="{{$rating->user->name}}" data-comment="{{$rating->comment}}" data-rating="{{$rating->rating}}">
                        <i class="fas fa-eye"></i></a>


                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-id="{{$rating->id}}"data-name="{{$rating->comment}}">
                        <i class="fas fa-trash"></i></a>
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>


               @foreach($ratings as $rating)

<div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Contact</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deleterating/{{$rating->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete This Rating??</p>
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


       <div class="modal fade" id="showrating" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Rating Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-group">
            <label >Id:</label>
            <input type="text" class="form-control" id="id" >
          </div>

          <div class="form-group">
            <label >User Name:</label>
            <input type="text" class="form-control" id="user" >
          </div>

          <div class="form-group">
            <label >Comment:</label>
            <input type="text" class="form-control" id="comment" >
          </div>

          <div class="form-group">
            <label >Rating:</label>
            <input type="text"  class="form-control" id="rating" >
          </div>            

          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      
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
<script type="text/javascript">

 $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  $('#showrating').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var user = button.data('user') 
  var comment = button.data('comment') 
  var rating = button.data('rating') 
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #user').val(user)
  modal.find('.modal-body #comment').val(comment)
  modal.find('.modal-body #rating').val(rating)
})


  $('#modal-danger').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var name = button.data('name') 
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(name)
})

$('.toastrDefaultDelete').click(function() {
      toastr.success('Rating Deleted')
    });

</script>
@endsection