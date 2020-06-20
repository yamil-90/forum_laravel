<x-admin-master>
    @section('content')
    <h1>User profile : {{$user->name}}</h1>
    <div class="row">
        <div class="col-sm-5" >
    <form method="post" action="" enctype="multipart/form-data">
        @csrf

        <div class="form-group d-flex justify-content-center">

            <img class="img-profile" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">


        </div>
        <input type="file">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                name="name"
                class="form-control"
                id="name"
                value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text"
                name="username"
                class="form-control"
                id="username"
                value="{{$user->username}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text"
                name="email"
                class="form-control"
                id="email"
                value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="pasword"
                name="password"
                class="form-control"
                id="password"
                >
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="pasword"
                name="password_confirmation"
                class="form-control"
                id="password_confirmation"
                >
        </div>
    </div>
</div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</x-admin-master>
