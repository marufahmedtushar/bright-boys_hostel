@extends('layouts.master')
@section('title','Categories of Meal')




@section('name','Categories of Meal')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info card-outline">
               <div class="card-header">
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
                  <td></td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>


            

            

              <div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
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
