<x-admin-master>
@section('content')

<div class="row">

    <div class="col-sm-3">

    <form action="{{route('categories.create')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" >

                @error('name')
                    <span><strong>{{$message}}</strong></span>
                @enderror
            </div>
            @if(session()->has('category-deleted'))
        <div class="alert alert-danger">{{session('category-deleted')}}</div>
        @endif
            <button class="btn btn-primary btn-block" type="submit">Create category</button>
        </form>
    </div>
    <div class="col-sm-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">categories</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>

                      <th>Delete</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>

                        <th>Delete</th>

                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <th>{{$category->name}}</th>

                        <th>

                            <form action="{{route('categories.destroy',$category)}}" method="post">
                                @csrf
                                @method('DELETE')
                             <button class="btn btn-danger" type="submit">Delete</button>

                            </form>
                        </th>

                    </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>
@endsection
</x-admin-master>
