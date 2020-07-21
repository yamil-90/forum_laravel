<x-home-master>

	@section('content')

		<h1>Post!!!</h1>

        <!-- Title -->
        <h1 class="mt-4">
          {{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">by
          <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted {{$post->created_at->diffForHumans()?? ''}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$post->post_image}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>

        <!-- Comments Form -->
        @if(Auth::check())
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">

                <form method="post" action="{{route('comments.store', [$post])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="email" value="{{auth()->user()->email}}">
                    <div class="form-group mytextarea">
                        <label for="body">Content</label>
                        <textarea name="body" id="body" class="form-control " cols="30" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        @endif


        <!-- Single Comment -->
        @foreach ($post->comments as $comment)
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" height="50" src="{{$comment->user->avatar ? $comment->user->avatar : 'http://placehold.it/50x50'}}" alt="">
            <div class="media-body">
                <h5 class="mt-0">{{$comment->user->name}}</h5>
                {{$comment->body}}

            <!-- replies -->
                @foreach ($comment->replies as $reply)


                    <div class="media mt-4">
                    <img class="d-flex mr-3 rounded-circle" height="50" src="{{$comment->user->avatar ? $comment->user->avatar : 'http://placehold.it/50x50'}}" alt="">
                    <div class="media-body">
                      <h5 class="mt-0">{{$reply->author}}</h5>
                       {{$reply->body}}
                    </div>
                    </div>
                  @endforeach
            </div>



        </div>
<!-- reply form -->
@if(Auth::check())
            <form method="post" action="{{route('reply.store', [$comment])}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="email" value="{{auth()->user()->email}}">
                <div class="row sm-3">
                <div class="form-group mytextarea">

                    <textarea name="body" id="body" class="form-control " cols="20" rows="1"></textarea>
                </div>

                <div class="col sm-3">
                    <button type="submit" class="btn btn-primary">Reply</button>
                 </div>
                </div>
            </form>

@endif
        @endforeach


        <!-- Comment with nested comments -->
        {{-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div> --}}

	@endsection

</x-home-master>
