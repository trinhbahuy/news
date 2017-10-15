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
                  <form action="admin/users/sua" method="POST">
                    {{ csrf_field() }}
                      <div class="form-group">
                          <label>Tên</label>
                          <input class="form-control" name="txtCateName" placeholder="Nhập tên người dùng" />
                      </div>
                      <div class="form-group">
                          <label>/Email</label>
                          <input class="form-control" name="txtOrder" placeholder="Nhập email người dùng" />
                      </div>
                      <div class="form-group">
                          <label>Quyền</label>
                          <select class="form-control">
                              <option value="0">Thành viên</option>
                              <option value="2">Moderator</option>
                              <option value="1">Admin</option>
                          </select>
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
