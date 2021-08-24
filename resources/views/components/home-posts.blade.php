@foreach($posts as $post)
    <div class="card mb-4">
        <img class="card-img-top" src="{{ asset('')==asset($post->post_image)?'https://via.placeholder.com/150x20?text=NO+IMAGE':asset($post->post_image)}}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{Str::limit($post->body, '80' ,'.....')}}</p>
            <a href="{{route('post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted {{$post->created_at ? $post->created_at->diffForHumans() : 'no date'}}
            {{--            <a href="#">Start Bootstrap</a>--}}
        </div>
    </div>
@endforeach
