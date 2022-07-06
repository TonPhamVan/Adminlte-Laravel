@extends('layouts.master')
@section('list-user')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active"><a href="#">List User</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">List User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <a href="{{route('users.add')}}" style="margin: 0 0 10px 0" class="btn btn-primary">Add User</a>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">STT</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width: 40px">created_at</th>
                            <th width = "5%">Edit</th>
                            <th width = "5%">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                              <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                              </div>
                            </td>
                            <td><span class="badge bg-danger">55%</span></td>
                            <td><a href="#" class ="btn btn-warning btn-sm">Edit</a></td>
                            <td><a href="#" class ="btn btn-danger btn-sm">Delete</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    {{-- <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                      </ul>
                    </div> --}}
                  </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>

@endsection
