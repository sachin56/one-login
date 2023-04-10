@include('layouts.headerlayout')
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbarlayout')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Project Registration</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                         <!-- form start -->
                         <form id="frmsystem" method="POST"  action="/system_Register" enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Master No</label>
                                        <input type="text" class="form-control" name="master_no" id="master_no"
                                            placeholder="Enter User Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter Project Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telephone No</label>
                                        <input type="text" class="form-control" name="tele_no" id="tele_no"
                                            placeholder="Enter Telephone No">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="Is_active" id="Is_active" class="form-control">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button id="btnsubmit" type="submit" class="btn btn-primary">Submit</button>
                        <button id="btnclear" type="reset" class="btn btn-danger">Clear</button>
                        <button id="btnupdate" type="button"  class="btn btn-dark" hidden>Update</button>
                    </div>
                    </form> <!-- end form -->
                </div>


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Available System</h3>
                        <div class="card-tools">
                            <button id="minimize" type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblsystems" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>System Name</th>
                                    <th>Domain Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

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
<script type="text/javascript" src="js/systems.js"></script>
