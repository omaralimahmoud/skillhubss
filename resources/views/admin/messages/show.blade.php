@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Message</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active">Message</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>

                                <th>Name</th>

                                <th>Email</th>
                                <th>supject</th>

                                    <th>Body</th>

                            </tr>
                        </thead>
                        <tbody>

                                <tr>

                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject ?? '...' }}</td>
                                    <td>{{$message->body}}</td>


                                </tr>

                        </tbody>
                    </table>


                </div>
                <div class="card-body">
                    <h3 class="btn btn-danger">send response</h3>
                    @include('admin.inc.erorr')
                    <form method="POST" action="{{ url("dashboard/messages/response/$message->id") }}" >
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter ...">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Body</label>
                                    <textarea class="form-control" rows="3" name="body" placeholder="Enter ..."></textarea>
                                </div>
                            </div>








                                <!-- /.card-body -->
                                <div class="w-100">
                                    <button type="submit" class="btn btn-success">Sumbit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                                </div>
                    </form>



    @endsection
