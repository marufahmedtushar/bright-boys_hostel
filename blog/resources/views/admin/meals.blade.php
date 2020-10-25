@extends('layouts.master')
@section('title','List of Meal')




@section('name','List of Meal')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info card-outline">
               <div class="card-header">
                <h3 class="card-title">
                  <i class=""></i>
                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addmeal"><i class="fas fa-plus-circle"></i> Add New Meal </button>
                </h3>
              </div>
              <div class="card-body">
                


                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Cover Image</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)

                    

                    
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>@if($item->categories_id == '1')
                    <span class="badge badge-warning ">{{$item->categories->name}}
                    </span>
                    @elseif($item->categories_id == '2')
                    <span class="badge badge-success ">{{$item->categories->name}}
                    </span>
                    @elseif($item->categories_id == '3')
                    <span class="badge badge-primary ">{{$item->categories->name}}
                    </span>
                    @endif
                  </td>
                   <td>
                          <a href="#"><img class="img img-thumbnail" src="/storage/cover_images/{{$item->cover_image}}" alt="Image placeholder"style="height: 100px;width: 120px;"></a>
                        </td>
                  <td><a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#showitems" data-id="{{$item->id}}"data-name="{{$item->name}}"data-desc="{{$item->desc}}"data-price="{{$item->price}}"data-cat_id="{{$item->categories->name}}">
                        <i class="fas fa-eye"></i></a>


                        <a class="btn btn-info btn-sm" href="/edititem/{{$item->id}}">
                        <i class="fas fa-pencil-alt"></i></a>

                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-danger" data-itemid="{{$item->id}}">
                        <i class="fas fa-trash"></i></a>

                        
                  </td>
                  
                </tr>
                @endforeach
                
                
                
                </tbody>
                
              </table>


            

            

              <div class="modal fade" id="addmeal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New  Meal </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/itemcreate" method="POST" 
        enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          

         

          <div class="form-group">
            <label >Name:</label>
            <input type="text" name="name"class="form-control" id="name" >
          </div>

          <div class="form-group">
    		<label >Description:</label>
    		<textarea class="form-control"  name="desc" rows="3"></textarea>
  		  </div>

          <div class="form-group">
            <label >Price:</label>
            <input type="number" name="price"class="form-control" id="price" >
          </div>

          <div class="form-group">
            <label>Upload an image : </label>
            <input type="file" name="cover_image" style="border:3px solid #CDCCE7;border-radius:10px;padding:5px;">

          </div>

          <div class="form-group">
                        <label>Category :</label>
                        <select class="custom-select" name="categories_id"class="form-control"   required>

                        	@foreach($categories as $cat)

                          <option value="{{$cat->id}}">{{$cat->name}}</option>

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


  <div class="modal fade" id="showitems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Meal Details</h5>
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
            <label >Name:</label>
            <input type="text" name="name"class="form-control" id="name" >
          </div>

          <div class="form-group">
        <label >Description:</label>
        <textarea class="form-control"  name="desc" id="desc" rows="3"></textarea>
        </div>

          <div class="form-group">
            <label >Price:</label>
            <input type="number" name="price" class="form-control" id="price" >
          </div>

          

          <div class="form-group">
                        <label>Category :</label>
                         <input type="text"  class="form-control" id="cat_id" >
                      </div>

                      

          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrDefaultSuccess">Submit</button>
      
        </form>
      </div>



      
          </div>
      </div>
  </div>




@foreach($items as $item)

