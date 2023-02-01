{{-- view for queues of students to be accepted by the doctor  --}}
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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <!-- Table with panel -->
                            <div class="card card-cascade narrower">
                                <!-- /.card-header -->
                                <!-- Small boxes (Stat box) -->
                                <div class="row">
                                    @foreach ($queuesdoc as $key => $queue)
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner display-1">
                                                    <h3 style="font-size: 80px"> {{ $queue->doctor->room->room_no }} <sup
                                                            style="font-size: 20px">ROOM
                                                            NO.</sup></h3>
                                                    <h4>{{ $queue->student->first_name }}</h4>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <p class="small-box-footer">{{ $queue->doctor->name }} |
                                                    {{ $queue->student->id }} <i class="fas fa-arrow-circle-right"></i></p>
                                            </div>
                                        </div>
                                    @endforeach




                                    <!-- /.row -->
                                    <!-- Main row -->
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>STUDENT ID</th>
                                                <th>STUDENT NAME</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($queues as $key => $queue)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td>{{ $queue->student->student_id }}</td>
                                                    <td>{{ $queue->student->first_name }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <!-- Table with panel -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
