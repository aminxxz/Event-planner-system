<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.PDview')

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
              <!--<div class="addRow" id="addRow">
              <form action="" method="POST" id="addRow">
                
                <label class="form-label" for="createEvent">Add bureau</label>
                <div class="input-group mb-3">
                
                <br>
                <select name="bureau_id[]" id="bureau_id" class="form-control">
                    
                    <option value="">}</option>
                   
                </select>
                  <div class="input-group-append">
                  </div>
                </div>
                <label class="form-label" for="createEvent">Assignee</label>
                <div class="input-group mb-3">
                    
                    <br>
                    <select name="stud_id[]" id="stud_id" class="form-control">
                        
                        <option value="}"></option>
                       
                    </select>
                      <div class="input-group-append">
                      </div>
                    </div>
                  
                  <div class="col-2">
                    <button type="button" onclick='addRow;' class="add btn btn-info btn-block">Add Bureau</button>
                  </div>

                  <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block">Create event</button>
                  </div>
                  <!-- /.col -->
                <!--</div> -->
              <!--</form>-->
            <!--</div>-->
            

              
                      <div class="control-group" id="fields">
                          <label class="control-label" for="field1"></label>
                          <div class="controls"> 
                              <form method="POST" action="{{route('add-bureau')}}" role="form" autocomplete="off">
                                @csrf 
                                  <div class="entry input-group col-xs-3">
                                      
                                    <div class="input-group mb-3">
                                          <label class="form-label" for="createEvent">Add bureau</label>
                                          <div class="input-group mb-3">
                                          
                                          <br>
                                          <select name="bureau_id[]" id="bureau_id" class="form-control">
                                            @foreach ($bureau as $bureaus)
                                              <option value="{{$bureaus->bureau_id}}">{{$bureaus->bureau_name}}</option>
                                              @endforeach
                                          </select>
                                            <div class="input-group-append">
                                            </div>
                                          </div>
                                    <div class="input-group mb-3">
                                          <label class="form-label" for="createEvent">Assignee</label>
                                          <div class="input-group mb-3">
                                              
                                              <br>
                                              <select name="stud_id[]" id="stud_id" class="form-control">
                                                @foreach ($committee as $committees)
                                                  <option value="{{$committees->stud_id}}">{{$committees->name}}</option>
                                                  @endforeach
                                              </select>
                                                <div class="input-group-append">
                                                </div>
                                              </div>
                                            </div>
                                    
                                    <button class="btn btn-success btn-add" type="button">
                                        Add bureau
                                     </button>
                                   
                                  </div>
                                 
                          <br>
                          
                          </div>
                           
                      </div>
                      <button class="btn btn-primary" type="submit">Confirm</button>
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
  </section>

<!--<script type="text/javascript">
    $(document).on('click','#addMore',function(){
    
    $('.table').show();

    var task_name = $("#task_name").val();
    var cost = $("#cost").val();
    var source = $("#document-template").html();
    var template = Handlebars.compile(source);

    var data = {
       task_name: task_name,
       cost: cost
    }

    var html = template(data);
    $("#addRow").append(html)
  
    total_ammount_price();
});

 $(document).on('click','.removeaddmore',function(event){
   $(this).closest('.delete_add_more_item').remove();
   total_ammount_price();
 });

 function total_ammount_price() {
   var sum = 0;
   $('.cost').each(function(){
     var value = $(this).val();
     if(value.length != 0)
     {
       sum += parseFloat(value);
     }
   });
   $('#estimated_ammount').val(sum);
 }
</script>-->
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
            .html('<span class="glyphicon glyphicon-minus">Remove Bureau</span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
</script>

@endsection