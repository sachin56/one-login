@include('layouts.headerlayout')
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbarlayout')
    <!-- /.navbar -->

    <!-- select 2-->
    <link rel="stylesheet" href="css/select2.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    {{-- data tables --}}
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Employee Registration</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- form start -->
                        <form id="frmusers" method="POST" action="/User_Register" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PID</label>
                                        <input type="text" class="form-control" name="pid" id="pid"
                                            placeholder="Enter PID">
                                    </div>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter User Name">
                                    </div>
                                    <div class="form-group">
                                        <label>User Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Enter User Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Pasword:</label>
                                        <input type="text" class="form-control" name="password" id="password"
                                            placeholder="Enter Password">
                                    </div>

                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designation" id="designation"
                                                placeholder="Enter User Designation">
                                        </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" id="gender" class="form-control" style="width:100%;">
                                            <option value="">Select Gender</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone number :</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Enter Phone number">
                                    </div>
                                    <div class="form-group">
                                        <label>User Systems</label>
                                        <select id="systems" name="systems[]" class="select2" multiple="multiple" data-placeholder="Select a System" data-dropdown-css-class="select2-purple" style="width:100%;">
                                            @foreach ($systems as $system)
                                                <option value="{{ $system->id }}">{{ $system->system_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button id="btnsubmit" type="submit" class="btn btn-primary">Submit</button>
                        <button id="btnclear" type="reset" class="btn btn-danger">Clear</button>
                        <button id="btnupdate" type="button" class="btn btn-dark" hidden>Update</button>
                    </div>
                    </form> <!-- end form -->
                </div>


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Users</h3>
                        <div class="card-tools">
                            <button id="minimize" type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblusers" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>PID</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><button class="btn btn-danger delete">Delete</button>
                                            <button class="btn btn-dark update" onclick='getData({{ $user->id }})'>Update</button>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.body_footerlayout')
</div>
<!-- ./wrapper -->
@include('layouts.footerlayout')

<script type="text/javascript" src="js/formToJson.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- data table -->
<script type="text/javascript" src="js/jscript/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="js/user.js"></script>


