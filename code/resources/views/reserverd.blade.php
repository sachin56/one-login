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
                        <h3 class="card-title">Easy implementation</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form id="frmbrand" role="form" method="POST" action="http://127.0.0.1:8000/api/brand">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input type="text" class="form-control" name="name" id="brand_name"
                                            placeholder="Enter Brand name">
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
                        <h3 class="card-title">Search Brand</h3>
                        <div class="card-tools">
                            <button id="minimize" type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblbrand" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand Name</th>
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

{{-- <script type="text/javascript" src="jscript/formToJson.js"></script>
<script type="text/javascript" src="jscript/brand.js"></script> --}}
