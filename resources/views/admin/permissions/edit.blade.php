<x-admin-master>
    @section('content')
    <h1>Edit permission {{$permission->name}}</h1>
    @if(session()->has('permission-updated'))
        <div class="alert alert-success">
            {{session('permission-updated')}}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-3">
        <form action="{{route('permissions.update',$permission->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{$permission->name}}" name="name" id="name" class="form-control">
            </div>
            <button class="btn btn-primary"type="submit">Submit Changes</button>
        </form>
       </div>





    </div>
    <div class="mb-1 mt-1">
        <form action="{{route('permissions.destroy',$permission)}}" method="post">
            @csrf
            @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete permission</button>
    </form>
</div>
       <div class="row">
        <div class="col-sm-9">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>

                          <th>Id</th>
                          <th>Name</th>
                          <th>Slug</th>


                        </tr>
                      </thead>
                      <tfoot>
                        <tr>

                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>


                          </tr>
                      </tfoot>
                      <tbody>

                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->slug}}</td>
                            <td>



                            </td>
                          </tr>

                      </tbody>
                    </table>
                  </div>
                </div>

            </div>
        </div>
       </div>
    @endsection
</x-admin-master>
