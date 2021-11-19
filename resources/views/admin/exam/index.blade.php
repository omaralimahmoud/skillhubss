@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Exams</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Exams</li>
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
                    <div class="col-12">
                        @include('admin.inc.message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Exams </h3>

                                <div class="card-tools">

                                    <a href="{{ url('dashboard/exams/create') }}" class="btn btn-sm btn-primary">Add
                                        New</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name(en)</th>
                                            <th>Name(ar)</th>
                                            <th>skill</th>
                                            <th>Question no.</th>
                                            <th>Image</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->name('en') }}</td>
                                                <td>{{ $exam->name('ar') }}</td>
                                                <td>{{ $exam->skill->name('en') }}</td>
                                                <td>{{ $exam->questions_no }}</td>
                                                <td>
                                                    <img src="{{ asset("uplods/$exam->img") }}" height="50px" alt="">
                                                </td>

                                                <td>
                                                    @if ($exam->active)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url("dashboard/exams/edit/$exam->id") }}"
                                                        class=" btn btn-sm btn-info ">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/exams/show/$exam->id") }}"
                                                        class=" btn btn-sm btn-primary ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/exams/show/$exam->id/questions") }}"
                                                        class=" btn btn-sm btn-success">
                                                        <i class="far fa-question-circle"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/exams/delete/$exam->id") }}"
                                                        class=" btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/exams/toggle/$exam->id") }}"
                                                        class=" btn btn-sm btn-primary">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>


                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center my-3">
                                    {{ $exams->links() }}
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{-- <div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add New</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

            @include('admin.inc.erorr')
                <!-- /.card-header -->
                <!-- form start -->
                <form id="add-form" method="POST" action="{{ url('dashboard/exams/store') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                         <div class="col-6">
                            <div class="form-group">
                                <label >Name(en)</label>
                                <input type="text" name="name_en" class="form-control" >
                              </div>
                         </div>

                     <div class="col-6">
                        <div class="form-group">
                            <label >Name(ar)</label>
                            <input type="text" name="name_ar" class="form-control">
                          </div>
                     </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label >Categories</label>
                                <select class="custom-select form-control" name="cat_id">
                                    @foreach ($cats as $cat)
                                    <option value="{{$cat->id}}"> {{ $cat->name('en') }}</option>
                                    @endforeach


                                </select>
                              </div>
                        </div>

                      <div class="col-6">
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img">
                                <label class="custom-file-label" >Choose file</label>
                              </div>

                            </div>
                          </div>
                      </div>
                   </div>

                </form>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" form="add-form"   class="btn btn-primary">Submit</button>
        </div>
      </div>
      <!-- /.modal-content -->
       </div>
     <!-- /.modal-dialog -->
  </div> --}}




    {{-- <div class="modal fade" id="edit-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
           <h4 class="modal-title">Edit</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">

        @include('admin.inc.erorr')
               <!-- /.card-header -->
               <!-- form start -->
               <form id="edit-form" method="POST" action="{{ url('dashboard/exams/update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit-form-id">
                    <div class="row">
                        <div class="col-6">
                           <div class="form-group">
                               <label >Name(en)</label>
                               <input type="text" name="name_en" class="form-control" id="edit-form-name-en" >
                             </div>
                        </div>

                    <div class="col-6">
                       <div class="form-group">
                           <label >Name(ar)</label>
                           <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar">
                         </div>
                    </div>
                   </div>

                   <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Categories</label>
                            <select class="custom-select form-control" id="edit-form-cat-id" name="cat_id">
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}"> {{ $cat->name('en') }}</option>
                                @endforeach


                            </select>
                          </div>
                    </div>

                  <div class="col-6">
                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="img">
                            <label class="custom-file-label" >Choose file</label>
                          </div>

                        </div>
                      </div>
                  </div>
               </div>



               </form>

       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" form="edit-form"   class="btn btn-primary">Submit</button>
       </div>
     </div>
     <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
 </div> --}}



@endsection

@section('scripts')
    <script>


    </script>
@endsection
