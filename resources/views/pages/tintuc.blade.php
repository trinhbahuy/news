@extends('layout.index')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $tintuc->TieuDe }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">............</a>
                </p>

                <!-- Preview Image -->
                <img width="800px" height="300px" class="img-responsive" src="tintuc/{{ $tintuc->Hinh }}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> last posted: {{ $tintuc->updated_at }}</p>
                <hr>

                <!-- Post Content -->
                {!! $tintuc->NoiDung !!}

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form"  method="GET">
                        <div class="form-group">
                            <textarea id="nd" class="form-control" name="NoiDung" rows="3"></textarea>
                        </div>
                        <input type="hidden" value="{{ $tintuc->id }}" id="id" />
                        <button type="submit" @if (!Auth::check())
                                                  {{ "id=comment" }}
                                              @endif
                        class="btn btn-primary" id="cmtPost">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div id="ajaxCmt" > </div>
                @foreach($tintuc->comment as $cmt)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $cmt->user->name }}
                            <small>{{ $cmt->created_at }}</small>
                        </h4>
                        {{ $cmt->NoiDung }}
                    </div>
                </div>
              @endforeach
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                      @foreach($tinlienquan as $lienquan)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" src="tintuc/{{ $lienquan->Hinh }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b>{{ $lienquan->TieuDe }}</b></a>
                            </div>
                            <p>{{ $lienquan->TomTat }}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                      @endforeach

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                      @foreach($tinnoibat as $noibat)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" src="tintuc/{{ $noibat->Hinh }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b>{{ $noibat->TieuDe }}</b></a>
                            </div>
                            <p>{{ $noibat->TomTat }}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                      @endforeach
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- end Page Content -->
@endsection

@section('script')
  <script>
      $(document).ready(function(){
          $('#comment').click(function(e){
               e.preventDefault();
               window.location = "login";
          });

          $('#cmtPost').click(function(e){
             e.preventDefault();
             var id = $("#id").val();
            var nd = $("textarea#nd").val();
            $.get("comment/"+id, function(data){
                console.log(nd);
                $("#ajaxCmt").html(data + nd + "</div> </div>");
             });
            $.ajax({
                method: 'POST',
                url: 'comment/'+id,
                data: {nd: nd, _token:'{{ csrf_token() }}'}
            }).done(function(){

            });
          });
        });
  </script>
@endsection
