<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
<!--<input type="hidden" class="form-control" name="event_id" value=""> -->
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
            <h2>{{$eventID}}</h2>
            <div class="card-body">
              <form action="{{route('assign-PD')}}" method="POST">
                @csrf
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
                        <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">Assign</button>
                        </div>
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