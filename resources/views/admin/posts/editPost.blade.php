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
	<form method="post" action="{{route('post.update', [$post->id])}}" enctype="multipart/form-data">
        @csrf

        @method('PATCH')
		<div class="form-group">
			<label for="text">Title</label>
            <input
                type="text"
                name="title"
                class="form-control"
                id="title"
                placeholder="Enter title"
                value="{{$post->title}}"
                >

        </div>
        <div class="form-group">
            <label for="text">category</label>
            <select type="select" name="category_id"  class="form-control" id="category">
                <option value="{{$post->category_id}}" selected-disabled>{{$post->category ? $post->category->name : 'Select category'}}</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
		<div class="form-group">
                <div><img height="100px" src="{{asset($post->post_image)}}" alt=""></div>
				<label for="file">Image</label>
				<input type="file" name="post_image" class="file-control-file" id="image">
		</div>
		<div class="form-group">
				<label for="body">Content</label>
                <textarea name="body"
                id="body"
                class="form-control"
                cols="30" rows="5"
                value="">{{$post->body}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>


	@endsection
</x-admin-master>
