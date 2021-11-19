@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ $exam->name('en') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
                            <li class="breadcrumb-item active">{{ $exam->name('en') }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-md-1 pb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Exam details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-sm">

                                    <tbody>
                                        <tr>
                                            <th>Name(en)</th>
                                            <td>
                                                {{ $exam->name('en') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Name(ar)</th>
                                            <td>
                                                {{ $exam->name('ar') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Description(en)</th>
                                            <td>
                                                {{ $exam->desc('en') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Description(ar)</th>
                                            <td>
                                                {{ $exam->desc('ar') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Skill</th>
                                            <td>
                                                {{ $exam->skill->name('en') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <td>
                                                <img src="{{ asset("uplods/$exam->img") }}" height="50px" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Question no.</th>
                                            <td>
                                                {{ $exam->questions_no }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Difficulty</th>
                                            <td>
                                                {{ $exam->difficulty }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Duration(mins.)</th>
                                            <td>
                                                {{ $exam->duration_mins }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Active</th>
                                            <td>
                                                @if ($exam->active)
                                                    <span class="badge bg-success">Yes</span>
                                                @else
                                                    <span class="badge bg-danger"> No</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <a class="btn btn-sm btn-success" href="{{ url("dashboard/exams/show/$exam->id/questions") }}">show
                            Question</a>
                        <a class="btn btn-sm btn-primary" href="{{ url()->previous() }}">Back</a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
