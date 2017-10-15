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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Level</th>
                          <th>Delete</th>
                          <th>Edit</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      <tr class="even gradeC" align="center">
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email}}</td>
                          <td>{{ $user->level }}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/users/xoa/{{ $user->id }}"> Delete</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/users/sua/{{ $user->id }}">Edit</a></td>
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
