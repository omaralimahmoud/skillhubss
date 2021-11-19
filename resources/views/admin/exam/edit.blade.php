@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add New Exam</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>

                            <li class="breadcrumb-item active"> Add New</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- /.card-header -->
        <div class="card-body">
            @include('admin.inc.erorr')
            <form method="POST" action="{{ url("dashboard/exams/update/$exam->id") }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name(en)</label>
                            <input type="text" class="form-control" name="name_en" value="{{ $exam->name('en') }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name(ar)</label>
                            <input type="text" class="form-control" name="name_ar" value="{{ $exam->name('ar') }}"
                                placeholder="Enter ...">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Describtion(en)</label>
                            <textarea class="form-control" rows="3" name="desc_en"
                                placeholder="Enter ...">{{ $exam->desc('en') }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Describtion(ar)</label>
                            <textarea class="form-control" rows="3" name="desc_ar"
                                placeholder="Enter ...">{{ $exam->desc('ar') }}</textarea>
                        </div>
                    </div>
                    <!-- input states -->



                    <div class="row">
                        <div class="col-sm-12">
                            <!-- select -->
                            <div class="form-group">
                                <label>Skill</label>
                                <select class="form-control" name="skill_id">
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}" @if ($exam->skill_id == $skill->id) selected  @endif>
                                            {{ $skill->name('en') }}</option>
                                    @endforeach




                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Image</label>

                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" id="customFile" name="img">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-4">
                                    <label>Difficulty</label>
                                    <input type="number" class="form-control" value="{{ $exam->difficulty }}"
                                        name="difficulty">
                                </div>
                                <div class="col-sm-4">
                                    <label>Duration(mins.)</label>
                                    <input type="number" class="form-control" value="{{ $exam->duration_mins }}"
                                        name="duration_mins">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="w-100">
                            <button type="submit" class="btn btn-success">Sumbit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
            </form>

        @endsection
