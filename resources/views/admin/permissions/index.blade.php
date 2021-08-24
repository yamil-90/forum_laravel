<x-admin-master>
    @section('content')
    <div class="row">
        <div class="col-sm-3">

            <form action="{{route('permissions.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" >

                        @error('name')
                            <span><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    @if(session()->has('role-deleted'))
                <div class="alert alert-danger">{{session('role-deleted')}}</div>
                @endif
                    <button class="btn btn-primary btn-block" type="submit">Create Permission</button>
                </form>
            </div>
        <div class="col-sm-9">
            @if($permissions->isNotEmpty())
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
                          <th>Delete</th>
                          <th>Edit</th>

                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>
                            <th>Edit</th>

                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($permissions as $permission)
                        <tr>

                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->slug}}</td>
                            <td>



                                <form action="{{route('permissions.destroy',[$permission])}}" method="post">
                                    @method('DELETE')
                                    @csrf

                                   <button type="submit" class="btn btn-danger">Delete</button>
                               </form>

                            </td>
                            <td>



                                <form action="{{route('permissions.edit',[$permission])}}" method="post">

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
            @endif
        </div>
       </div>
    @endsection
</x-admin-master>
