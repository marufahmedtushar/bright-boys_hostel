@extends('layouts.master')
@section('title','Edit Menu Schedule')




@section('name','Edit Menu Schedule')

@section('content')


<section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
           
                


         <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Menu Schedule Details</h3>
              </div>
              <div class="card-body">
                <form action="/updatemenu/{{$menus->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Id:</label>
                    <input type="text" class="form-control"  value="{{$menus->id}}">
                  </div>

                  <div class="form-group">
                    <label>Breakfast:</label>
                    @foreach( explode(",",$menus->breakfast_menu) as $row)

                    <span class="badge badge-warning">{{$row}}</span>

                    @endforeach
                    <br>

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
                    <label>Lunch:</label>
                    @foreach( explode(",",$menus->lunch_menu) as $row)

                    <span class="badge badge-success">{{$row}}</span>

                    @endforeach
                    <br>

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
                    <label>Dinner:</label>
                    @foreach( explode(",",$menus->dinner_menu) as $row)

                    <span class="badge badge-primary">{{$row}}</span>

                    @endforeach
                    <br>

                    @foreach($items as $item)

                     @if($item->categories_id == '3')


                      <div class="icheck-primary d-inline">



                        <input type="checkbox" name="dinner_menu[]" id="checkboxPrimary{{$item->id}}" value="{{$item->name}}">
                        <label for="checkboxPrimary{{$item->id}}">{{$item->name}}</label>
                      </div>

                      @endif

                      @endforeach
                  </div>

                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary toastrDefaultSuccess">Submit</button>

                  <a class="btn btn-secondary" href="/item">Back</a>
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
      toastr.success('Menu Updated')
    });
</script>
@endsection
