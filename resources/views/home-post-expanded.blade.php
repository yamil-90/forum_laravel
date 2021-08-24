<x-header-main/>
<body>

    <!-- Navigation -->
    <x-navbar-main-page/>


<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">



            <h1 class="my-4">
                <small>Post</small>
            </h1>
            <!-- Individual Blog Post -->
           <x-blog-post :post='$post'/>

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

{{--end of stuff in home--}}

<!-- Footer -->
<x-layouts.footer/>
<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

</body>

</html>


