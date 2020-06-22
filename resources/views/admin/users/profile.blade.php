<x-admin-master>
    @section('content')
    <h1>User profile : {{$user->name}}</h1>
    <div class="row">
        <div class="col-sm-5" >
        <form method="post" action="{{route('user.profile.update', auth()->user())}}" enctype="multipart/form-data">
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
    </div>
</div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</x-admin-master>
