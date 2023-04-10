@include('layouts.headerlayout')
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbarlayout')
    <!-- /.navbar -->
    <link rel="stylesheet" href="/css/box_shadow.css">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <br>
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">Available System</h3>
                        <div class="card-tools">
                            <button id="minimize" type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            @foreach($user_systems as $system)
                                <div class="col-md-2" >
                                    <div class="box">
                                    <img src="attachments/{{ $system->attachment }}" style="object-fit:contain; width:100%; height:100%; " alt="{{$system->system_name}}" onclick="userLogin(`{{ $system->domain }}`,`{{ Auth::user()->id }}`)">
                                    <p style="text-align: center;"><strong>{{$system->system_name}}</strong></p>
                                </div>

                                </div>
                                {{-- <div class="col-md-1">

                                </div> --}}
                            @endforeach
                        </div>

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
<script type="text/javascript" src="js/user_systems.js"></script>
