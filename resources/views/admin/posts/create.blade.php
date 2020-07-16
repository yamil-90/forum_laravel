<x-admin-master>
	@section('content')
    {{-- @include('includes.tinyeditor') couldnt set up the domain--}}
	<h1>create</h1>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="text">Title</label>
			<input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title">
		</div>
		<div class="form-group">
				<label for="file">Image</label>
				<input type="file" name="post_image" class="file-control-file" id="image">
        </div>
        <div class="form-group">
            <label for="category">category</label>
            <select type="select" name="post_category" class="form-control" id="category">
                
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
		<div class="form-group mytextarea">
				<label for="body">Content</label>
				<textarea name="body" id="body" class="form-control " cols="30" rows="5"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>


	@endsection
</x-admin-master>
