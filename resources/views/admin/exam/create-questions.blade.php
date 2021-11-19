@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add New Exam (Step2)</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>

                            <li class="breadcrumb-item active">Add New Exam (Step2)</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card-body">
            @include('admin.inc.erorr')
            <form action="{{url("dashboard/exams/store-questions/{$exam_id}")}}" method="POST">
                @csrf
                @for ($i = 1; $i <= $questions_no; $i++)
                    <h5>Question{{$i}}</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tittle</label>
                                <input type="text" class="form-control" name="tittles[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Right Ans</label>
                                <input type="number" class="form-control" name="right_anss[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>option1</label>
                                <input type="text" class="form-control" name="option_1s[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>option2</label>
                                <input type="text" class="form-control" name="option_2s[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>option3</label>
                                <input type="text" class="form-control" name="option_3s[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>option4</label>
                                <input type="text" class="form-control" name="option_4s[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <hr>
                @endfor

                <div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
        </div>

        </form>
    </div>
 @endsection
