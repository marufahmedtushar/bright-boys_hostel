@extends('layouts.master')
@section('title','Admin | Edit Meal')




@section('name','Edit Meal')
@section('content')





<section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
           
                


         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Meal Details</h3>
              </div>
              <div class="card-body">
                <form action="/updateitem/{{$items->id}}" method="POST"
                  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                <div class="card-body">

                  <img class="img img-thumbnail" src="/storage/cover_images/{{$items->cover_image}}" alt="Image placeholder"style="height: 100px;width: 120px;">


                  <div class="form-group">
                    <label>Id:</label>
                    <input type="text" class="form-control"  value="{{$items->id}}">
                  </div>

                  <div class="form-group">
                    <label>Edit Meal Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$items->name}}">
                  </div>

                  <div class="form-group">
                    <label>Edit Description:</label>
                    <input type="text" name="desc" class="form-control" value="{{$items->desc}}">
                  </div>

                  <div class="form-group">
                    <label>Edit Price:</label>
                    <input type="text" name="price" class="form-control" value="{{$items->price}}">
                  </div>

                  <div class="form-group">
                    <label>Edit Image:</label>
                    <input type="file" name="cover_image" style="border:3px solid #CDCCE7;border-radius:10px;padding:5px;">
                  </div>

                  <div class="form-group">
                        <label>Category :</label>
                        <select class="custom-select" name="categories_id"class="form-control">

                          <option selected>{{$items->categories->name}}</option>

                          @foreach($categories as $cat)

                          <option value="{{$cat->id}}">{{$cat->name}}</option>

                          @endforeach
                         
                        </select>
                      </div>

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary toastrDefaultSuccess">Submit</button>
                </div>
              </form>
                <!-- /input-group -->
              </div>
              <!-- /.card-body -->
            </div>

           
              

 
              
              </div>
            </div>
          </div>
    </section>

@endsection

@section('js')
<script>
 $('.toastrDefaultSuccess').click(function() {
      toastr.success('Meal Details  updated')
    });
</script>

@endsection