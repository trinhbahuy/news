@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Category
                      <small>Edit</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                  <form action="sua/{{ $user->id }}" method="POST">
                    {{ csrf_field() }}
                      <div class="form-group">
                          <label>Tên</label>
                          <input class="form-control" name="Name" placeholder="Nhập tên người dùng" value="{{ $user->name }}"/>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" name="Email" placeholder="Nhập email người dùng" value="{{ $user->email }}" readonly/>
                      </div>
                      <div class="form-group">
                          <label>Giới tính</label>
                          <select class="form-control" name="Gender">
                              <option @if($user->gender == 0) {{ "selected" }} @endif value="0">Nữ</option>
                              <option @if($user->gender == 1) {{ "selected" }} @endif value="1">Nam</option>
                              <option @if($user->gender == 2) {{ "selected" }} @endif value="2">Không xác định</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Ngày sinh</label>
                          <input class="form-control" name="Date" placeholder="Nhập ngày sinh" value="{{ $user->date }}" />
                      </div>
                      <div class="form-group">
                          <label>Số diện thoại</label>
                          <input class="form-control" name="Phone" placeholder="Nhập số điện thoại" value="{{ $user->phone }}" />
                      </div>
                      <button type="submit" class="btn btn-default">Edit</button>
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
