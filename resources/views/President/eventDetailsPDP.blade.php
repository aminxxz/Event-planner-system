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
                      <h5>Event Name:</h5>    
                  </div>
                  <div class="col-md-5 offset-md-0">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="event_name" value="{{$event->event_name}}"  readonly>
                    </div> 
                  </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-1">
                    <h5>Overview:</h5>    
                </div>
                <div class="col-md-5 offset-md-0">
                  <div class="input-group mb-3">
                    <textarea type="text" class="form-control" name="event_overview"   readonly>{{$event->event_overview}}</textarea>
                  </div> 
                </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5>Event Start Date:</h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="event_start_date" value="{{$event->event_start_date}}" readonly>
                </div> 
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5>Event End Date:</h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="event_end_date" value="{{$event->event_end_date}}" readonly>
              </div> 
            </div>
        </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5>Event Start Time:</h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="event_start_time" value="{{$event->event_start_time}}"  readonly>
              </div> 
            </div>
        </div>
        <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5>Event End Time:</h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="event_end_time" value="{{$event->event_end_time}}"  readonly>
                </div> 
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5>Event Guest:</h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="event_guest" value="{{$event->event_guest}}"  readonly>
              </div> 
            </div>
        </div>
        <div class="row">
          <div class="col-md-4 offset-md-1">
              <h5>Event Location:</h5>    
          </div>
          <div class="col-md-5 offset-md-0">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="event_location" value="{{$event->event_location}}"  readonly>
            </div> 
          </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-1">
            <h5>Program Director:</h5>    
        </div>
        <div class="col-md-5 offset-md-0">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" value="{{$event->name}}"  readonly>
          </div> 
        </div>
    </div>      
    <div class="row">
      <div class="col-md-10 offset-md-9">
        <button class="btn btn-primary" data-toggle="modal" data-target="#update-event-modal">Update Event</button>
    <!--<button class="btn btn-primary" >View task</button>-->
      </div> 
    </div> 
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
          <!-- /.card -->
        
          <!-- EVENT UPDATE MODAL !-->
          <div class="modal fade" id="update-event-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Event</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../eventDetailsPDP/{{$event->event_id}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 offset-md-1">
                                    <h5>Event Name:</h5>    
                                </div>
                                <div class="col-md-5 offset-md-0">
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="event_name" value="{{$event->event_name}}" >
                                  </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 offset-md-1">
                                    <h5>Overview:</h5>    
                                </div>
                                <div class="col-md-5 offset-md-0">
                                  <div class="input-group mb-3">
                                    <textarea type="text" class="form-control" name="event_overview"   >{{$event->event_overview}}</textarea>
                                  </div> 
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 offset-md-1">
                                  <h5>Event Start Date:</h5>    
                              </div>
                              <div class="col-md-5 offset-md-0">
                                <div class="input-group mb-3">
                                  <input type="date" class="form-control" name="event_start_date" value="{{$event->event_start_date}}" >
                                </div> 
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 offset-md-1">
                                <h5>Event End Date:</h5>    
                            </div>
                            <div class="col-md-5 offset-md-0">
                              <div class="input-group mb-3">
                                <input type="date" class="form-control" name="event_end_date" value="{{$event->event_end_date}}">
                              </div> 
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-md-4 offset-md-1">
                                <h5>Event Start Time:</h5>    
                            </div>
                            <div class="col-md-5 offset-md-0">
                              <div class="input-group mb-3">
                                <input type="time" class="form-control" name="event_start_time" value="{{$event->event_start_time}}">
                              </div> 
                            </div>
                        </div>
                        <div class="row">
                              <div class="col-md-4 offset-md-1">
                                  <h5>Event End Time:</h5>    
                              </div>
                              <div class="col-md-5 offset-md-0">
                                <div class="input-group mb-3">
                                  <input type="time" class="form-control" name="event_end_time" value="{{$event->event_end_time}}">
                                </div> 
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 offset-md-1">
                                <h5>Event Guest:</h5>    
                            </div>
                            <div class="col-md-5 offset-md-0">
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" name="event_guest" value="{{$event->event_guest}}">
                              </div> 
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 offset-md-1">
                              <h5>Event Location:</h5>    
                          </div>
                          <div class="col-md-5 offset-md-0">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="event_location" value="{{$event->event_location}}">
                            </div> 
                          </div>
                      </div>
                             
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
        
        
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

@endsection