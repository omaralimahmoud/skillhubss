@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">All Admins</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active">All Admins</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <div>
                        <a href="{{url("dashboard/admins/create")}}" class=" btn btn-primary">Add New</a>
                    </div>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>verified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>

                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->role->name }}</td>



                                <td>
                                    @if ($admin->email_verified_at !== null)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-danger">No</span>
                                    @endif
                                </td>
                                <td>
                                   @if ($admin->role->name == 'admin')
                                   <a href="{{url("dashboard/admins/promote/$admin->id")}}" class="btn btn-danger">
                                    <i class="fas fa-caret-up"></i>
                                </a>
                                   @else

                               <a href="{{url("dashboard/admins/demote/$admin->id")}}" class="btn btn-primary">
                                    <i class="fas fa-caret-down"></i>
                                </a>
                                   @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    @endsection
