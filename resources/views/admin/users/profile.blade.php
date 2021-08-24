<x-admin-master>
    @section('content')
    <h1>User profile : {{$user->name}}</h1>
    <div class="row">
        <div class="col-sm-5" >
            <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group d-flex justify-content-center">

                <img class="img-profile rounded-circle" src="{{$user->avatar}}">


            </div>
            <input type="file" name="avatar">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                    name="name"
            class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                    id="name"
                    value="{{$user->name}}"
                    >
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text"
                    name="username"
                    class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}"
                    id="username"
                    value="{{$user->username}}"
                    >
                    @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text"
                    name="email"
                    class="form-control{{$errors->has('email') ? 'is-invalid' : ''}}"
                    id="email"
                    value="{{$user->email}}">

                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"
                    name="password"
                    class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                    id="password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password"
                    name="password_confirmation"
                    class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                    id="password_confirmation"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Select</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Atach/Detach</th>
                        </tr>
                </thead>
                <tfoot>
                        <tr>
                            <th>Select</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Atach/Detach</th>

                        </tr>
                </tfoot>
                <tbody>
                    @foreach ($roles as $role)


                        <tr>
                            <td><input type="checkbox"
                                @foreach ($user->roles as $user_role) {{--we check if the user has the role we are displaying--}}
                                    @if($user_role->slug==$role->slug)
                                        checked
                                    @endif
                                @endforeach
                                ></td>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->slug}}</td>
                            <td>
                                @if(!$user->roles->contains($role))
                                <form method="post" action="{{route('user.role.attach', $user)}}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button class="btn btn-primary"
                                    >Attach</button>
                                </form>

                            @else
                                <form method="post" action="{{route('user.role.detach', $user)}}">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="role" value="{{$role->id}}">
                                <button class="btn btn-danger"

                                    >Detach</button>
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
    @endsection
</x-admin-master>
