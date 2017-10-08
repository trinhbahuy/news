@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Category
                      <small>List</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->
              @if (session('notice'))
                <div class="alert alert-success">
                  {{ session('notice') }}
                </div>
              @endif
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr align="center">
                          <th>ID</th>
                          <th>Tên</th>
                          <th>Thể loại</th>
                          <th>Tên không dấu</th>
                          <th>Delete</th>
                          <th>Edit</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($loaitin as $list)
                      <tr class="odd gradeX" align="center">
                          <td>{{$list->id}}</td>
                          <td>{{$list->Ten}}</td>
                          <td>{{$list->theloai->Ten}}</td>
                          <td>{{$list->TenKhongDau}}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaitin/xoa/{{$list->id}}"> Delete</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/sua/{{$list->id}}">Edit</a></td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
@endsection
