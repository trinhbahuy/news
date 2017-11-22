<html>
<head>
  <meta charset="utf-8" />
 <link href="css/foundation.css" rel="stylesheet">
<link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="css/forum.css" rel="stylesheet">
</head>
<body>
  <header id="#top">
    <div class="row">
      <div class="large-4 column lpad">
        <div class="logo">
          <span>Some</span>
          <span>Forum</span>
        </div>
      </div>
      <div class="large-8 column ar lpad">
        <nav class="menu">
          <a href="#" class="current">Forum</a>
          <a href="#">Members</a>
          <a href="#">New Post</a>
          <a href="#">Forum Actions</a>
          <a href="#">Calendar</a>
          <a href="#">My Profile</a>
          <a href="#">FAQ</a>
          <a href="#">Contact</a>
        </nav>
      </div>
    </div>
  </header>

  <a href="#top" id="top-button">
    <i class="icon-angle-up"></i>
  </a>
  <div class="row">
    <div class="large-6 column lpad top-msg breadcrumb">
      <span id="breadcrumb">
        <a href="#"><i class="icon-home"></i></a>
        <a href="#">some category</a>
        <a href="#">some topic</a>
      </span>
    </div>
    <div class="large-6 small-12 column lpad top-msg ar">
      Welcome,
      <a href="#" class="underline">Robin Brons</a>
    </div>
  </div>


  <div class="row mt mb">
    <div class="large-12">
      <div class="large-12 forum-category rounded top">
        <div class="large-8 small-10 column lpad">
          Some category title
        </div>
        <div class="large-4 small-2 column lpad ar">
          <a data-connect="">
            <i class="icon-collapse-top"></i>
          </a>
        </div>
      </div>

      <div class="toggleview">
        <div class="large-12 forum-head">
          <div class="large-8 small-8 column lpad">
            Forums
          </div>

          <div class="large-4 small-4 column lpad">
            Freshness
          </div>
        </div>

        <div class="large-12 forum-topic">
          <div class="large-1 column lpad">
            <i class="icon-file"></i>
          </div>
          <div class="large-7 small-8 column lpad">
            <span class="overflow-control">
              <a href="#">Title of the title</a>
            </span>
            <span class="overflow-control">
              Description of the title of the topic(?)
            </span>
          </div>

          <div class="large-4 small-4 column pad" style="text-align: center;">
            <span >
              <a href="#">Some sub-topic</a>
            </span>
            <span>08-29-2013 7:29PM</span>
            <span>by <a href="#">Some user</a></span>
          </div>
        </div>

        <div class="large-12 forum-topic">
          <div class="large-1 column lpad">
            <i class="icon-tablet"></i>
          </div>
          <div class="large-7 small-8 column lpad">
            <span class="overflow-control">
              <a href="#">Oops.. Foundation is supposed to be responsive</a>
            </span>
            <span class="overflow-control">
              But it's not (yet) working here
            </span>
          </div>

          <div class="large-4 small-4 column pad" style="text-align: center;">
            <span>
              <a href="#">Some sub-topic</a>
            </span>
            <span>08-29-2013 7:29PM</span>
            <span>by <a href="#">Some user</a></span>
          </div>
        </div>



      </div>
    </div>
  </div>

  <div class="row mt mb">
    <div class="large-12">
      <div class="large-12 small-12 forum-category rounded top lpad">
        <span>Forum Statistics</span>
      </div>
      <div class="large-12 small-12 normal lpad">
        <h1 class="inset">Who's online</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt cupiditate culpa id explicabo eum eius corporis minima laudantium dolor aperiam quam cumque sequi aliquam adipisci alias fugiat praesentium quibusdam sapiente.</p>
        <h1 class="inset">Board Statistics</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta expedita temporibus dolorum esse modi hic quidem sit voluptas laboriosam veniam corporis accusamus id nam! Commodi sequi molestias quasi dolorum animi.</p>
      </div>
    </div>
  </div>
  <script src="js/jquery.js"></script>
  <script type="text/javascript" >
  $(document).ready( function() {
  $('nav.menu a').click( function() {
    $(this).parent().find('.current').removeClass('current');
    $(this).addClass('current');
  });
  $('a[data-connect]').click( function() {
    var i = $(this).find('i');
    i.hasClass('icon-collapse-top') ? i.removeClass('icon-collapse-top').addClass('icon-collapse') : i.removeClass('icon-collapse').addClass('icon-collapse-top');
    $(this).parent().parent().toggleClass('all').next().slideToggle();
  });
  $(window).scroll(function(){
    var w = $(window).width();
    if(w < 768) {
      $('#top-button').hide();
    } else {
      var e = $(window).scrollTop();
      e>150?$('#top-button').fadeIn() :$('#top-button').fadeOut();
    }
  });
});
  </script>
</body>
</html>
