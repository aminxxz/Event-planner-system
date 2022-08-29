<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.CommView')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>List of Events</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                  <div class="col-md-5 offset-md-0">
                    
                          <div class="input-group">
                              <input type="search" class="form-control form-control-lg" placeholder="Search Events">
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-lg btn-default">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>
                     
                  </div>
              </div>
              <table id="eventListPD" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Events</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($eventListPDComm as $events)
                  @if ($events->role_name == "Program Director")
                <tr>
                  <td>{{$events->event_name}}</td>
                  <td>{{$events->event_status}}</td>
                  <td>
                    @if($events->event_status == 'On-going')
                    <a href="../createRolesComm/{{$events->event_id}}"><button>Assign roles in event</button></a>
                    @endif
                    <a href="../listRoleAssignedComm/{{$events->event_id}}"><button>View Assignee</button></a>
                    <a href="../viewTaskPDComm/{{$events->event_id}}"><button>View Task</button></a>
                    <a href="../eventDetailsPDC/{{$events->event_id}}"><button>View Event</button></a>
                    @if ($events->event_status == 'On-going')
                    <form action="/completeEventComm/{{$events->event_id}}" method="POST">
                      @csrf
                     <button onClick="return complete()" type="submit">Event Complete</button>
                    </form>
                    <script>
                      function complete(){
                          return confirm("Are you sure?");
                      }
                  </script>
                  @endif 
                    @if ($events->event_status == 'Complete')
                      <a href="../viewPMPDComm/{{$events->event_id}}"><button> View Post-mortems</button></a>
                  @endif </td>
                </tr>
                @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Events</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <!--<h3 class="card-title">DataTable with default features</h3>-->
            </div>
            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

@endsection