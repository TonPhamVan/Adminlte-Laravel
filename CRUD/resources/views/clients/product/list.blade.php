@extends('layouts.master')
@section('list-product')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{$title}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active"><a href="#">{{$title}}</a></li>
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
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <div>
                        @if (session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>

                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{route('sanpham.add')}}" style="margin: 0 0 5px 0" class="btn btn-primary">Add Product</a>
                            </div>
                            <div class="col-md-8" >
                                <form action="" method="GET" style="margin: 0 0 5px 0">
                                    <div class="input-group input-group-lg">
                                        <input type="text" name="searchProduct" class="form-control form-control-lg" placeholder="Tìm kiếm sản phẩm">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-sm btn-default btn-secondary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">STT</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th width = "5%">Edit</th>
                            <th width = "5%">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($productList))
                                @foreach ($productList as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->Price}}</td>
                                    <td><a href="{{route('sanpham.getEdit',['id'=>$item->id])}}" class ="btn btn-warning btn-sm">Edit</a></td>
                                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('sanpham.delete',['id'=>$item->id])}}" class ="btn btn-danger btn-sm">Delete</a></td>
                                  </tr>
                                @endforeach
                            @else
                                  <tr>
                                    <td colspan="5">Không có sản phẩm</td>
                                  </tr>
                            @endif

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                      </ul>
                    </div> --}}
                    {{-- phân trang --}}
                    {{$productList->appends(request()->all())->links()}}
                  </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>

@endsection
