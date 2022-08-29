<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
        
      <div class="row">
        <div class="col-12">
         
          <div class="card">
            @foreach($eventPM as $pm)
            @if ($pm->role_name != 'Program Director')
            <div class="card-header">
                <h4>{{$pm->role_name}} - {{$pm->event_name}}</h4>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="TaskEventList" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Issue</th>
                  <th>Solution</th>
                  <th>Suggestion</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                  <td>{{$pm->issue}}</td>
                  <td>{{$pm->solution}}</td>
                  <td>{{$pm->suggestion}}</td>
                </tr>
                
                </tbody>
                <tfoot>
                
                <tr>
                  <th>Issue</th>
                  <th>Solution</th>
                  <th>Suggestion</th>
                </tr>
            
                </tfoot>
              </table>
              <br>
              
            </div>
            <!-- /.card-body -->
            @endif
            @endforeach
            <div class="row">
              <div class="col-md-10 offset-md-9">
            <a href="/generatePMPres/{{$eventID}}"><button class="btn btn-primary">Generate Post-mortem</button></a>
            <br><br>
              </div>
            </div>
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