<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 

@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            @foreach($event as $events)
          <div class="card">
            <div class="card-header">
                <h3>{{$events->event_name}}</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <!--<div class="row">
                  <div class="col-md-4 offset-md-1">
                      <h5>Event Name:</h5>    
                  </div>
                  <div class="col-md-5 offset-md-0">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="event_name" value=""  readonly>
                    </div> 
                  </div>
              </div>-->
              <div class="row">
                <div class="col-md-4 offset-md-1">
                    <h5>Overview:</h5>    
                </div>
                <div class="col-md-5 offset-md-0">
                  <div class="input-group mb-3">
                    <textarea type="text" class="form-control" name="event_overview"   readonly>{{$events->event_overview}}</textarea>
                  </div> 
                </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5>Event Start Date:</h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="event_start_date" value="{{$events->event_start_date}}" readonly>
                </div> 
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5>Event End Date:</h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="event_end_date" value="{{$events->event_end_date}}" readonly>
              </div> 
            </div>
        </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5>Event Start Time:</h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="event_start_time" value="{{$events->event_start_time}}"  readonly>
              </div> 
            </div>
        </div>
        <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5>Event End Time:</h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="event_end_time" value="{{$events->event_end_time}}"  readonly>
                </div> 
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5>Event Guest:</h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="event_guest" value="{{$events->event_guest}}"  readonly>
              </div> 
            </div>
        </div>
        <div class="row">
          <div class="col-md-4 offset-md-1">
              <h5>Event Location:</h5>    
          </div>
          <div class="col-md-5 offset-md-0">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="event_location" value="{{$events->event_location}}"  readonly>
            </div> 
          </div>
      </div>
      <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5>Event Status:</h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="event_guest" value="{{$events->event_guest}}"  readonly>
              </div> 
            </div>
        </div>
      <div class="row">
        <div class="col-md-4 offset-md-1">
            <h5>Program Director:</h5>    
        </div>
        <div class="col-md-5 offset-md-0">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" value="{{$events->name}}"  readonly>
          </div> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
         <a href="" ><button class="btn btn-primary" >Assign Roles to Committees</button></a>
            <a href="" ><button class="btn btn-primary" >Update Event</button></a>
        </div>
    </div> 
         
    <!--<div class="row">
      <div class="col-md-10 offset-md-9">
        <button class="btn btn-primary" >Update event</button>
    <button class="btn btn-primary" >View task</button>
      </div> 
    </div>--> 
            </div>
            <!-- /.card-body -->
          </div>
          @endforeach
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