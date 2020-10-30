@extends('layouts.master')
@section('title','Admin | Categories of Meal')




@section('name','Categories of Meal')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info card-outline">
               <div class="card-header ">
                <h3 class="card-title">
                  <i class=""></i>
                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addcat"><i class="fas fa-plus-circle"></i> Add Categories of Meal </button>
                </h3>
              </div>
              <div class="card-body">
                


                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $cat)

                    

                    
                <tr>
                  <td>{{$cat->id}}</td>
                  <td>{{$cat->name}}</td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#catedit"  data-id="{{$cat->id}}"data-name="{{$cat->name}}"><i class="fas fa-pencil-alt"></i></button>

                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-id="{{$cat->id}}" data-name="{{$cat->name}}">
                        <i class="fas fa-trash"></i></a>

                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>


            

            

              <div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">New Categories of Meal </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/categoriescreate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          

         

          <div class="form-group">
            <label >Category Name:</label>
            <input type="text" name="name"class="form-control" id="name" >
          </div>

          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrDefaultSuccess">Submit</button>
      
        </form>
      </div>



      
          </div>
      </div>
  </div>


  <div class="modal fade" id="catedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category of Meal </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/catupdate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          

         <div class="form-group">
            <input type="hidden" name="id" class="form-control" id="id" >
          </div>

          <div class="form-group">
            <label >Edit Category Name:</label>
            <input type="text" name="name"class="form-control" id="name" >
          </div>

          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrEditSuccess">Submit</button>
      
        </form>
      </div>



      
          </div>
      </div>
  </div>



@foreach($categories as $cat)

<div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deletecat/{{$cat->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete This Category Named</p>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });


  $('.toastrDefaultSuccess').click(function() {
      toastr.success('New category created')
    });

 $('.toastrEditSuccess').click(function() {
      toastr.success('Category edited')
    });

  $('.toastrDefaultDelete').click(function() {
      toastr.success('Category deleted')
    });


  $('#catedit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var name = button.data('name') 
 

  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(name)

})


  $('#modal-danger').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var name = button.data('name') 
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(name)
})

  </script>
@endsection