<div class="modal  fade" id="modal-danger">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deleteitem/{{$item->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete Item  ??</p>
                  <input type="hidden" name="item_id" id="item_id">
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

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-success card-outline">
               <div class="card-header">
                <h3 class="card-title">
                  <i class=""></i>
                 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addmenuschedule"><i class="fas fa-plus-circle"></i> Add New Meal Schedule</button>
                </h3>
              </div>
              <div class="card-body">
                


                <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Day</th>
                  <th>Breakfast Menu</th>
                  <th>Lunch Menu</th>
                  <th>Dinner Menu</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
               

                    @foreach($menus  as  $menu)

                    
                <tr>
                  <td>{{$menu->id}}</td>
                  <td><a class="btn btn-danger btn-sm" href="#">{{$menu->day}}</a></td>
                  <td>

                    @foreach( explode(",",$menu->breakfast_menu) as $row)

                    <span class="badge badge-warning">{{$row}}</span>

                    @endforeach


                  </td>
                  <td>

                     @foreach( explode(",",$menu->lunch_menu) as $row)

                    <span class="badge badge-success">{{$row}}</span>

                    @endforeach


                  </td>

                  <td>

                     @foreach( explode(",",$menu->dinner_menu) as $row)

                    <span class="badge badge-primary">{{$row}}</span>

                    @endforeach


                  </td>
                  <td><p><a class="btn btn-info btn-sm" href="/editmenu/{{$menu->id}}">
                        <i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" data-menuid="{{$menu->id}}">
                        <i class="fas fa-trash"></i></a></p>
                  </td>
                  
                </tr>
         
                
                @endforeach
                
                </tbody>
                
              </table>



               <div class="modal fade" id="addmenuschedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New  Meal Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/menucreate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          

         

          <div class="form-group">
                        <label>Day:</label>
                        <select class="custom-select" name="day"class="form-control" id="day">
                          <option value="Sunday">Sunday</option>
                          <option value="Monday">Monday</option>
                          <option value="Tuesday">Tuesday</option>
                          <option value="Wednesday">Wednesday</option>
                          <option value="Thursday">Thursday</option>
                          <option value="Friday">Friday</option>
                          <option value="Saturday">Saturday</option>
                        </select>
                      </div>


          <div class="form-group">
            <label>Breakfast:</label><br>

              @foreach($items as $item)
                    @if($item->categories_id == '1')


                      <div class="icheck-primary d-inline">

                        <input type="checkbox" name="breakfast_menu[]" id="checkboxPrimary{{$item->id}}" value="{{$item->name}}">
                        <label for="checkboxPrimary{{$item->id}}">{{$item->name}}</label>
                      </div>

                      @endif
                      @endforeach
                              
          </div>

          <div class="form-group">
            <label>Lunch:</label><br>

              @foreach($items as $item)
                    @if($item->categories_id == '2')


                      <div class="icheck-primary d-inline">

                        <input type="checkbox" name="lunch_menu[]" id="checkboxPrimary{{$item->id}}" value="{{$item->name}}">
                        <label for="checkboxPrimary{{$item->id}}">{{$item->name}}</label>
                      </div>

                      @endif
                      @endforeach
                              
          </div>

          <div class="form-group">
            <label>Dinner:</label><br>

              @foreach($items as $item)
                    @if($item->categories_id == '3')


                      <div class="icheck-primary d-inline">

                        <input type="checkbox" name="dinner_menu[]" id="checkboxPrimary{{$item->id}}" value="{{$item->name}}">
                        <label for="checkboxPrimary{{$item->id}}">{{$item->name}}</label>
                      </div>

                      @endif
                      @endforeach
                              
          </div>

          

          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary toastrDefaultSuccess">Submit</button>
      
        </form>
      </div>

      



      
          </div>
      </div>
  </div>

  @foreach($menus as $menu)

<div class="modal  fade" id="modal">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Menu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deletemenu/{{$menu->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete Menu Schedule??</p>
                  <input type="hidden" name="menu_id" id="menu_id">
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button class="btn btn-danger btn-sm toastrMenuDelete">Delete </button>
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
$(function () {
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  $('#modal-danger').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var item_id = button.data('itemid') 
  var modal = $(this)
  modal.find('.modal-body #item_id').val(item_id)
})

  $('#modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var menu_id = button.data('menuid') 
  var modal = $(this)
  modal.find('.modal-body #menu_id').val(menu_id)
})

  $('.toastrDefaultDelete').click(function() {
      toastr.success('Meal Deleted')
    });

  $('.toastrDefaultSuccess').click(function() {
      toastr.success('Menu Created')
    });

  $('.toastrMenuDelete').click(function() {
      toastr.success('Menu Deleted')
    });

  $('#showitems').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var name = button.data('name') 
  var desc = button.data('desc') 
  var price = button.data('price') 
  var cat_id = button.data('cat_id') 


  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #desc').val(desc)
  modal.find('.modal-body #price').val(price)
  modal.find('.modal-body #cat_id').val(cat_id)


})
</script>
@endsection