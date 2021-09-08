<div class="container">

        <div class="card shadow mb-4">
                   <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Post filtered by {{$category}} category</h6>
                   </div>
                   <div class="card-body">
                     <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                           <tr>
                             <th>Title</th>
                             <th>Content</th>
                               <th>Author</th>
                             <th>Category</th>
                             <th>Created at</th>
                           </tr>
                         </thead>
                         <tfoot>
                           <tr>
                             <th>Title</th>
                             <th>Content</th>
                               <th>Author</th>
                             <th>Category</th>
                             <th>Created at</th>
                           </tr>
                         </tfoot>
                         <tbody>

                         @foreach($posts as $post)
                             <tr>
                                 <td>
                                     <a href="{{route('post', $post->id)}}" class="">{{$post->title}}
                                         &rarr;</a>
                                 </td>
                                 <td><p class="card-text">{{Str::limit($post->body, '10' ,'.....')}}</p></td>
                                 <td>{{$post->user->name}}</td>
                                 <td>{{$post->category->name}}</td>
                                 <td>{{$post->created_at ? $post->created_at->diffForHumans() : 'no date'}}</td>

                             </tr>

                         @endforeach
                         </tbody>
                       </table>
                     </div>
                   </div>
           </div>
</div>
