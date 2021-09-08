<x-header-main/>
<body>
<!-- Navigation -->
<x-navbar-main-page/>


<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1>Home</h1>

            <h1 class="my-4">
                <small>Posts</small>
            </h1>
            <!-- Blog Post -->
            <x-home-postsbycategory :posts='$posts' :category="$category"/>
            <a class="nav-link collapsed" href="{{route('categories.index')}}" >categories</a>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
        {{--<div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>--}}

        <!-- Categories Widget -->
            <x-categories :categories="$categories" />
                <!-- Side Widget -->
                {{--<div class="card my-4">
                  <h5 class="card-header">Side Widget</h5>
                  <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                  </div>
                </div>--}}



        </div>
    </div>
    <!-- /.row -->

</div>
<!-- Pagination -->
{{$posts->render()}}
{{--<ul class="pagination justify-content-center mb-4">
    <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
    </li>
</ul>--}}
{{--end of stuff in home--}}

<!-- Footer -->
<x-layouts.footer/>
<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

</body>

</html>


