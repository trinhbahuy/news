@extends('layout.index')

@section('content')
	<div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                @foreach($errors->all() as $error)
                	<div class="alert alert-danger"> {{ $error }}</div>
                @endforeach
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	<div class="panel-body">
				    	<form action="signup" method="post">
				    	{{ csrf_field() }}
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Họ tên" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>
							<div style="margin-bottom: 20px;">
								<label> Giới tính </label> <br>
								<input type="radio"  name="gender" aria-describedby="basic-addon1" value="1"
							  	> Nam
							  	<input type="radio"  name="gender" aria-describedby="basic-addon1" value="0"
							  	> Nữ
							</div>
							<div>
								<label> Ngày sinh</label>
								<input type="date" class="form-control"  name="date" aria-describedby="basic-addon1"
							  	>
							</div>
							<div>
								<label> Số điện thoại </label>
								<input type="text" class="form-control" placeholder="Số điện thoại" name="phone" aria-describedby="basic-addon1"
							  	>
							</div>
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng ký
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection
