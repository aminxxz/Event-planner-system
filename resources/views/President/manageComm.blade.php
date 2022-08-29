<!-- (auth::guard('committees')->user()->role_id == '' || auth::guard('committees')->user()->role_id == '3')-->
<!--route ('assign-role')-->
@extends('layouts.Master.PresView')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>List of Committees</h3>
                        <!--<h3 class="card-title">DataTable with minimal features & hover style</h3>-->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 offset-md-0">

                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg" placeholder="Search Committee">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table id="commList" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Committee</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                    <th>Activation Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($committee as $committees)
                                <tr>
                                    <td>{{$committees->name}}</td>
                                    <td>{{$committees->role_name}}</td>
                                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#assign-role-modal{{$committees->stud_id}}">Assign role</button></td>
                                    <td>{{$committees->activation_status}}</td>
                                    <td><form action="/deactivate/{{$committees->stud_id}}" method="POST">
                                      @csrf
                                      <button onClick="return deactivate()" type="submit" class="btn btn-danger">Deactivate</button>
                                      </form></td>
                                </tr>

                                <!-- ASSIGN ROLE MODAL !-->
                                <div class="modal fade" id="assign-role-modal{{$committees->stud_id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Assign role</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/assignRole/{{$committees->stud_id}}" method="POST">
                                                @csrf
                                                <div class="col-sm-6">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Select Role</label>
                                                        <select name="role_id" class="form-control">
                                                            @foreach ($roles as $role)
                                                            <option value="{{$role->role_id}}">{{$role->role_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--<script>
                                        function deactivate() {
                                        var ask = window.confirm("Are you sure you want to deactivate the committee?");
                                        if (ask) {
                                            window.alert("This committee was successfully deactivated.");
                                        
                                            window.location.href = "/deactivate/{{$committees->stud_id}}";
                                        
                                        }
                                        }
                                        </script>-->
                                        <script>
                                        function deactivate(){
                                            return confirm("Are you sure?");
                                        }
                                    </script>
                  


                                @endforeach
                    </div>
                </div>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Committee</th>
                        <th>Role</th>
                        <th>Action</th>
                        <th>Activation Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.card -->
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


@endsection
