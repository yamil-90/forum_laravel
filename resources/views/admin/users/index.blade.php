<x-admin-master>
    @section('content')
    <h1>index users</h1>


           @if(session('message'))
               <div class="alert alert-danger">{{session('message')}}</div>
           @elseif(session('user-updated-message'))
               <div class="alert alert-success">{{session('user-updated-message')}}</div>
           @elseif(session('post-updated-message'))
               <div class="alert alert-success">{{session('post-updated-message')}}</div>
           @endif

            <!-- DataTales Example -->

            <div class="card shadow mb-4">
                   <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                   </div>
                   <div class="card-body">
                     <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                           <tr>
                             <th>Id</th>
                             <th>Username</th>
                             <th>Name</th>
                             <th>Avatar</th>
                             <th>Role</th>
                             <th>Created at</th>
                             <th>Updated at</th>
                             <th>Delete</th>
                           </tr>
                         </thead>
                         <tfoot>
                           <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                           </tr>
                         </tfoot>
                         <tbody>
                             @foreach($users as $user)
                             @if($user->id!=auth()->user()->id)
                           <tr>

                            <th>{{$user->id}}</th>
                               <td><a href="{{route('user.profile.show', $user)}}">{{$user->username}}</a></td>
                               <td>{{$user->name}}</td>
                               <td>
                                <img height="50px" src="{{asset($user->avatar)}}" alt="">

                               </td>
                               <td>{{$user->email}}</td>
                               <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'no date'}}</td>
                               <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : 'no date'}}</td>
                               <td>
                                   {{-- @can('view',$post) this can be used to avoid showing the delete button if you are not the author--}}
                                   <form method="post" action="{{route('user.destroy', $user->id)}}" enctype="multipart/form-data">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger" >Delete</button>
                                   </form>
                                   {{-- @endcan --}}
                               </td>
                           </tr>
                           @endif
                           @endforeach
                         </tbody>
                       </table>
                     </div>
                   </div>
           </div>

        @endsection
        @section('scripts')

         <!-- Page level plugins -->
         <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
         <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

         <!-- Page level custom scripts -->
         <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
        @endsection
       </x-admin-master>

