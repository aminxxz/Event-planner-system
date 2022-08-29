<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')--> 
<!-- Pres Profile/Auth::guard('committees')->user()->stud_id -->
@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3>Your Profile</h3>
              <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <div class="row">
                  <div class="col-md-4 offset-md-1">
                      <h5>Student id:</h5>    
                  </div>
                  <div class="col-md-5 offset-md-0">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="stud_id" value="{{Auth::guard('Committee')->user()->stud_id}}"  readonly>
                    </div> 
                  </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-1">
                    <h5>Name:</h5>    
                </div>
                <div class="col-md-5 offset-md-0">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" value="{{Auth::guard('Committee')->user()->name}}"  readonly>
                  </div> 
                </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5>E-mail:</h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="email" value="{{Auth::guard('Committee')->user()->email}}" readonly>
                </div> 
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-1">
                <h5>Role:</h5>    
            </div>
            <div class="col-md-5 offset-md-0">
              <div class="input-group mb-3">
                
                <input type="text" class="form-control" name="position" value="{{Auth::guard('Committee')->user()->position}}"  readonly>
              </div> 
            </div>
        </div>
        <div class="row">
              <div class="col-md-4 offset-md-1">
                  <h5>Activation Status:</h5>    
              </div>
              <div class="col-md-5 offset-md-0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="activation_status" value="{{Auth::guard('Committee')->user()->activation_status}}"  readonly>
                </div> 
              </div>
          </div>  
          <div class="row">
            <div class="col-md-10 offset-md-9">
          <button class="btn btn-primary" data-toggle="modal" data-target="#update-profile-modal">Update Profile</button>
            </div> 
          </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- PROFILE UPDATE MODAL !-->
          <div class="modal fade" id="update-profile-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="Pres Profile/Auth::guard('Committee')->user()->stud_id" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="name" placeholder="Full name" value="{{Auth::guard('Committee')->user()->name}}">
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                  </div>
                              </div>
                          </div>
                        <div class="input-group mb-3">
                          <input type="email" class="form-control" name="email" placeholder="Email" value="{{Auth::guard('Committee')->user()->email}}">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-envelope"></span>
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
                                <input type="password" name="confirm_password" class="form-control" placeholder="Retype password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
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
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

@endsection