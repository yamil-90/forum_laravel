<x-admin-master>
	@section('content')

	<h1>Edit</h1>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form method="post" action="{{route('comments.update', [$comment->id])}}" enctype="multipart/form-data">
        @csrf

        @method('PATCH')


		<div class="form-group">
				<label for="body">Content</label>
                <textarea name="body"
                id="body"
                class="form-control"
                cols="30" rows="5"
                value="">{{$comment->body}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>


	@endsection
</x-admin-master>
