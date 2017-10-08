@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Category
                      <small>Add</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                  <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                          <label>Thể loại</label>
                          <select class="form-control" id="TheLoai">
                            @foreach($theloai as $tl)
                              <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                            @endforeach
                          </select>
                          <label>Loại tin</label>
                          <select class="form-control" id="LoaiTin" name="idLoaiTin">
                            @foreach($loaitin as $lt)
                              <option value="{{ $lt->id }}">{{ $lt->Ten }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Tiêu đề</label>
                          <input class="form-control" name="TieuDe" value="" />
                      </div>
                      <div class="form-group">
                          <label>Tóm tắt</label>
                          <textarea class="form-control" rows="3" name="TomTat"></textarea>
                      </div>

                      <div class="form-group">
                          <label>Nội dung</label>
                          <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                      </div>
                      <div class="form-group">
                          <label> Hình </label>
                          <input type="file" name="Hinh" value="" />
                      </div>
                      <div class="form-group">
                          <label>Nổi bật</label>
                          <label class="radio-inline">
                              <input name="NoiBat" value="0" checked="" type="radio"> Không
                          </label>
                          <label class="radio-inline">
                              <input name="NoiBat" value="1" type="radio"> Có
                          </label>
                      </div>
                      <button type="submit" class="btn btn-default">Thêm</button>
                      <button type="reset" class="btn btn-default">Reset</button>
                  <form>
              </div>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
@endsection

@section('script')
    $(document).ready(function(){
        $("#TheLoai").change(function(){
            var idTheLoai = $(this).val();
            $.get("admin/ajax/loaitin/" + idTheLoai, function(data){
                $("#LoaiTin").html(data);
            });
        });
    });
@endsection
