<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.Presview')
<style>
  .entry:not(:first-of-type)
  {
      margin-top: 10px;
  }
  
  .glyphicon
  {
      font-size: 12px;
  }
  </style>
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Create roles in event</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!--<form action="" method="POST" >-->
                
                <!--<label class="form-label" for="assign">Enter Role:</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="role_name" placeholder="Event Name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-briefcase"></span>
                    </div>
                  </div>
                </div>-->
                  
                  <!-- /.col -->
                  <div class="control-group" id="fields">
                    <label class="control-label" for="field1">Enter Role:</label>
                    <div class="controls"> 
                        <form role="form" autocomplete="off" action="" method="POST">
                          @csrf
                            <div class="entry input-group col-xs-3">
                                <input class="form-control" name="role_name[]" type="text" placeholder="Role name" />
                              <span class="input-group-btn">
                                    <button class="btn btn-success btn-add" type="button">
                                        <span class="glyphicon glyphicon-plus "></span>
                                    </button>
                                </span>
                            </div>
                                      
                        
                    <br>
                    <!--<small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>-->
                    </div>
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Create roles</button>
                </div> 
              </form> 
                </div>
              
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