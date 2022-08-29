<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.Presview')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Add Task</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/myTaskPres/{{$roleID}}" method="POST">
                @csrf
                <label class="form-label" for="createTask">Task Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="task_name" placeholder="Task Name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-briefcase"></span>
                    </div>
                  </div>
                </div>
                <label class="form-label" for="createTask">Task Description</label>
                <div class="input-group mb-3">
                  
                  <textarea class="form-control" id="addTask" name="task_description" placeholder="Description"></textarea>
                 
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-align-justify"></span>
                    </div>
                  </div>
                </div>
                <label class="form-label" for="createTask">Task Due Date</label>
                <div class="input-group mb-3">
                  <input type="date" class="form-control" name="due_date" placeholder="Task Due Date">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar-plus"></span>
                    </div>
                  </div>
                </div>
                
                  <input type="hidden" class="form-control" name="task_status" value="On-going">
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Add Task</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
          
       
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <!--<script>
        $(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
    </script>-->

  </section>

@endsection