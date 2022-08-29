<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.Presview')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Create event</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{route('add-event')}}" method="POST">
                @csrf
                <label class="form-label" for="createEvent">Event Name</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="event_name" placeholder="Event Name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-briefcase"></span>
                    </div>
                  </div>
                </div>
                <label class="form-label" for="createEvent">Overview</label>
                <div class="input-group mb-3">
                  
                  <textarea class="form-control" id="addEvent" name="event_overview" placeholder="Overview"></textarea>
                 
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-align-justify"></span>
                    </div>
                  </div>
                </div>
                <label class="form-label" for="createEvent">Event Start Date</label>
                <div class="input-group mb-3">
                  <input type="date" class="form-control" name="event_start_date" placeholder="Event Start Date">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar-plus"></span>
                    </div>
                  </div>
                </div>
                <label class="form-label" for="createEvent">Event End Date</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="event_end_date" placeholder="Event End Date">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-calendar-plus"></span>
                      </div>
                    </div>
                  </div>
                <label class="form-label" for="createEvent">Event Start Time</label>
                <div class="input-group mb-3">
                  <input type="time" class="form-control" name="event_start_time" placeholder="Event Start Time">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-clock"></span>
                    </div>
                  </div>
                </div>
                <label class="form-label" for="createEvent">Event End Time</label>
                <div class="input-group mb-3">
                    <input type="time" class="form-control" name="event_end_time" placeholder="Event End Time">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-clock"></span>
                      </div>
                    </div>
                  </div>
                  <label class="form-label" for="createEvent">Event Location</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="event_location" placeholder="Location">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-map-marker-alt"></span>
                    </div>
                  </div>
                </div>
                  <label class="form-label" for="createEvent">Event Guest</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="event_guest" placeholder="Event Guest">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user-tie"></span>
                      </div>
                    </div>
                  </div>
                  <label class="form-label" for="assignPD">Program Director</label>
                    <div class="input-group mb-3">
                        
                        <input type="hidden" class="form-control" name="role_name" value="Program Director">
                        <br>
                        <select name="stud_id" id="stud_id" class="form-control">
                          @foreach ($committee as $committees)
                            <option value="{{$committees->stud_id}}">{{$committees->name}}</option>
                            @endforeach
                        </select>
                          <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                          </div>
                        </div>
                  <input type="hidden" class="form-control" name="event_status" value="On-going">
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Create event</button>
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

    <script>
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
    </script>

  </section>

@endsection