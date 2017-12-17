@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
          @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm kiếm với từ khóa <?php $key = $_GET['key']; echo "'". $key ."'"; ?></b></h4>
                    </div>
                    @foreach($result as $list)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="tintuc/{{ $list->Hinh }}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{{ $list->TieuDe }}</h3>
                            <p>{!! $list->TomTat !!}</p>
                            <a class="btn btn-primary" href="tintuc/{{ $list->id }}">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                  @endforeach
                  {{ $result->appends(['key'=> $key])->render() }}
                </div>
            </div>

        </div>

    </div>
    <!-- end Page Content -->
@endsection
