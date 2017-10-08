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
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr align="center">
                          <th>ID</th>
                          <th>Tiêu đề</th>
                          <th>Tiêu đề không dấu</th>
                          <th>Tóm tắt </th>
                          <th>Nổi bật</th>
                          <th>Số lượt xem</th>
                          <th>Thể loại</th>
                          <th>Loại tin</th>
                          <th>Delete</th>
                          <th>Edit</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($tintuc as $list)
                      <tr class="odd gradeX" align="center">
                          <td>{{ $list->id}}</td>
                          <td>  <div> {{ $list->TieuDe }} </div>
                                <img width="100px" src="tintuc/{{ $list->Hinh }}" />
                          </td>
                          <td>{{ $list->TieuDeKhongDau }}</td>
                          <td>{!! $list->TomTat !!}</td>
                          <td>{{ $list->NoiBat}}</td>
                          <td>{{ $list->SoLuotXem}}</td>
                          <td>{{ $list->loaitin->theloai->Ten }}</td>
                          <td>{{ $list->loaitin->Ten }}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{ $list->id }}"> Delete</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{ $list->id }}">Edit</a></td>
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
