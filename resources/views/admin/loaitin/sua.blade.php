@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Loại tin
                      <small>Edit</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          {{ $error }} <br />
                      @endforeach
                    </div>
                @endif

                @if (session('notice'))
                  <div class="alert alert-success">
                    {{ session('notice') }}
                  </div>
                @endif
                  <form action="admin/loaitin/sua/{{ $loaitin->id }}" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                          <label>Category Parent</label>
                          <select class="form-control" name="theloai">
                              @foreach($theloai as $list)
                              <option
                              @if($list->id == $loaitin->idTheLoai)
                                  {{ "selected" }}
                              @endif
                              value="{{ $list->id }}"> {{ $list->Ten }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input class="form-control" name="Name" value="{{ $loaitin->Ten }}" />
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
