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
                                {{-- succses messahe here --}}
                                @if (session()->has('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                            </div>
                            @endif

                            <!--Card image-->
                            <div
                                class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                                <div>
                                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                        <i class="fas fa-th-large mt-0"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                        <i class="fas fa-columns mt-0"></i>
                                    </button>
                                </div>

                                <a href="" class="white-text mx-3">Table name</a>

                                <div>
                                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                        <i class="fas fa-pencil-alt mt-0"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                        <i class="far fa-trash-alt mt-0"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                                        <i class="fas fa-info-circle mt-0"></i>
                                    </button>
                                </div>

                            </div>
                            <!--/Card image-->

                            <div class="px-4">

                                <div class="table-wrapper">
                                    <!--Table-->
                                    <table class="table table-hover mb-0">

                                        <!--Table head-->
                                        <thead>
                                            <tr>
                                                <th class="th-lg">
                                                    <a>#
                                                    </a>
                                                </th>
                                                <th class="th-lg">
                                                    <a href="">STUDENT ID
                                                    </a>
                                                </th>
                                                <th class="th-lg">
                                                    <a href="">STUDENT NAME
                                                        <i class="fas fa-sort ml-1"></i>
                                                    </a>
                                                </th>
                                                <th class="th-lg">
                                                    <a href="">EMERGENCY
                                                    </a>
                                                </th>
                                                <th class="th-lg">
                                                    <a href="">EMERGENCY
                                                    </a>
                                                </th>
                                                <th class="th-lg">
                                                    <a href="">EMERGENCY
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <!--Table head-->

                                        <!--Table body-->
                                        <tbody>
                                            @foreach ($students as $key => $student)
                                                <tr>

                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $student->student_id }}</td>
                                                    <td>{{ $student->first_name }}</td>
                                                    <td>
                                                        <a href="/clinic/reception/{{ $student->id }}"
                                                            class="btn btn-block btn-success">Success</a>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                                        <label class="form-check-label" for="checkbox1"
                                                            class="label-table"></label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input me-5" type="checkbox" id="checkbox1">
                                                        <label class="form-check-label me-5" for="checkbox1"
                                                            class="label-table"></label>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <!--Table body-->
                                    </table>
                                    <!--Table-->
                                </div>

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
