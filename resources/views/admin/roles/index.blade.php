<x-admin-master>
    @section('content')

        <div class="row">

            <div class="col-sm-3">
               
            <form action="{{route('roles.store')}}" method="post">
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
                    <button class="btn btn-primary btn-block" type="submit">Create Role</button>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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
                            @foreach ($roles as $role)
                            <tr>
                                <th>{{$role->id}}</th>
                                <th>{{$role->name}}</th>
                                <th>{{$role->slug}}</th>
                                <th>
                                    @if($role->slug!='admin')
                                    <form action="{{route('roles.destroy',$role)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                     <button class="btn btn-danger" type="submit">Delete</button>

                                    </form>
                                </th>
                                <th>

                                <a class="btn btn-primary" type="link" href="{{route('roles.edit',[$role->id])}}">Edit</a>
                                @else <h6></h6>@endif
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
