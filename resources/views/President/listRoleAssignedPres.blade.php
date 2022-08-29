<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
        
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            
            <div class="card-header">
                <h4>{{$event->event_name}}</h4>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h4>Roles assigned</h4>
              <table id="TaskEventList" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Roles</th>
                  <th>Committees</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($assignee as $role)
                <tr>
                  <td>{{$role->role_name}}</td>
                  <td>{{$role->name}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Roles</th>  
                  <th>Committees</th>
                </tr>
                </tfoot>
              </table>
              <br>
              
            </div>
            <!-- /.card-body -->
          
          </div>
         
          <!-- /.card -->

          
          <!-- /.card -->
        </div>
        
        <!-- /.col -->
      </div>
      
      <!-- /.row -->

      <!-- /.row -->


    </div>
    <!-- /.container-fluid -->
  </section>

@endsection