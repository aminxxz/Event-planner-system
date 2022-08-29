<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.CommView')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Add Post Mortem</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="/viewPMRoleComm/{{$roleID}}" method="POST">
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
              
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Add Post Mortem</button>
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