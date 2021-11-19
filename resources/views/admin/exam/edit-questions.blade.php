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
        <div class="card-body">
            @include('admin.inc.erorr')
            <form action="{{ url("dashboard/exams/update-questions/$exam->id/$ques->id") }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tittle</label>
                            <input type="text" class="form-control" name="title" value="{{ $ques->title }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>right_ans</label>
                            <input type="text" class="form-control" name="right_ans" value="{{ $ques->right_ans }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>option_1</label>
                            <input type="text" class="form-control" name="option_1" value="{{ $ques->option_1 }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>option_2</label>
                            <input type="text" class="form-control" name="option_2" value="{{ $ques->option_2 }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>option_3</label>
                            <input type="text" class="form-control" name="option_3" value="{{ $ques->option_3 }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>option_4</label>
                            <input type="text" class="form-control" name="option_4" value="{{ $ques->option_4 }}"
                                placeholder="Enter ...">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Sumbit</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
