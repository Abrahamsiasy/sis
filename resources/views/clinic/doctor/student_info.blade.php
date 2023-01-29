{{-- view for student detail  --}}
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">


                            <h3 class="profile-username text-center">{{ $student->first_name . ' ' . $student->last_name }}
                            </h3>

                            <p class="text-muted text-center">
                                {{ $student->sex . ' ' }}
                                @php
                                    $today = date('Y-m-d');
                                    $diff = date_diff(date_create($student->dob), date_create($today));
                                    echo $diff->format('%y');
                                @endphp

                            </p>
                            <p class="text-muted text-center">{{ $student->phone_number }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Blood Type</b> <a class="float-right">A+</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Highet</b> <a class="float-right">1.83</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Weight</b> <a class="float-right">77</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" href="#medication" data-toggle="tab">Medication</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">

                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>



                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="Type a comment">
                                    </div>


                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="medication">
                                    <!-- The timeline -->
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication Name</label>
                                                    <input class="form-control" placeholder="Enter ..." name="name" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication Amount</label>
                                                    <input class="form-control" placeholder="Enter ..." name="amount" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication Frequency</label>
                                                    <input class="form-control" placeholder="Enter ..." name="frequency" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- input -->
                                                <div class="form-group">
                                                    <label>Medication How Much</label>
                                                    <input class="form-control" placeholder="Enter ..." name="how_much" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="why"></textarea>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer p-0 ">
                                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                            <button type="submit" class="btn btn-primary btn-lg">New</button>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                <ul class="list-group col-sm-12">
                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="blood"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="blood">Blood</label>
                                                        </div>

                                                    </li>
                                                    
                                                    <li class="list-group-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="faeces"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="faeces">Faeces</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="urine"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="urine">Urine</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sputum"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="sputum">Sputum</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="swab"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="swab">Swab</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="fluids"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="fluids">Fluids</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="tissue"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="tissue">Tissue</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="cytology"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="cytology">Cytology</label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item rounded-0">
                                                        <div class="custom-control custom-checkbox" id="div_container">


                                                        </div>
                                                    </li>
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" class="form-control" id="new_sample">
                                                        <span class="input-group-append">
                                                            <p id="add_new_sample" class="btn btn-info btn-lg">Add
                                                                Other, namely</p>
                                                        </span>
                                                    </div>
                                                    <script>
                                                        document.getElementById('add_new_sample').onclick = function() {
                                                            var checkbox = document.createElement('input');
                                                            var new_sample = document.getElementById("new_sample").value;
                                                            // console.log(new_sample);
                                                            checkbox.type = 'checkbox';
                                                            checkbox.id = new_sample;
                                                            checkbox.name = new_sample;
                                                            checkbox.value = new_sample;

                                                            var label = document.createElement('label')
                                                            label.htmlFor = new_sample;
                                                            label.appendChild(document.createTextNode(new_sample));

                                                            var br = document.createElement('br');

                                                            var container = document.getElementById(div_container);
                                                            console.log(checkbox);
                                                            //container.appendChild(checkbox);
                                                            // container.appendChild(label);
                                                            // container.appendChild(br);
                                                        }
                                                    </script>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                <ul class="list-group col-sm-12">
                                                    <li class="list-group-item rounded-0 col-sm-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id=""
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="blood">Normal</label>

                                                                <input class="custom-control-input" id="bloodb"
                                                                type="checkbox">
                                                            <label
                                                                class="cursor-pointer font-italic d-block custom-control-label"
                                                                for="bloodb">Bloodb</label>
                                                        </div>

                                                    </li>
                                                    
                                                    
                                                    
                                                </ul>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
@endsection
