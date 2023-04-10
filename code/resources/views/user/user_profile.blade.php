@include('layouts.headerlayout')
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbarlayout')
    <!-- /.navbar -->

     <!-- select 2-->
     <link rel="stylesheet" href="css/select2.css">
     <!-- Bootstrap4 Duallistbox -->
     <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- end section -->
        <div class="card card-primary  card-outline">
            <div class="card-body box-profile">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form id="frmuser" role="form" method="POST" action="users/update/{{$user->id}}">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>User Email</label>
                                    <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $user->name }}" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="{{ $user->phone }}" readonly>
                                </div>
                                <!--<div class="form-group">-->
                                <!--    <label>Gender</label>-->
                                <!--    <select name="gender" id="gender" class="form-control" style="width:100%;" readonly>-->
                                <!--        <option value="">Select Gender</option>-->
                                <!--        <option value="0">Male</option>-->
                                <!--        <option value="1">Female</option>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <div class="form-group">
                                    <label>PID</label>
                                    <input type="text" class="form-control" name="pid" id="pid"
                                    value="{{ $user->pid }}" placeholder="Enter PID" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" class="form-control" name="designation" id="designation"
                                    value="{{ $user->designation }}"  placeholder="Enter User Designation" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pasword:</label>
                                    <input type="text" class="form-control" name="password" id="password"
                                        placeholder="Enter New Password">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button id="btnsubmit" type="submit" class="btn btn-primary">Update</button>
                    <button id="btnclear" type="reset" class="btn btn-danger">Clear</button>

                </div>
                </form> <!-- end form -->
            </div>
            <!-- /.card -->

        </div>
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.body_footerlayout')
</div>
<!-- ./wrapper -->
@include('layouts.footerlayout')

<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script>
    $(document).ready(function () {
    $("#gender").val(@json($user->gender)).change();
});
</script>
{{-- <script type="text/javascript" src="jscript/formToJson.js"></script>
<script type="text/javascript" src="jscript/brand.js"></script> --}}
