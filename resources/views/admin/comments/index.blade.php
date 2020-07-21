<x-admin-master>
@section('content')
<div class="row">

    <div class="col-sm-9">
        @if($comments->isNotEmpty())
        <div class="card shadow mb-4">
            @if(session()->has('role-deleted'))
            <div class="alert alert-danger">{{session('comment-deleted')}}</div>
            @endif
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My Comments</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Body</th>
                      <th>Date</th>
                      <th>Delete</th>
                      <th>Edit</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Body</th>
                        <th>Date</th>
                        <th>Delete</th>
                        <th>Edit</th>

                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($comments as $comment)
                    <tr>

                        <td><a href="{{route('post',[$comment->post])}}">{{$comment->body}}</a></td>
                        <td>{{$comment->created_at->diffForhumans()}}</td>

                        <td>



                            <form action="{{route('comments.destroy',[$comment])}}" method="post">
                                @method('DELETE')
                                @csrf

                               <button type="submit" class="btn btn-danger">Delete</button>
                           </form>

                        </td>
                        <td>



                            <form action="{{route('comments.edit',[$comment])}}" method="post">

                                @csrf
                                @method('GET')
                               <button type="submit" class="btn btn-primary">Edit</button>
                           </form>

                        </td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

        </div>
        @else
           <div class="col-sm-6">You have no comments</div>
        @endif
    </div>
   </div>
@endsection
</x-admin-master>
