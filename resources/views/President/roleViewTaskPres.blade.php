<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 

@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Task Details for {{$roleViewTask->event_name}}</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <div class="row">
                  <div class="col-md-4 offset-md-1">
                      <h5>Task Name:</h5>    
                  </div>
                  <div class="col-md-5 offset-md-0">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="task_name" value="{{$roleViewTask->task_name}}"  readonly>
                    </div> 
                  </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-1">
                    <h5>Task Description:</h5>    
                </div>
                <div class="col-md-5 offset-md-0">
                  <div class="input-group mb-3">
                    <textarea type="text" class="form-control" name="task_description" readonly>{{$roleViewTask->task_description}}</textarea>
                  </div> 
                </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5>Task Status:</h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="task_status" value="{{$roleViewTask->task_status}}"  readonly>
                </div> 
              </div>
          </div>
            <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5>Due Date:</h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="due_date" value="{{$roleViewTask->due_date}}" readonly>
                </div> 
              </div>
          </div>     
    <div class="row">
      <div class="col-md-10 offset-md-9">
        <button class="btn btn-primary" data-toggle="modal" data-target="#update-task-modal">Update Task</button>
    <!--<button class="btn btn-primary" >View task</button>-->
      </div> 
    </div> 
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
          <!-- /.card -->
        
          <!-- TASK UPDATE MODAL !-->
          <div class="modal fade" id="update-task-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Task</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../roleViewTaskPres/{{$roleViewTask->task_id}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 offset-md-1">
                                    <h5>Task Name:</h5>    
                                </div>
                                <div class="col-md-5 offset-md-0">
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="task_name" value="{{$roleViewTask->task_name}}" >
                                  </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 offset-md-1">
                                    <h5>Description:</h5>    
                                </div>
                                <div class="col-md-5 offset-md-0">
                                  <div class="input-group mb-3">
                                    <textarea type="text" class="form-control" name="task_description">{{$roleViewTask->task_description}}</textarea>
                                  </div> 
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 offset-md-1">
                                  <h5>Due Date:</h5>    
                              </div>
                              <div class="col-md-5 offset-md-0">
                                <div class="input-group mb-3">
                                  <input type="date" class="form-control" name="due_date" value="{{$roleViewTask->due_date}}">
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