@extends('layouts.master')
@section('title','Contact Lists')




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
                  <td></td>
                  
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



 
<script type="text/javascript">
   

  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

@endsection
