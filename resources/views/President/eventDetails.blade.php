<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 

@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Event Details</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <div class="row">
                  <div class="col-md-4 offset-md-1">
                      <h5><b>Event Name:</b></h5>    
                  </div>
                  <div class="col-md-5 offset-md-0">
                    <div class="input-group mb-3">
                    {{$eventDetailsPres->event_name}}
                    </div> 
                  </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-1">
                    <h5><b>Overview:</b></h5>    
                </div>
                <div class="col-md-5 offset-md-0">
                  <div class="input-group mb-3">
                    {{$eventDetailsPres->event_overview}}
                  </div> 
                </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5><b>Event Status:</b></h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  {{$eventDetailsPres->event_status}}
                </div> 
              </div>
          </div>
            <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5><b>Event Start Date:</b></h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  {{$eventDetailsPres->event_start_date}}
                </div> 
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5><b>Event End Date:</b></h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                {{$eventDetailsPres->event_end_date}}
              </div> 
            </div>
        </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5><b>Event Start Time:</b></h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                {{$eventDetailsPres->event_start_time}}
              </div> 
            </div>
        </div>
        <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5><b>Event End Time:</b></h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                 {{$eventDetailsPres->event_end_time}}
                </div> 
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5><b>Event Guest:</b></h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                {{$eventDetailsPres->event_guest}}
              </div> 
            </div>
        </div>
        <div class="row">
          <div class="col-md-4 offset-md-1">
              <h5><b>Event Location:</b></h5>    
          </div>
          <div class="col-md-5 offset-md-0">
            <div class="input-group mb-3">
              {{$eventDetailsPres->event_location}}
            </div> 
          </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-1">
            <h5><b>Program Director:</b></h5>    
        </div>
        <div class="col-md-5 offset-md-0">
          <div class="input-group mb-3">
            {{$eventDetailsPres->name}}
          </div> 
        </div>
    </div>      
    <div class="row">
      <div class="col-md-10 offset-md-9">
        
    <a href="../viewTaskPres/{{$eventDetailsPres->event_id}}"><button class="btn btn-primary" >View task</button></a>
    @if ($eventDetailsPres->event_status == 'Complete')
    <a href="../viewPMPres/{{$eventDetailsPres->event_id}}"><button class="btn btn-primary" >View post-mortem</button></a>
    @endif
      </div> 
    </div> 
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

@endsection