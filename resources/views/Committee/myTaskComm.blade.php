<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.CommView')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          @foreach ($eventListRoleComm as $eventTask)
          @if ($eventTask->role_name != "Program Director")
          <div class="card">
            
            <div class="card-header">
                <h3>{{$eventTask->event_name}} - {{$eventTask->role_name}}</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!--<div class="row">
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
              </div>-->
              <table id="TaskEventList" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Task</th>
                  <th>Status</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach ($eventTaskListComm as $task)
                <tr>
                  <td>{{$task->task_name}}</td>
                  <td>{{$task->task_status}}</td>
                  <td><a href="../roleViewTaskComm/{{$task->task_id}}"><button>View Task</button></a>
                    @if($task->task_status == 'On-going')
                     <form action="/taskCompleteComm/{{$task->task_id}}" method="POST">
                       @csrf
                      <button onClick="return complete()" type="submit">Task Complete</button>
                     </form>
                     <script>
                     function complete(){
                      return confirm("Are you sure?");
                      }
                    </script>
                     @endif
                     @if($eventTask->event_status != 'Complete')
                     <form action="/taskDeleteComm/{{$task->task_id}}" method="POST">
                       @csrf
                      <button onClick="return delete()" type="submit">Delete Task</button></td>
                     </form>  
                     <script>
                  
                      function delete(){
                          return confirm("Are you sure?");
                      }
    
                  </script>
                    @endif
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                
                <tr>
                  <th>Task</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
            
                </tfoot>
              </table>
              <br>
              @if ($eventTask->event_status != 'Complete')
              <a href="../addTaskComm/{{$eventTask->role_id}}" ><button class="btn btn-primary">Add Tasks</button></a>
            @else
            <a href="../viewPMRoleComm/{{$eventTask->event_id}}" ><button class="btn btn-primary">Post Mortem</button></a>
          
              <a href="" id="addPM" data-toggle="modal" data-target="#add-post-mortem" data-id="{{$eventTask->event_id}}"><button class="btn btn-primary" >Add Post Mortem</button></a>
            @endif
            
            </div>
            <!-- /.card-body -->
         <!-- ADD POST MORTEM MODAL !-->
         <div class="modal fade" id="add-post-mortem">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Add Post-Mortem</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="myTaskComm2/{{$eventTask->role_id}}" method="POST">
                          @csrf
                          <label class="form-label" for="createPM">Issue</label>
                        <div class="input-group mb-3">
                          <textarea class="form-control" id="addPM" name="issue" placeholder="Issue"></textarea>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-align-justify"></span>
                            </div>
                          </div>
                        </div>
                        <label class="form-label" for="createPM">Solution</label>
                        <div class="input-group mb-3">
                          <textarea class="form-control" id="addPM" name="solution" placeholder="Solution"></textarea>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-align-justify"></span>
                            </div>
                          </div>
                        </div>
                        <label class="form-label" for="createPM">Suggestion</label>
                        <div class="input-group mb-3">
                          <textarea class="form-control" id="addPM" name="suggestion" placeholder="Suggestion"></textarea>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-align-justify"></span>
                            </div>
                          </div>
                        </div>    
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add Post-mortem</button>
                      </form>
                  </div>
              </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>





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
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

$(document).ready(function () {

$('body').on('click', '#addPM', function (event) {

    event.preventDefault();
    var id = $(this).data('event_id');
    $.get('color/' + id + '/edit', function (data) {
         $('#addPostMortemModal').html("myTaskComm");
         $('#submit').val("event_id");
         $('#practice_modal').modal('show');
         $('#event_id').val(data.data.id);
         $('#event_id').val(data.data.name);
     })
});

}); 
</script>
@endpush 