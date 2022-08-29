<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
        
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            
            <div class="card-header">
                <h4></h4>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="TaskEventList" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Roles</th>
                  <th>Issue</th>
                  <th>Solution</th>
                  <th>Suggestion</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($eventPM as $pm)
                    @if ($pm->role_name != "Program Director")
                <tr>
                  <td>{{$pm->role_name}}</td>
                  <td>{{$pm->issue}}</td>
                  <td>{{$pm->solution}}</td>
                  <td>{{$pm->suggestion}}</td>
                </tr>
                @endif
                @endforeach
                </tbody>
                <tfoot>
                
                <tr>
                    <th>Roles</th>
                    <th>Issue</th>
                    <th>Solution</th>
                    <th>Suggestion</th>
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