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
              <form action="" method="POST">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="event_name" placeholder="Event Name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-briefcase"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  
                  <textarea class="form-control" id="addEvent" name="event_overview" placeholder="Overview"></textarea>
                 
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-align-justify"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="date" class="form-control" name="event_date" placeholder="Event Date">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar-plus"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="confirm_password" placeholder="Retype password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
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
  </section>

@endsection