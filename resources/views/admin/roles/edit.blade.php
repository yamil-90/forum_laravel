<x-admin-master>
    @section('content')
    <h1>Edit role {{$role->name}}</h1>
    @if(session()->has('role-updated'))
        <div class="alert alert-success">
            {{session('role-updated')}}
        </div>
    @endif
    <div class="row">
       <div class="col-sm-3">
        <form action="{{route('roles.update',$role->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{$role->name}}" name="name" id="name" class="form-control">
            </div>
            <button class="btn btn-primary"type="submit">Submit Changes</button>
        </form>
       </div>





    </div>
    <div class="mb-1 mt-1">
        <form action="{{route('roles.destroy',$role)}}" method="post">
            @csrf
            @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete Role</button>
    </form>
</div>
       <div class="row">
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
                          <th>checked</th>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Delete</th>

                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>checked</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>

                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td><input type="checkbox"
                                @foreach ($role->permissions as $role_permission)

                                @if($permission->slug == $role_permission->slug)
                                checked
                                @endif
                                @endforeach
                                ></td>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->slug}}</td>
                            <td>


                                @if($role->permissions->contains($permission))
                                <form action="{{route('roles.permission.detach',[$role])}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="permission" value="{{$permission->id}}"id="">
                                   <button type="submit" class="btn btn-danger">Detach</button>
                               </form>
                               @else
                               <form action="{{route('roles.permission.attach',[$role])}}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="permission" value="{{$permission->id}}"id="">
                               <button type="submit" class="btn btn-primary">Attach</button>
                           </form>
                           @endif
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
