<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
        
      <div class="row">
        <div class="col-12">
          @foreach ($eventRoles as $eventRole)
          @if ($eventRole->role_name != "Program Director")
          <div class="card">
            
            <div class="card-header">
                <h4>{{$eventRole->role_name}} - {{$eventRole->event_name}}</h4>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="TaskEventList" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Task</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                  <td>{{$eventRole->task_name}}</td>
                  <td>{{$eventRole->task_status}}</td>
                </tr>
                
                </tbody>
                <tfoot>
                
                <tr>
                  <th>Task</th>
                  <th>Status</th>
                </tr>
            
                </tfoot>
              </table>
              <br>
              
            </div>
            <!-- /.card-body -->
          
          </div>
          @endif
          @endforeach
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