<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
    
@extends('layouts.Master.Commview')
<style>
 .form-container{
  padding:10px;
  padding-bottom:25px;
  margin:0 auto;
  margin-top:20px;
  width:50%;
  border-radius:20px;
  background-color: #ececec;
}

.add-one{
  color:green;
  text-align:center;
  font-weigth:bolder;
  cursor:pointer;
  margin-top:10px;
}

.delete{
  color:white;
  background-color:rgb(231, 76, 60);
  text-align:center;
  margin-top:6px;
  font-weight:700;
  border-radius:5px;
  min-width:20px;
  cursor:pointer;
}

#singlebutton{
  width:100%;
  margin-top:20px;
}

.title{
  text-align:center;
  font-size:40px;
  margin-bottom:40px;
}

.dynamic-element{
  margin-bottom:0px;
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
                  <!--<div class="control-group" id="fields">
                    <label class="control-label" for="field1">Enter Role:</label>
                    <div class="controls"> 
                        <form role="form" autocomplete="off" action="../assignRolesPDPres/" method="POST">
                          csrf
                            <div class="entry input-group col-xs-3">
                                <input class="form-control" name="role_name[]" type="text" placeholder="Role name" />
                              <span class="input-group-btn">
                                    <button class="btn btn-success btn-add" type="button">
                                        <span class="glyphicon glyphicon-plus "></span>
                                    </button>
                                </span>
                            </div>
                                      
                        
                    <br>
                    small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>
                    </div>
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Create roles</button>
                </div> 
              </form>--> 
              <!-- HIDDEN DYNAMIC ELEMENT TO CLONE -->
              <!-- you can replace it with any other elements -->
              <div class="form-group dynamic-element" style="display:none">
                <div class="row">
                <div class="col-md-2"></div>
                  
                <!-- Replace these fields -->
                <div class="col-md-4">
                  <label class="form-label" for="role_name">Enter Role:</label>
                  <input type="text" id="role_name" name="role_name[]" class="form-control">
                    
                  
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="assignee">Assignee:</label>
                  <select name="stud_id[]" id="stud_id" class="form-control">
                    @foreach ($committee as $committees)
                      <option value="{{$committees->stud_id}}">{{$committees->name}}</option>
                      @endforeach
                  </select>
                </div>
                  <!-- End of fields-->
                  <div class="col-md-1">
                    <br>
                    <p class="delete">x</p>
                  </div>
                </div>
              </div>
              <!-- END OF HIDDEN ELEMENT -->





             
                <form action="/myEventComm/{{$event_id}}" method="POST" class="form-horizontal">
                  @csrf
                <fieldset>
                <!-- Form Name -->
               

                <div class="dynamic-stuff">
                  <!-- Dynamic element will be cloned here -->
                  <!-- You can call clone function once if you want it to show it a first element-->
                </div>
                
                <!-- Button -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                        <p class="add-one">Add roles</p>
                    </div>
                  <div class="col-md-5"></div>
                    <div class="col-md-6">
                      <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Create roles</button>
                    </div>
                  </div>
                </div>
              </fieldset>
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
//Clone the hidden element and shows it
$('.add-one').click(function(){
  $('.dynamic-element').first().clone().appendTo('.dynamic-stuff').show();
  attach_delete();
});


//Attach functionality to delete buttons
function attach_delete(){
  $('.delete').off();
  $('.delete').click(function(){
    console.log("click");
    $(this).closest('.form-group').remove();
  });
}

    </script>

  </section>

@endsection